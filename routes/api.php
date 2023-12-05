<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1/auth'], function(){    
    Route::controller(AuthController::class)->group(function(){
        Route::post('signup', 'signup');
        Route::post('login', 'login');
        Route::get('user-data', 'user_data');
        Route::get('forgot-password/{email}', 'forgot_password');
        Route::post('reset-password', 'reset_password');
        Route::post('change-password', 'change_password');
        Route::post('update-profile', 'update_profile');
        Route::get('delete-account', 'delete_account');
        Route::get('logout', 'logout');
        // Route::post('login-with-facebook', 'login_with_facebook');
        // Route::post('login-with-google', 'login_with_google');
        // Route::post('login-with-apple', 'login_with_apple');
        // Route::post('verify-phone', 'verify_phone');
    });             
});

// Route::group(['prefix' => 'v1/app'], function(){    
//     Route::controller(MainController::class)->group(function(){
//         Route::get('user-home', 'user_home');
//         Route::post('ride-post', 'ride_post');
//         Route::get('event-banners', 'event_banners');
//         Route::post('search-post', 'search_post');
//         Route::get('post-details/{post_id}', 'post_details');
//         Route::post('user-vehicles', 'user_vehicles');
//         Route::post('booking', 'booking');
//         Route::post('change-booking-status', 'change_booking_status');
//         Route::post('withdraw-request', 'withdraw_request');
//         Route::get('user-withdraw', 'walletDetails');
//         Route::get('notification-list', 'notification_list');
//         Route::get('booking-details/{booking_id}', 'booking_details');
//         Route::get('options', 'option_list');
//         Route::post('submit-review', 'reviewAndRating');
//     });          
// });
