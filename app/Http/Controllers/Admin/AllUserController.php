<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RidePost;
use App\Models\Booking;
use App\Models\UserVehicle;
use App\Models\PickupPoint;
use Validator;
use App\Mail\AccountConfirmation;
use Mail;

class AllUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', '1')->orderBy('id', 'desc')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::select('id','first_name', 'last_name', 'email', 'profile_image', 'country_code','phone', 'created_at')->find($id);
        $userRides = RidePost::where('user_id', $user->id)->get();
        $userBooking = Booking::where('user_id', $user->id)->count();
        $totalPayment = Booking::where('status', 'completed')->where('user_id', $user->id)->sum('total_seats_price');
        $userVehicles = UserVehicle::where('user_id', $user->id)->get();
        // dd($userRides);
        return view('admin.users.view', compact('user', 'userRides', 'userBooking', 'userVehicles', 'totalPayment'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user = User::where('id', $id)->first();

            if(empty($user))
            {
                return back()->with('error', 'User does not Exists');
            }

            $user->is_verified = 0;
            $user->save();

            return back()->with('message', 'User Disabled.....!');
        }catch(\Exception $e)
        {
            return back()->with('error', 'There is some trouble to proceed your action');
        }
    }

    public function verify_user(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'user_id' => 'required',
                'username' => 'required|unique:users',
                'password' => 'required|min:6'
            ]);

            if($validator->fails())
            {
                return back()->with('error', $validator->errors()->first());
            }

            $user = User::where('id', $request->user_id)->first();
            if(empty($user))
            {
                return back()->with('error', 'User does not Exists');
            }
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->is_verified = '1';
            $user->save();
            
            // \Mail::to($user->email)->send(new AccountConfirmation($user->name, $request->username, $request->password));

            return back()->with('message', 'User Verified');
        }catch(\Exception $e)
        {
            return back()->with('error', $e->getMessage());
        }
    }

    public function verified_users()
    {
        $users = User::where('type', '1')->where('is_verified', '1')->orderBy('id', 'desc')->get();

        return view('admin.users.verified', compact('users'));
    }

    // get user ride details 
    public function userRide(Request $request){
        try {
            $post = RidePost::where('id', $request->ride_id)->first();
            $post->user = $this->user_model($post->user_id);
            // dd($post);
            if(empty($post))
            {
                return $this->error('Post not found');
            }
            $post->pickup_points = PickupPoint::where('post_id', $post->id)->get();
            $post->vehicle_details = UserVehicle::where('id', $post->vehicle_id)->first();
            $bookings = Booking::where('ride_post_id', $post->id)->orderBy('id', 'desc')->get();
            if(!empty($bookings))
            {
                foreach($bookings as $booking)
                {
                    $booking->user_details = $this->user_model($booking->user_id);
                    $booking->pickup_point = PickupPoint::where('id', $booking->pickup_point_id)->first();
                }
            }
            
            $post->bookings = $bookings;
            // dd($post->bookings);
            return view('admin.users.rides', compact('post'));
        
        } catch (\Throwable $th) {
            return back()->with('error','There is some issues to process!');
        }
    }
    // get user info 
    public function user_model($user_id)
    {
        $user = User::where('id', $user_id)->first(['id', 'first_name', 'last_name', 'profile_image']);
        return $user;
    }
}
