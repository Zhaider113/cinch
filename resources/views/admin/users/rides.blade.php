@extends('layouts.admin.app')
@section('content')

<div class="mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-5">
                    <li class="breadcrumb-item"><a href="{{route ('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route ('admin.users.index')}}">User List</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.users.show', ['user' => $post->user_id])}}">{{$post->user->first_name}}'s</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ride Detail</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            @if(session()->has('message'))
                <div class="alert alert-success text-center alert-dismissible " role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger text-center alert-dismissible" role="alert">
                    {{ session()->get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <!-- Ride detail  -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ride Detail</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="mb-0 text-black">{{ $post->ride_title }}</h5>
                            <p class="mb-0">{{$post->ride_type}}</p>
                            <p class="mb-3 text-black-50 pl-3">{{$post->description}}</p>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <span class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Total Seats">
                                    <i class="fas fa-fw fa-chair"></i>
                                </span>
                                {{$post->number_of_seats}}
                                <span class="btn btn-primary btn-circle btn-sm ml-3" data-toggle="tooltip" data-placement="top" title="Seat Price">
                                    <i class="fas fa-fw fa-credit-card"></i>
                                </span>
                                {{$post->price_currency}}{{$post->per_seat_price}}
                            </p>
                            <p>
                                <span class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Pickup Points">
                                    <i class="fas fa-fw fa-map"></i>
                                </span>
                                {{count($post->pickup_points)}}
                            </p>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-borderless mb-0">
                                <thead>
                                    <tr class="pickup-row">
                                        <th scope="col" class="text-black p-0">Pickup</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="pickup-track">
                                        <th>Location</th>
                                        <th> Date & Time</th>
                                    </tr>
                                    <tr class="pickup-track">
                                        <td>{{$post->departure_city}}</td>
                                        <td> {{$post->leaving_date}} {{$post->leaving_time}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-black p-0">Dropoff</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="pickup-track">
                                        <th>Location</th>
                                        <?php if($post->returning_date) { ?>
                                            <th> Date & Time</th>
                                        <?php }?>
                                    </tr>
                                    <tr class="pickup-track">
                                        <td>{{$post->arrival_city}}</td>
                                        <td> {{$post->returning_date}} {{$post->returning_time}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Post Bookings  -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ride Bookings</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>                        
                                    <th>User</th>                                        
                                    <th>Pickup Location</th>                                        
                                    <th>Seat Price</th>   
                                    <th>No of Seats</th>  
                                    <th>Payment</th>                                      
                                    <th>Status</th>   
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>                        
                                    <th>User</th>                                        
                                    <th>Pickup Location</th>                                        
                                    <th>Seat Price</th>   
                                    <th>No of Seats</th>  
                                    <th>Payment</th>                                      
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($post->bookings as $key=>$booking)                            
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img class="img-profile rounded-circle btn-circle"
                                                src="{{ asset($booking->user_details->profile_image) }}">
                                            {{ $booking->user_details->first_name }}&nbsp {{$booking->user_details->last_name}}
                                        </td>
                                        <td>{{ $booking->pickup_point->location }},{{ $booking->pickup_point->city }}</td>
                                        <td>{{ $booking->pickup_point->price }}</td>
                                        <td>{{ $booking->number_of_seats }}</td>
                                        <td>{{ $booking->total_seats_price }}</td>
                                        <td>{{ $booking->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 
    
@endsection
<script>
    setTimeout(() => {
    $('.alert').alert('close');
  }, 2000);
</script>