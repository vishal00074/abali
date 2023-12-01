<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminUserController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\WebPagesController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\PaymentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//ADMIN ROUTES______________________________________________________________________________!|
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
    
    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('adminDashboard');
        Route::get('/signout',  [AdminAuthController::class, 'adminLogout']);
        
        Route::get('/about_us',  [WebPagesController::class, 'About_us']);
        Route::post('/about_us/post',  [WebPagesController::class, 'About_us_post']);
        
        Route::get('/contact_us',  [WebPagesController::class, 'Contact_us']);
        Route::post('/contact_us/post',  [WebPagesController::class, 'Contact_us_post']);
        Route::get('policy',[WebPagesController::class, 'policy']);
        Route::post('policy/post',[WebPagesController::class, 'policy_post']);
        
        Route::get('terms',[WebPagesController::class, 'terms']);
        Route::post('terms/post',[WebPagesController::class, 'terms_post']);
        
        Route::get('/general',  [WebPagesController::class, 'General']);
        Route::post('/general/post',  [WebPagesController::class, 'General_post']);
        Route::post('/footer/post',  [WebPagesController::class, 'Footer_post']);
        
        Route::get('/home_header', [WebPagesController::class, 'Home_header'])->name('admin.home_header.index');
        Route::get('/home_header/add',  [WebPagesController::class, 'Home_header_add']);
        Route::post('/home_header/post',  [WebPagesController::class, 'Home_header_post']);
        Route::get('home_header/{id}',[WebPagesController::class, 'Home_header_show']);
        Route::post('home_header/update/{id}',[WebPagesController::class, 'Home_header_update']);
        Route::delete('home_header/delete/{id}',[WebPagesController::class, 'home_header_delete']);
        Route::get('/user_queries', [WebPagesController::class, 'User_Queries']);
        Route::delete('/user_queries/{id}', [WebPagesController::class, 'User_Queries_Delete']);
        
        Route::get('/logo',[WebPagesController::class, 'Logo']);
        Route::get('/logo/add',[WebPagesController::class, 'Logo_add']);
        Route::post('/logo/post',[WebPagesController::class, 'Logo_post']);
        Route::get('/logo/{id}',[WebPagesController::class, 'Logo_edit']);
        Route::post('/logo/update/{id}',[WebPagesController::class, 'Logo_update']);
        Route::delete('/logo/delete/{id}',[WebPagesController::class, 'Logo_delete']);
        Route::get('/home', [WebPagesController::class, 'Home']);
        Route::get('/home_property/add', [WebPagesController::class, 'Home_add_property']);
        Route::post('/home_property/post', [WebPagesController::class, 'Home_property_post']);
        Route::post('/facilities/{id}', [WebPagesController::class, 'Facilities_update']);


        /**----   User Routes ----- */
        Route::get('/user_list',[AdminUserController::class, 'Userlist']);
        Route::get('/get_landholder_list',[AdminUserController::class, 'LandHolderList']);
        Route::delete('/delete_user/{id}',[AdminUserController::class, 'DeleteUser']);
        Route::get('edit/{id}',[AdminUserController::class, 'Edit'])->name('user_edit');
        Route::patch('update_user/{id}',[AdminUserController::class, 'UpdateUser']);

        Route::get('/add_user',[AdminUserController::class, 'AddUser']);
        Route::post('/submituser',[AdminUserController::class, 'Submituser']);
        
        /**-- Property---*/
        Route::get('/property_list',[AdminUserController::class, 'PropertyList']);
        Route::get('/add_property',[AdminUserController::class, 'Add_Property']);
        Route::post('/submitproperty',[AdminUserController::class, 'Post_Property']);
        Route::get('approve',[AdminUserController::class, 'Approve']);
        Route::get('not_approved',[AdminUserController::class, 'NotApproved']);
        Route::get('property_edit/{id}',[AdminUserController::class, 'Edit_Property'])->name('property_edit');
        Route::get('property_list/{id}',[AdminUserController::class, 'List_Property'])->name('property_list');
        Route::post('update_property/{id}',[AdminUserController::class, 'Update_Property']);
        Route::delete('/delete_property/{id}',[AdminUserController::class, 'DeleteProperty']);
        Route::get('landholder_property/view/{id}',[AdminUserController::class, 'LandholerPropertyView']);


        Route::get('bookings', [AdminBookingController::class, 'index']);
        Route::get('view_booking/{id}', [AdminBookingController::class, 'veiw_booking']);
        
        Route::get('payments', [AdminBookingController::class, 'AdminPayment']);

        
    });
    
    

});
//END - ADMIN ROUTES________________________________________________________________________!|







//WEB ROUTES________________________________________________________________________________!|
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'About']);
Route::get('contact',[HomeController::class, 'Contact']);
Route::get('policy',[HomeController::class, 'policy']);
Route::get('terms',[HomeController::class, 'terms']);
Route::get('code',[HomeController::class, 'Longitude']);
Route::view('thankyou', 'pages.thankyou');


/**--   Registration routes  --*/
Route::get('sign_up',[RegisterController::class, 'Register']);
Route::post('registration',[RegisterController::class, 'Registration']);
Route::get('login', [RegisterController::class, 'Login']);
Route::get('otp', [RegisterController::class, 'OTP']);
Route::get('get_otp/{id}', [RegisterController::class, 'GetOtp'])->name('otp.verification');
Route::post('verifyotp', [RegisterController::class, 'VerifyOTP']);
Route::get('resend_otp/{id}',[RegisterController::class, 'ResendOtp']);
Route::get('/login', [RegisterController::class, 'Login'])->name('user.login');
Route::post('/logged_in', [RegisterController::class, 'LoggedIn']);


/**--   Forget-Password routes  --*/
Route::get('forget_password',[RegisterController::class, 'Forget_Password']);
Route::post('send/otp',[RegisterController::class, 'SubmitRequest']);
Route::get('forget-password',[RegisterController::class, 'verificationMail']);
Route::post('forget-password',[RegisterController::class, 'ForgetPassword']);




//user ROUTES___________________________________________________________________
Route::post('user_queries',[UserController::class, 'CustomerQuery']);
Route::view('room_details', 'pages.roomdetail');
// END user ROUTES______________________________________________________________



/** --  Property Routes --*/
Route::get('properties',[PropertyController::class, 'Property']);
Route::get('property-details/{id}',[PropertyController::class, 'PropertyDetail'])->name('property.detail');
Route::post('find_property',[PropertyController::class, 'FindProperty']);



Route::group(['middleware'=>'auth'], function() {
    Route::get('/profile', [UserController::class, 'Show_Profile']);
    Route::post('/update_profile', [UserController::class, 'Update_Profile']);
    Route::get('/sign_out', [RegisterController::class, 'SignOut']);
    Route::get('add_properties', [PropertyController::class, 'AddProperty']);
    Route::post('add_properties/post', [PropertyController::class, 'PropertyPost']);
    Route::post('property-details/{id}',[PropertyController::class, 'PostPropertyDetail']);
    
    Route::controller(PaymentController::class)->group(function(){
        Route::get('stripe/{id}', 'stripe');
        Route::post('stripe', 'stripePost')->name('stripe.post');
        Route::get('paypal_payment/{id}', 'paypal_payment');
        Route::post('paypal_post', 'paypalPost');
    });
    
    // Route::get('paypal', [PaymentController::class, 'paypal']);
    // Route::post('amount_post', [PaymentController::class, 'amountPost']);
    Route::get('success/{id}', [PaymentController::class, 'success']);
    Route::get('error', [PaymentController::class, 'error']);
    
});


/** --  Payment Routes --*/


//END - WEB ROUTES__________________________________________________________________________!|