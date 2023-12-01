<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_quries;
use App\Models\User;
use App\Models\Property;
use Auth;

class UserController extends Controller
{
    
    public function CustomerQuery(Request $request){
        // dd('hello');
        $input = $request->all();
        // dd($input);
        unset($input['_token']);
        
        if(!empty($input['name']) && !empty($input['email']) && !empty($input['phone']) && !empty($input['subject']) &&
            !empty($input['message'])){
                
            $admin = \DB::table('admins')->first();
            $detail['name'] = $request->get('name') ?? '';
            $detail['email'] = $request->get('email') ?? '';
            $detail['phone'] = $request->get('phone') ?? ''; // Changed 'password' to 'phone'
            $detail['title'] = "Welcome to Abali Web Application";
            $detail['body'] = "User raised a query to Abali Web Application.";
            
            \Mail::send('email.user_queries', ['detail' => $detail], function ($message) use ($detail, $admin) {
                $message->to($admin->email)->subject($detail['title']);
            });
        
            User_quries::create($input);
            return redirect()->back()->with('success', 'Your message sent to the administration');
        }
        else{
            return redirect()->back();
        }
    }
    
//     public function CustomerQuery(Request $request){
        
//     try {
//         $this->validate($request, [
//             'name' => 'required',
//             'email' => 'required|email',
//             'phone' => 'required',
//             'subject' => 'required',
//             'message' => 'required',
//         ]);
        
//         $input = $request->all();
//         $admin = \DB::table('admins')->first();

//         $detail = [
//             'name' => $input['name'],
//             'email' => $input['email'],
//             'phone' => $input['phone'],
//             'title' => "Welcome to Abali Web Application",
//             'body' => "User raised a query to Abali Web Application: " . $input['message'],
//         ];

//         \Mail::send('email.user_queries', ['detail' => $detail], function ($message) use ($detail, $admin) {
//             $message->to($admin->email)->subject($detail['title']);
//         });

//         User_queries::create($input);

//         return redirect()->back()->with('success', 'Your message has been sent to the administration');
//     } catch (\Exception $e) {
//         return redirect()->back()->with('error', 'Failed to send your message');
//     }
// }

    public function Show_Profile(){
        $userId = auth()->user()->id;
        $data = User::where('id',$userId)->first();
        $properties = Property::where('landholder_id',$data['id'])->orderBy('id','asc')->get();
        // dd($properties);
        return view('pages.profile', compact('data','properties'));
    }
    
    public function Update_Profile(Request $request){
        $data = $request->all();
        unset($data['_token']);
        unset($data['user_type']);
        user::where('id',$request->id)->update($data);
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

}
