<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ContactUs,Seo,Aboutus,Header,Home,Home_Header,Policy,SocialLinks,User_quries,Logo,Facilities,Property,Home_Property};
use Session;

class WebPagesController extends Controller
{
    public function About_us(){
        $about = Aboutus::first();
        $seo = Seo::where('type','LIKE','about_page')->first();
        return view('admin.webpages.about.edit',compact('about','seo'));
    }
    public function about_us_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['seo_title']);
            unset($data['seo_keyword']);
            unset($data['seo_description']);
            if($request->file('image')){
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('frontend/assets/images/'), $name);
                $data['image'] = url('public/'.'frontend/assets/images/'.$name);
            }
            if($request->file('image1')){
                $name = $request->file('image1')->getClientOriginalName();
                $request->file('image1')->move(public_path('frontend/assets/images/'), $name);
                $data['image1'] = url('public/'.'frontend/assets/images/'.$name);
            }
            if($request->file('background_image')){
                $name = $request->file('background_image')->getClientOriginalName();
                $request->file('background_image')->move(public_path('frontend/assets/images/'), $name);
                $data['background_image'] = url('public/'.'frontend/assets/images/'.$name);
            }
                
            Aboutus::where('id',$request->get('id'))->update($data);
            
            Seo::where('type','LIKE','about_page')->update([
                'seo_title' => $request->seo_title,
                'seo_keyword' => $request->seo_keyword,
                'seo_description' => $request->seo_description
            ]);
            
            Session::flash('success','Successfully updated about_us details!');
            return redirect('admin/about_us');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function contact_us(){
        $contact = ContactUs::first();
        $seo = Seo::where('type','LIKE','contact_page')->first();
        return view('admin.webpages.contact.edit',compact('contact','seo'));
    }
    
    public function Contact_us_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['id']);
            unset($data['seo_title']);
            unset($data['seo_keyword']);
            unset($data['seo_description']);
            if($request->file('background_image')){
                $name = $request->file('background_image')->getClientOriginalName();
                $request->file('background_image')->move(public_path('frontend/assets/images/'), $name);
                $data['background_image'] = url('public/'.'frontend/assets/images/'.$name);
            }
            
            ContactUs::where('id',$request->get('id'))->update($data);
            
            Seo::where('type','LIKE','contact_page')->update([
                'seo_title' => $request->seo_title,
                'seo_keyword' => $request->seo_keyword,
                'seo_description' => $request->seo_description
            ]);
            
            Session::flash('success','Successfully updated contact_us details!');
            return redirect('/admin/contact_us');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function General(Request $request){
        $general = SocialLinks::first();
        $footer = ContactUs::first();
        return view('/admin/general/edit', compact('general','footer'));
    }
    
    public function general_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['logo']);
            if ($request->hasFile('logo')) {
                    $logo = $request->file('logo');
                    $name = $logo->getClientOriginalName();
                    $logo->move(public_path('frontend/img/'), $name);
                    $image = asset('frontend/img/' . $name); // Use asset() to generate URL
                }
            ContactUs::where('id',$request->get('id'))->update(['logo' =>$image ]);
            SocialLinks::find($data['id'])->update($data);
            Session::flash('success','Successfully updated General details!');
            return redirect('/admin/general');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function Footer_post(Request $request){
        try{
            $data = $request->all();
            // dd($data);
            unset($data['_token']);
            
                // Update footer
               $contactUs = ContactUs::find($data['id']);
               if ($contactUs) {
                $contactUs->update([
                    'footer_title' => $request->footer_title,
                    'footer_description' => $request->footer_description,
                    'copyright' => $request->copyright
                    ]);
                Session::flash('success', 'Successfully updated footer details!');
                return redirect('/admin/general');
                }
                
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function Home_header(Request $request){
        try {
            if($request->ajax()) {
                $data = Home_Header::orderby('id','DESC');
                
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions',function($data){
                        $btn = '<a href="'. url('admin/home_header', $data->id ) .'" class="btn btn-sm btn-success">Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-id="'. $data->id .'" class="delete-header btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('name', 'LIKE', "%$search%")->orWhere('header_type', 'LIKE', "%$search%");
                            });
                        }
                    })
                    
                    ->rawColumns(['Actions'])
                    ->make(true);
            } else {
                return view('admin.home_header.index');
            }
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function Home_header_add(){
        return view('admin.home_header.add');
    }
    
    public function home_header_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            
            //image____________________
            if($request->file('background_image')){
                $name = $request->file('background_image')->getClientOriginalName();
                $request->file('background_image')->move(public_path('frontend/img/slider/'), $name);
                $data['background_image'] = url('public/'.'frontend/img/slider/'.$name);
            }
            
            Home_Header::insert($data);
            Session::flash('success','Successfully added home-header details!');
            return redirect('/admin/home_header');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function Home_header_show($id){
        $header = Home_Header::find($id);
        return view('admin.home_header.edit',compact('header'));
    }
    
     public function home_header_update(Request $request, string $id){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            
            //image____________________
            if($request->file('background_image')){
                $name = $request->file('background_image')->getClientOriginalName();
                $request->file('background_image')->move(public_path('frontend/img/slider/'), $name);
                $data['background_image'] = url('public/'.'frontend/img/slider/'.$name);
            }
            
            Home_Header::find($id)->update($data);
            Session::flash('success','Successfully updated home-header details!');
            return redirect('/admin/home_header');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    
    }
    
    public function home_header_delete(string $id){
        try{
            
            $header = Home_Header::find($id)->delete();
            
        }catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function User_Queries(Request $request){
        try{
            if($request->ajax()){
                $data = User_quries::orderby('id','DESC')->get();
                
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions',function($data){
                        // $btn = '<a href="'. route('users.edit', $data->id ) .'" class="btn btn-sm btn-success">Edit</a>';
                        $btn = '<a href="javascript:void(0)" data-id="'. $data->id .'" class="delete-queries btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['Actions'])
                    ->make(true);
            }else{
                return view('admin.user.user_queries');
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect('/');
        }
    }
    
    public function User_Queries_Delete(string $id){
        try{
            
            $header = User_quries::find($id)->delete();
            
        }catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function Logo(){
        $logo = Logo::orderBy('id','asc')->get();
        return view('admin.webpages.logo.index', compact('logo'));
    }
    
    public function Logo_add(){
        return view('admin.webpages.logo.add');
    }
    
    public function Logo_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            
            //image____________________
            if($request->file('image')){
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('frontend/img/clients/'), $name);
                $data['image'] = url('public/'.'frontend/img/clients/'.$name);
            }
            
            Logo::create($data);
            Session::flash('success','Successfully added Logo details!');
            return redirect('/admin/logo');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function Logo_edit($id){
        $logo = Logo::where('id','=',$id)->first();
        return view('admin.webpages.logo.edit', compact('logo'));
    }
    
    public function Logo_update(Request $request, string $id){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            
            //image____________________
            if($request->file('image')){
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('frontend/img/clients/'), $name);
                $data['image'] = url('public/'.'frontend/img/clients/'.$name);
            }
            
            Logo::find($id)->update($data);
            Session::flash('success','Successfully updated Logo details!');
            return redirect('/admin/logo');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    
    
    public function Logo_delete(string $id){
        try{
            $logo = Logo::find($id)->delete();
        }catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function Home(){
        $facilities = Facilities::orderBy('id','asc')->where('id','=',1)->first();
        $facilities1 = Facilities::orderBy('id','asc')->where('id','=',2)->first();
        $facilities2 = Facilities::orderBy('id','asc')->where('id','=',3)->first();
        $facilities3 = Facilities::orderBy('id','asc')->where('id','=',4)->first();
        $facilities4 = Facilities::orderBy('id','asc')->where('id','=',5)->first();
        $facilities5 = Facilities::orderBy('id','asc')->where('id','=',6)->first();
        $property_landscape = \DB::table('properties') // landscape
            ->select('properties.*')
            ->join('home_properties', 'home_properties.property_id', '=', 'properties.id')
            ->where('home_properties.type', '=', '0')
            ->take(2) // Use integer value 3, not '3' as a string
            ->orderBy('home_properties.id', 'DESC')
            ->get();
        
        $property_portrait = \DB::table('properties') // portrait
            ->select('properties.*')
            ->join('home_properties', 'home_properties.property_id', '=', 'properties.id')
            ->where('home_properties.type', '=', '1')
            ->take(3) // Use integer value 2, not '2' as a string
            ->orderBy('home_properties.id', 'DESC')
            ->get();
        // dd($property_portrait);        
        
        // dd($facilities1);
        return view('admin.webpages.home.edit', compact('property_portrait','property_landscape','facilities','facilities1','facilities2','facilities3','facilities4','facilities5'));
    }
    
    public function Home_add_property(){
        $property = Property::orderBy('id','asc')->get();
        return view('admin.webpages.home.add_property', compact('property'));
    }
    
    public function Home_property_post(Request $request){
        // dd($request);
        try{
            $data = $request->all();
            unset($data['_token']);
            // dd($data['property_id']);
            if ($data['property_id']) {
                $existingProperty = Home_Property::where('id', $data['property_id'])->exists();
                if($existingProperty){
                    Session::flash('error','Property already existed.');
                    return redirect()->back();
                }
                Home_Property::create($data);
                Session::flash('success','Successfully added Home Property.');
                return redirect('/admin/home');
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function Facilities_update(Request $request, string $id){
        try{
            $data = $request->all();
            unset($data['_token']);
            
            //image____________________
            if($request->file('image')){
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('frontend/img/clients/'), $name);
                $data['image'] = url('public/'.'frontend/img/clients/'.$name);
            }
            
            Facilities::find($id)->update($data);
            Session::flash('success','Successfully updated Features details!');
            return redirect('/admin/home');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function policy(Request $request){
        $policy = Policy::where('type','LIKE','policy')->first();
        $seo = Seo::where('type','LIKE','policy_page')->first();
        return view('admin.webpages.policy.edit', compact('policy','seo'));
    }
    
    public function policy_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['seo_title']);
            unset($data['seo_keyword']);
            unset($data['seo_description']);
            
            Policy::where('type','LIKE','policy')->update($data);
            
            Seo::where('type','LIKE','policy_page')->update([
                'seo_title' => $request->seo_title,
                'seo_keyword' => $request->seo_keyword,
                'seo_description' => $request->seo_description
            ]);
            
            Session::flash('success','Successfully updated privacy policy details!');
            return redirect()->back();
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    // Terms___________________________________________________________________
    public function terms(Request $request){
        $terms = Policy::where('type','LIKE','terms')->first();
        $seo = Seo::where('type','LIKE','terms_page')->first();
        return view('admin.webpages.terms.edit', compact('terms','seo'));
    }
    
    public function terms_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['seo_title']);
            unset($data['seo_keyword']);
            unset($data['seo_description']);
            
            Policy::where('type','LIKE','terms')->update($data);
            
            Seo::where('type','LIKE','terms_page')->update([
                'seo_title' => $request->seo_title,
                'seo_keyword' => $request->seo_keyword,
                'seo_description' => $request->seo_description
            ]);
            
            Session::flash('success','Successfully updated terms & conditions details!');
            return redirect()->back();
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    // End-Policy___________________________________________________________________
    
}
