<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\{Property, Booking};
use URL, Session, Carbon, Redirect;


class PropertyController extends Controller
{
    public function Property(Request $request)
    {
        $properties = Property::select('*')->orderBy('id','DESC')->get();

        foreach ($properties as $property) {
            $property->amenities = explode(",", $property->amenities);
        }

        return view('pages.properties', compact('properties'));
    }


    public function AddProperty(Request $request)
    {
        if (!Auth::user()->user_type == '1') {
            return Redirect()->back()->with('error', 'You are not Authorized User for this page');
        }

        return view('pages.add_property');
    }


    public function PropertyPost(Request $request)
    {
        try {
            if (!Auth::user()->user_type == '1') {
                return Redirect()->back()->with('error', 'You are not Authorized User for this page');
            }

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'description' => 'required',
                'primary_image' => 'required',
                'bedroom' => 'required',
                'bathroom' => 'required',
                'outdoor_area' => 'required',
                'gross_area' => 'required ',
                'net_area' => 'required ',
                'outdoor_area' => 'required ',
                'price' => 'required',
                'amenities' => 'required',
                'capacity' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->all();
            unset($data['_token']);
            if ($request->amenities) {
                $data['amenities'] = implode(",", $request->amenities);
            }

            //Primary Image_____________________________________________________
            if ($request->file('primary_image')) {
                $image = $request->file('primary_image')->getClientOriginalName();
                $request->file('primary_image')->move(public_path('primary_image'), $image);
                $file = URL::to('/') . '/primary_image/' . $image;
                $data['primary_image'] = $file;
            }

            //Secondary Image___________________________________________________
            $secondaryImagesPaths = [];
            if ($request->hasFile('secondary_images')) {
                foreach ($request->file('secondary_images') as $secondaryImage) {
                    $image = str_replace(' ', '', $secondaryImage->getClientOriginalName());
                    $secondaryImage->move(public_path('secondary_images'), $image);
                    $secondaryImagesPaths[] = url('public/' . 'secondary_images/' . $image);
                }
            }

            $data['secondary_images'] = json_encode($secondaryImagesPaths);
            $data['is_admin'] = 0;
            $data['landholder_id'] = Auth::user()->id;

            $result =   Property::create($data);

            Session::flash('success', 'Successfully added property details.');
            return redirect('/thankyou');
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }


    public function PropertyDetail(Request $request, $id)
    {
        try {
            $property = \DB::table('properties')->select('*')->where('id', $id)->first();

            $property->secondary_images = json_decode($property->secondary_images);
            $property->amenities = explode(",", $property->amenities);
            
            $address = $property->address ;
            $encodedAddress = rawurlencode($address);
       
            $url = "https://nominatim.openstreetmap.org/search?format=json&q={$encodedAddress}";
            $client = new Client();
        
            $response = $client->get($url);
    
            $data = $response->getBody()->getContents();
    
            $results = json_decode($data, true);
        
            if (!empty($results)) {
                $firstResult = $results[0];
        
                $latitude = $firstResult['lat'];
                $longitude = $firstResult['lon'];
                
               
// dd($map);
            }
                
            else {
                $latitude = 0000000;
                $longitude = 00000000;
            }
             $map = '<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.openstreetmap.org/export/embed.html?bbox=' . $longitude . ',' . $latitude . ',' . $longitude . ',' . $latitude . '&amp;layer=mapnik&amp;marker=' . $latitude . '%2C' . $longitude . '" allowfullscreen> </iframe>';
            return view('pages.roomdetail', compact('property','map'));
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }


    public function PostPropertyDetail(Request $request, $id)
    {

        try {
            $validateUser = Validator::make($request->all(),[
                'check_in' => 'required',
                'check_out' => 'required',
                'guests' => 'required',
                'price' => 'required',
            ]);
    
            if ($validateUser->fails()) {
                return Redirect::back()->withErrors($validateUser->errors());
            }

            $check_in = Carbon\Carbon::parse($request->check_in)->format('Y-m-d');
            $check_out = Carbon\Carbon::parse($request->check_out)->format('Y-m-d');

            //** check checkin & checkout dates **//
            $is_greater =   $check_in < $check_out;
            if (!$is_greater) {
                return redirect()->back()->with('Checkout time should greater than Check-In');
            }

            $input = $request->except('_token');
            $input['bookingID'] = 'Property-Abali' . random_int(10000000, 99990000);
            $input['property_id'] = $id;
            $input['customer_id'] = Auth::user()->id;


            $is_capacity = \DB::table('properties')->where('id', $id)->first();
            if ($is_capacity->capacity < $request->guests) {
                return redirect()->back()->with('The guest capacity has exceeded the limits');
            }

            $checkBookings = \DB::table('bookings')->where('property_id', $id)->where('status', '1')
                ->where(function ($query) use ($check_in, $check_out) {
                    $query->where('check_in', '<=', $check_out)
                        ->where('check_out', '>=', $check_in);
                })->get();
          
            //** create booking if not found checkin and checkout dates in database **//
            if ($checkBookings->isEmpty()) {
                if ($input['payment_method'] == '0') {
                    $result = Booking::create($input);
                    return redirect('/stripe' . '/' . $result->id);
                } else if ($input['payment_method'] == '1') {
                    $result = Booking::create($input);
                    return redirect('/paypal_payment' . '/' . $result->id);
                }
            } else {
                return redirect()->back()->with('error', 'Booking not available between the specific dates.');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
    
    public function FindProperty(Request $request){

        try{
            $validateUser = Validator::make($request->all(),[
                'check_in' => 'required',
                'check_out' => 'required',
                'guests' => 'required',
            ]);
    
            if ($validateUser->fails()) {
                return Redirect::back()->withErrors($validateUser->errors());
            }
            $check_in = Carbon\Carbon::parse($request->check_in)->format('Y-m-d');
            $check_out = Carbon\Carbon::parse($request->check_out)->format('Y-m-d');
            $guests = $request->input('guests');
            
            $checkBookings = \DB::table('bookings')
            ->select( 'property_id', \DB::raw('MAX(check_in) as check_in'), \DB::raw('MAX(check_out) as check_out'))
            ->where('status', '1')
            ->where(function ($query) use ($check_in, $check_out) {
                $query->where('check_in', '<=', $check_out)
                    ->where('check_out', '>=', $check_in);
            })
            ->groupBy( 'property_id') 
            ->get();
            
            $excludeIds = [];
  
            foreach($checkBookings as $booking) {
                $excludeIds[] = $booking->property_id;
            }
            
            $availableProperties = \DB::table('properties')
                ->whereNotIn('id', $excludeIds)
                // ->where('properties.capacity' ,'>=', $guests )
                ->get();
                
            return view('pages.findproperty', compact('availableProperties', 'check_in','check_out', 'guests'));
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
