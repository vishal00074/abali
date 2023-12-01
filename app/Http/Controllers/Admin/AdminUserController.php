<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;
use Redirect, Session, Validator, Hash;

class AdminUserController extends Controller
{
    public function Userlist(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = User::where('user_type', '0')->where('is_verified', '1')->orderby('id', 'DESC')->get();

                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions', function ($data) {
                        $btn = '<a href="'. route('user_edit', $data->id ) .'" class="btn btn-sm btn-success">Edit</a>
                        <a href="javascript:void(0)" data-id="' . $data->id . '" class="delete-queries btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['Actions'])
                    ->make(true);
            } else {
                return view('admin.user.user_list');
            }
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('/');
        }
    }

    public function LandHolderList(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = User::where('user_type', '1')->orderby('id', 'DESC')->get();

                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions', function ($data) {
                        $btn = '<a href="' . route('user_edit', $data->id) . '" class="btn btn-sm btn-success">Edit</a>';
                        $btn .= '<a href="' . route('property_list', $data->id) . '" class="btn btn-sm btn-success m-1">Property</a>';
                        $btn .= '<a href="javascript:void(0)" data-id="' . $data->id . '" class="delete-queries btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['Actions'])
                    ->make(true);
            } else {
                return view('admin.landholder.landholder_list');
            }
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('/');
        }
    }

    public function DeleteUser(Request $request, $id)
    {
        try {
            $data = User::where('id', $id)->delete();
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function Edit(Request $request, $id)
    {
        $user = User::where('id', $id)->select('*')->first();
        return view('admin.user.user_edit', compact('user'));
    }

    public function UpdateUser(Request $request, $id)
    {
       try{
        $validateUser = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'phone' => 'required',
            ]
        );

        if ($validateUser->fails()) {
            return Redirect::back()->withErrors($validateUser->errors());
        }
        $array=array(
            'name' => $request->name,
            'phone' => $request->phone,
        );

        $user = User::where('id', $id)->update($array);

        $user_type = User::where('id', $id)->first();

        if($user_type->user_type =='1' ){
            return redirect()->back()->with('success', 'Landholder details has been updated');
        }else{
            return redirect()->back()->with('success', 'User details has been updated');
        }
        


        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function AddUser(Request $request)
    {
        return view('admin.user.add_user');
    }

    public function Submituser(Request $request)
    {
    
        $user =new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password =  Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->verification_time = date('Y-m-d H:i:s', strtotime('2 minute'));
        $user->is_verified = '1';
        $user->save();
        return redirect()->back()->with('success','User details saved successfully'); 
    }
    
    public function PropertyList(Request $request){
        try {
            if ($request->ajax()) {
                $data = Property::orderby('id', 'DESC')->get();

                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Status', function ($data) {
                        if($data['is_admin'] ==0){
                            $btn = '<a data-toggle="modal" data-target="#approved" name="'.$data->id .'" onClick="approved(this)" class="btn btn-sm btn-danger text-white">Approve??</a>';
                            
                        }else{
                           $btn = '<a data-toggle="modal" data-target="#Unapproved" name="'.$data->id .'" onClick="Unapproved(this)" class="btn btn-sm btn-success text-white">Approved</a>';
                        }
                        return $btn;
                    })
                    ->addColumn('Actions', function ($data) {
                        $btn = '<a href="'. route('property_edit', $data->id ) .'" class="btn btn-sm btn-success">Edit</a>
                        <a href="javascript:void(0)" data-id="' . $data->id . '" class="delete-queries btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['Actions','Status'])
                    ->make(true);
            } else {
                return view('admin/property/property_list');
            }
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('/');
        }
    }
    
    public function Add_Property(){
        return view('admin.property/add');
    }
    
    public function Post_Property(Request $request){
        
        try {
            $primaryImage = null;
            if ($request->file('primary_image')) {
                $imageA = str_replace(' ', '', $request->file('primary_image')->getClientOriginalName());
                $request->file('primary_image')->move(public_path('primary_image'), $imageA);
                $primaryImage = url('public/' . 'primary_image/' . $imageA);
            }
        
            $secondaryImagesPaths = [];
            if ($request->hasFile('secondary_images')) {
                foreach ($request->file('secondary_images') as $secondaryImage) {
                    $image = str_replace(' ', '', $secondaryImage->getClientOriginalName());
                    $secondaryImage->move(public_path('secondary_images'), $image);
                    $secondaryImagesPaths[] = url('public/' . 'secondary_images/' . $image);
                }
            }
        
            $jsonSecondaryImages = json_encode($secondaryImagesPaths);
            $amenitiesString = implode(',', $request->input('amenities'));
        
            Property::create([
                'landholder_id' => $request->input('landholder_id'),
                'is_admin' => $request->input('is_admin'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'description' => $request->input('description'),
                'bedroom' => $request->input('bedroom'),
                'bathroom' => $request->input('bathroom'),
                'outdoor_area' => $request->input('outdoor_area'),
                'net_area' => $request->input('net_area'),
                'gross_area' => $request->input('gross_area'),
                'price' => $request->input('price'),
                'amenities' => $amenitiesString,
                'primary_image' => $primaryImage,
                'secondary_images' => $jsonSecondaryImages,
                'capacity' => $request->input('capacity')
            ]);
        
            return redirect('admin/property_list')->with('success', 'Property details saved successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('/');
        }
    }
    
    public function Edit_Property(String $id){
        $data = Property::where('id', $id)->first();
        // dd($data);
        return view('admin.property/edit', compact('data'));
    }
    
    public function Update_Property(Request $request, string $id) {
        // dd($request);
        try {
            $data = $request->except(['_token']);
            $data['amenities'] = implode(',', $data['amenities']);
            
            if ($request->file('primary_image')) {
                $imageA = str_replace(' ', '', $request->file('primary_image')->getClientOriginalName());
                $request->file('primary_image')->move(public_path('primary_image'), $imageA);
                $primaryImage = url('public/' . 'primary_image/' . $imageA);
                $data['primary_image'] = $primaryImage;
            }
        
           
            if ($request->hasFile('secondary_images')) {
                 $secondaryImagesPaths = [];
                foreach ($request->file('secondary_images') as $secondaryImage) {
                    $image = str_replace(' ', '', $secondaryImage->getClientOriginalName());
                    $secondaryImage->move(public_path('secondary_images'), $image);
                    $secondaryImagesPaths[] = url('public/' . 'secondary_images/' . $image);
                }
                $jsonSecondaryImages = json_encode($secondaryImagesPaths);
                $data['secondary_images'] = $jsonSecondaryImages;
            }
            Property::where('id', $id)->update($data);
    
            return redirect('admin/property_list')->with('success', 'Property details updated successfully');
    
        } catch (\Exception $e) {
            dd($e->getMessage());
            Session::flash('error', $e->getMessage());
            return redirect('/');
        }
    }
    
    public function DeleteProperty(string $id){
        try {
            $data = Property::where('id', $id)->delete();
            if($data){
                \DB::table('home_properties')->where('property_id',$id)->delete();
            }
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
    
    public function Approve(Request $request){
        try{
            // dd($request);
            $update = Property::where('id', $request->id)->update(['is_admin'=>'1']);
            $data =Property::where('id', $request->id)->first();
            
            $email = $data['email'];
            $name = $data['name'];
            $detail['title'] = "Welcome to Abali Web Application";
            $detail['body'] = "Your property has been approved.";
            // dd($email);
            if($data->landholder_id !== 'admin'){
            Mail::send('email.approve_property', ['detail' => $detail, 'data' =>$data], function ($message) use ($detail, $data) {
                $message->to($data->email)->subject($detail['title']);
            });
        }
        
        return redirect('admin/property_list')->with('success', 'Approved successfully');
        
        } catch (\Exception $e) {
            // dd($e->getMessage());
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
    
    public function NotApproved(Request $request) {
        try{
            $update = Property::where('id', $request->id)->update(['is_admin'=>'0']);
            return redirect('admin/property_list')->with('success', 'Unapproved successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
    
    public function List_Property(Request $request, $id){
        
        try {
            if ($request->ajax()) {
                $data = Property::where('landholder_id', $id)->orderby('id', 'DESC')->get();
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions', function ($data) {
                        $btn = '<a href="' . url('admin/landholder_property/view', $data->id) . '" class="btn btn-sm btn-success">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['Actions'])
                    ->make(true);
            }
            return view('admin.landholder.landholder_property_list', compact('id'));
        }
        catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('/');
        }
    }
    
    public function LandholerPropertyView(string $id){
        $data = Property::where('id', $id)->first();
        return view('admin.landholder.landholder_property_view', compact('data'));
    }
    
}
