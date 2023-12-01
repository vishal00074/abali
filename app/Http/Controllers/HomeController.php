<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\{Policy};
use stdClass;
class HomeController extends Controller
{
    public function index(Request $request)
    
    {
        
        $property_landscape = \DB::table('properties') 
            ->select('properties.*')
            ->join('home_properties', 'home_properties.property_id', '=', 'properties.id')
            ->where('home_properties.type', '=', '0')
            ->take(2) 
            ->orderBy('home_properties.id', 'DESC')
            ->get();
        
        $property_portrait = \DB::table('properties') 
            ->select('properties.*')
            ->join('home_properties', 'home_properties.property_id', '=', 'properties.id')
            ->where('home_properties.type', '=', '1')
            ->take(3) 
            ->orderBy('home_properties.id', 'DESC')
            ->get();
            
        $seo =\DB::table('seo')->select('*')->where('type', 'home_page')->first();
        // dd($seo);
        return view('home', compact('property_landscape','property_portrait','seo'));
    }
    

    public function About(Request $request)
    {
        
        $seo =\DB::table('seo')->select('*')->where('type', 'about_page')->first();
        return view('pages.about', compact('seo'));
    }
    
    
    
    public function Contact(Request $request)
    {
        $seo =\DB::table('seo')->select('*')->where('type', 'contact_page')->first();
        return view('pages.contact', compact('seo'));
    }
    
    public function policy()
    {
        $policy = Policy::where('type','LIKE','policy')->first();
        $seo =\DB::table('seo')->select('*')->where('type', 'policy_page')->first();
        return view('pages.policy', compact('policy','seo'));
    }
    
    
    public function terms()
    {
        $terms= Policy::where('type','LIKE','terms')->first();
        $seo =\DB::table('seo')->select('*')->where('type', 'terms_page')->first();
        return view('pages.terms', compact('terms','seo'));
    }
    
    // public function Longitude(Request $request)
    // {

    
    //     $address= "Panchkula, Haryana, India";
    //     $encodedAddress = rawurlencode($address);
       
    //     $url = "https://nominatim.openstreetmap.org/search?format=json&q={$encodedAddress}";
    //     $client = new Client();
    
    //     $response = $client->get($url);

    //     $data = $response->getBody()->getContents();

    //     $results = json_decode($data, true);
    
    //     if (!empty($results)) {
    //         $firstResult = $results[0];
    
    //         $latitude = $firstResult['lat'];
    //         $longitude = $firstResult['lon'];
    
    //         return [
    //             'latitude' => $latitude,
    //             'longitude' => $longitude,
    //         ];
    //     }
    
    //     return "False";

        
    
       
    // }
}
