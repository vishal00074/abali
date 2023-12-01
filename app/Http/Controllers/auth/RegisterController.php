<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use App\Models\User;
use Session,URL,Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function Register(Request $request)
    {
        return view('auth.signup');
    }
    
    public function Login(Request $request)
    {
        return view('auth.signin');
    }

    public function OTP(Request $request)
    {
        return view('auth.otp');
    }

    public function Registration(Request $request)
    {
        $validateUser = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' =>  ['required','string','min:8'],
            'password_c' => 'required|same:password',
            'phone'=>'required',
            'user_type'=>'required',
        ]);

        if ($validateUser->fails()) {
            return Redirect::back()->withErrors($validateUser->errors());
        }


        $code = mt_rand(1111, 9999);
        $message = "Your Abali Web Application Registration code " . $code;

        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $input['verification_time'] =  date('Y-m-d H:i:s', strtotime('2 minute'));
        $input['code']=   $code;
        
        /** Is User Already Existed  */
        $is_verified =User::where('email', $request->email)->where('is_verified', '1')->first();
        if($is_verified){
            return redirect()->back()->with('error', 'User email already registred');
        }


        /**   Is user already In Database but not verified */
        $is_exist =User::where('email', $request->email)->where('is_verified', '0')->first();

        if(!empty($is_exist)){
            $is_exist->name = $request->name;
            $is_exist->password = Hash::make($request->password);
            $is_exist->verification_time =  date('Y-m-d H:i:s', strtotime('2 minute'));
            $is_exist->code =$code;
            $is_exist->user_type =$request->user_type;
            $is_exist->update();
            
            $data['name'] = $is_exist->name;
            $data['email'] = $is_exist->email;
            $data['title'] = "Welcome to Abali Web Application";
            $data['body']  = "You have successfully registered in Abali Web application";
            $data['otp']  = $code;
            
            \Mail::send('email.wecomeemail', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);
            });
   
            return redirect()->route('otp.verification', ['id' => $is_exist->id])->with('success', 'An OTP has been sent to your email.');
        }
        else{
            /**     Is user new     */
            $user = User::create($input);
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['title'] = "Welcome to Abali Web Application";
            $data['body']  = "You have successfully registered in Abali Web Application";
            $data['otp']  = $code;
            
            \Mail::send('email.wecomeemail', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);
            });
       
            return redirect()->route('otp.verification', ['id' => $user->id])->with('success', 'An OTP has been sent to your email.');
        }
    } 

    public function GetOtp(Request $request, $id)
    {
        return view('auth.code', compact('id'));
    }

    public function VerifyOTP(Request $request)
    {
        $validateUser = Validator::make($request->all(), [
            'otp' => 'required',
            'user_id'=> 'required'
        ]);
        if ($validateUser->fails()) {
            return Redirect::back()->withErrors($validateUser->errors());
        }
        
        $verify_user = User::where('id', $request->user_id)->where('code', $request->otp)->first();
        if ($verify_user) {
            if (date('Y-m-d H:i:s') <= $verify_user->verification_time) {
                $users = User::where('id', $request->user_id)->first();
                $users->is_verified = '1';
                $users->update();

                return redirect()->route('user.login');
            }
            else{
                return Redirect::back()->with('error','Verification code has been expired');
            }
        }
        else{
            return Redirect::back()->with('error','Verification code is not valid');
        }
    }
    
    public function ResendOtp($id)
    {
        $code = mt_rand(1111, 9999);
        $user = User::where('id', $id)->first();
        
        if($user){
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['title'] = "Welcome to Abali Application";
            $data['body']  = "You have successfully registered in Abali Web Application";
            $data['otp']  = $code;
    
            \Mail::send('email.wecomeemail', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);
            });
            
            $user->code =$code;
            $user->verification_time =  date('Y-m-d H:i:s', strtotime('2 minute'));
            $user->update();
            
            return redirect()->back()->with('success', 'New Otp has been sent successfully');
        }
        else{
            return redirect()->back()->with('error', 'Opps! Something went wrong');
        }
    }
    
    public function LoggedIn(Request $request)
    {
        $validateUser = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validateUser->fails()) {
            return Redirect::back()->withErrors($validateUser->errors());
        }
      
        $password = Hash::make(($request['password']));
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            $customer = User::where('email', $request->email)->where('is_verified', '1')->first();
            if ($customer) {
                return redirect()->intended('/')->withSuccess('Signed in');
            }
            else{
                return redirect()->back()->with('error', 'User not Verified');
            }
        }
        return redirect()->back()->with('error', 'Login details are not valid');
    }

    public function SignOut()
    {
        if (!Auth::guest()) {
            Session::flush();
            Auth::logout();
            return Redirect('/')->with('success', 'Signout successfully');
        }
        else {
            return Redirect()->back();
        }
    }
    
    
    /**-----   Forget-Password   -----*/
    public function Forget_Password(Request $request)
    {
        return view('auth.forget_password');
    }
    
    public function SubmitRequest(Request $request)
    {
        try{
            $users = User::where('email', $request->email)->get();
            
            foreach($users as $user){
                $username = $user->name;
            }
    
            if(count($users) > 0)
            {
                $random= Str ::random(40);
                $domain= URL::to('/');
    
                $url = $domain.'/forget-password?token='.$random;
                
                // Mail_____________________________________________________________
                $data['url'] = $url;
                $data['email'] =$request->email;
                $data['title'] ="Reset Your Password";
                $data['app'] = "Abali Web Application";
                $data['username']= $username;
                
                $mail= \Mail::send('email.Verify', ['data'=>$data],function($message) use ($data){
                    $message->to($data['email'])->subject($data['title']); 
                });
    
                $users =User::find($users[0]['id']); 
                $users->remember_token = $random;
                $users->save();
                 
                return redirect("/login")->with('success','Reset Link Has been sent in your email');
            }
            else{
                return redirect()->back()->with('error','Email not found');
            }
        }
        catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
    
    public function verificationMail(Request $request)
    {
       try{
            $users= User::where('remember_token', $request->token)->first();
            if(!empty($users) || $users!=null) {
                $is_token= User::where('remember_token', $request->token)->first();
                $is_token->remember_token = '';
                $is_token->update();
                $data=$users->email;
    
                if(isset($request->token) && $users){
                    $customer=User::where('email', $data)->get();
                    return view('forget_password', compact('customer'));
                }
                else {
                    return "<h1>Oops something went wrong</h1>";
                }
            }
            else{
                return "<h1>Link Expired</h1>";
            }
        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => 'false',
                'message' => $th->getMessage()
            ], 200);
        }

    }

    public function ForgetPassword(Request $request)
    {
        try{
            $validateUser = Validator::make($request->all(), 
            [
                // 'id' => 'required',
                'password' =>  [
                    'required',
                    'string',
                    'min:8',
                ],
                'confirm_password' => 'required|same:password|min:8'
            ]);
            if($validateUser->fails()){
                return Redirect::back()->withErrors($validateUser->errors());
            }

            $customers= User::where('id', $request->id)->first();
            $customers->password=  Hash::make($request->password);
            $customers->update();
            
            if($customers){
                return "<h1>You have successfully changed the password</h1>";
            }
            else{
                return "<h1>Oops! something went wrong</h1>";
            }
        }
        catch (\Throwable $th) {
            return response()->json([
                'status' => 'false',
                'message' => $th->getMessage()
            ], 200);
        }
    }
    /**-----   End - Forget-Password  -----*/
}