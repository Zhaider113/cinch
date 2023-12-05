<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RidePost;
use App\Models\Booking;
use App\Models\UserVehicle;
use App\Models\PickupPoint;

class AdminNavigationController extends Controller
{
    public function dashboard(Request $request)
    {
        $verified_users = User::where('type', '1')->where('is_verified', '1')->count();
        $users = User::where('type', '1')->where('is_verified', '0')->get();
        $posts = RidePost::get();
        $bookings = Booking::get();
        $vehicles = UserVehicle::get();
        $pickupPoints = PickupPoint::get();
        return view('admin.dashboard', compact(['users', 'verified_users', 'posts', 'bookings', 'vehicles', 'pickupPoints']));
    }  
}
