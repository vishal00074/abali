<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Auth;
use DB;
use Validator, Redirect;
use App\Models\{Booking, Payment};
use Srmklive\PayPal\Services\ExpressCheckout;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_SANDBOX_API_SECRET'));
        $this->gateway->setTestMode(true);
    }
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
    */
    public function stripe($id)
    {
        $booking = Booking::find($id);
        // dd($booking);
        
        return view('stripe', compact('booking'));
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
    */
    public function stripePost(Request $request)
    {
        $user_id = Auth::user()->id;
        $payment = Booking::where('bookingID',$request->booking_id)->where('customer_id', $user_id)->where('status', '0')->first();
       if( !$payment){
        return redirect()->back()->with('error', 'Opps! Booking not found');
       }
        // try{
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
          
            $response = Stripe\Charge::create([
                "amount" =>$payment->price * 100,
                "currency" => "GBP",
                "source" => $request->stripeToken,
                "description" => "User Payment."
            ]);
        
            if($response->status ="succeeded"){
                $properties = Booking::where('bookingID',$request->booking_id)->where('customer_id', $user_id)->where('status', '0')->first();
                $properties->status = '1';
                $properties->save();
                $amount =$response->amount /100; 
                $array = [
                    'customer_id' =>  $user_id,
                    'bookingID'=> $request->booking_id,
                    'property_id'=> $properties->property_id,
                    'transection_id' =>$response->id,
                    'receipt_url' => $response->receipt_url,
                    'price' => $amount,
                    'currency' => $response->currency,
                    'status' => $response->status
                ];

                Payment::create($array);


                $this->Envoice($response, $properties);

                Session::flash('success', 'Payment has been received successfully!'); 
                return redirect('/thankyou');
            }
            else{
                return redirect()->back()->with('error', 'Payment Failed');
            }
        // }
        // catch (\Throwable $th) {  
        //     dd($th);
        //     return view('errors.stripe',compact('th'));
        // }
    }
    
    
    public function Envoice($response ,$properties)
    {
        $data =DB::table('properties')
        ->leftjoin('bookings', 'properties.id', 'bookings.property_id')
        ->leftjoin('payments', 'bookings.bookingID', 'payments.bookingID')
        ->leftjoin('users', 'bookings.customer_id', 'users.id')
        ->select('users.name as username', 'users.email as useremail', 'users.phone as userphone', 'bookings.check_in', 'bookings.check_out',
         'bookings.guests', 'bookings.price', 'bookings.bookingID', 'properties.name as propertyname', 'properties.primary_image', 'properties.address', 'payments.transection_id', 'payments.receipt_url')
        ->where('bookings.bookingID', $properties->bookingID)
        ->first();

        $mail = \Mail::send('email.bookinginvoice', ['data' => $data], function ($message) use ($data) {
            $message->to($data->useremail)->subject('Property Booking Confirmation');
        });
    }
    
    // public function paypal(){
    //     $id = Auth::user()->id;
    //     return view('test.click', compact('id'));
    // }
    
    // public function amountPost(Request $request){
    //     // dd($request);
    //     try{
    //         $validateUser = Validator::make($request->all(),[
    //             'amount' => 'required'
    //         ]);
    
    //         if ($validateUser->fails()) {
    //             return Redirect::back()->withErrors($validateUser->errors());
    //         }
            
    //         $id = $request->id;
    //         $amount = $request->amount;
            
    //         return view('test.paypal', compact('id', 'amount'));
            
    //         // return redirect('/paypal_payment' . '/' . $id );
            
    //     }
    //     catch (\Exception $e) {
    //         echo $e->getMessage();
    //         exit;
    //     }
    // }
    
    public function paypal_payment($id){
        // dd($id);
        $data = \DB::table('bookings')->where('id',$id)->first();
        return view('test.paypal', compact('id','data'));
    }
    
    public function paypalPost(Request $request){
        try {
        // dd($request->id);
            $user_id = Auth::user()->id;
            $payment = Booking::where('bookingID',$request->bookingID)->where('customer_id', $user_id)->where('status', '0')->first();
            if( !$payment){
                return redirect()->back()->with('error', 'Opps! Booking not found');
            }
            $response = $this->gateway->purchase(array(
                'amount' => $request->price,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success', ['id' => $request->id]),
                'cancelUrl' => url('error')
            ))->send();
            // dd($response);
            if ($response->isRedirect()) {
                $response->redirect('/success'. '/' . $request->id);
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    public function success(Request $request, $id){
        
       if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));
            // dd($transaction);
            

            $response = $transaction->send();

            if ($response->isSuccessful()) {
            
                $arr = $response->getData();
                //   dd($arr);
                $input=[
                    'status'=>'1'
                ];
                
                $guest_payment =Booking::where('id', $id)->update( $input);
                $properties = Booking::where('id', $id)->first();
                $amount = $response->getData()['transactions'][0]['amount']['total'];
                $currency = $response->getData()['transactions'][0]['amount']['currency'];
                // dd($amount, $currency );
                $array = [
                    'customer_id' =>  $properties->customer_id,
                    'bookingID'=> $properties->bookingID,
                    'property_id'=> $properties->property_id,
                    'transection_id' =>$response->getData()['id'],
                    'receipt_url' => 'Paypal',
                    'price' => $amount,
                    'currency' => $currency,
                    'status' => $response->getData()['state']
                ];
                // dd($array);
                Payment::create($array);

                $this->Envoice($response, $properties);

                Session::flash('success', 'Payment successfull!'); 
                return redirect('/thankyou');
            }else{
                return $response->getMessage();
            }
       }
    }
    


    
}