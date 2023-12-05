@extends('layouts.admin.app')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{route ('admin.users.index')}}" style="text-decoration: none;">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $verified_users }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>    
    </div>
    <!-- total Rides -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Rides</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $posts->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Bookings  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Bookings</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $bookings->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Vehicles -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Vehicles</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $vehicles->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-car fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Pickup Points  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pickup Points</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $pickupPoints->count() }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-map-marker fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="col-xl-3 col-md-6 mb-4">-->
    <!--    <div class="card border-left-primary shadow h-100 py-2">-->
    <!--        <div class="card-body">-->
    <!--            <div class="row no-gutters align-items-center">-->
    <!--                <div class="col mr-2">-->
    <!--                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">-->
    <!--                        Messages</div>-->
    <!--                    <div class="h5 mb-0 font-weight-bold text-gray-800">-->
    <!--                        {{ $users->count() }}-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-auto">-->
    <!--                    <i class="fas fa-users fa-2x text-gray-300"></i>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="col-xl-3 col-md-6 mb-4">-->
    <!--    <div class="card border-left-primary shadow h-100 py-2">-->
    <!--        <div class="card-body">-->
    <!--            <div class="row no-gutters align-items-center">-->
    <!--                <div class="col mr-2">-->
    <!--                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">-->
    <!--                        Notifications</div>-->
    <!--                    <div class="h5 mb-0 font-weight-bold text-gray-800">-->
    <!--                        {{ $users->count() }}-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-auto">-->
    <!--                    <i class="fas fa-users fa-2x text-gray-300"></i>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
</div>

    <!-- <div class="mt-3">
        <div class="row">
            <div class="col-md-12 text-left">
                <h5>Recent Registered Users</h5>
                @if(session()->has('message'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger text-center">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
        </div> 
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>                        
                                        <th>Name</th>    
                                        <th>Username</th>
                                        <th>Email</th>                                      
                                        <th>Phone</th>    
                                        <td>Profile Image</td>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>                        
                                        <th>Name</th>  
                                        <th>Username</th>
                                        <th>Email</th>                                      
                                        <th>Phone</th>  
                                        <td>Profile Image</td>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username}}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td><div style = "margin-left: 3px; width: 40px; height: 40px; background: url({{ asset($user->profile_image) }}); background-size: contain; background-repeat: no-repeat;"></div></td>
                                            <td>
                                                <div class="row pl-3">                                                    
                                                    <div class = "col-md-2 col-6">
                                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method = "POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type = "submit" name = "submit" value = "submit" data-toggle="tooltip" title="Delete User" onclick = "return confirm('Do You Really Want to Delete?')" class = "btn btn-sm btn-circle btn-outline-danger" style = "margin-left: -10px;"><i class = "fa fa-trash"></i></button>
                                                        </form>
                                                    </div>     
                                                </div> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> -->

<!-- Content Row -->

<!--<div class="row">-->

    <!-- Area Chart -->
<!--    <div class="col-xl-8 col-lg-7">-->
<!--        <div class="card shadow mb-4">-->
            <!-- Card Header - Dropdown -->
<!--            <div-->
<!--                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">-->
<!--                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>-->
<!--                <div class="dropdown no-arrow">-->
<!--                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"-->
<!--                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>-->
<!--                    </a>-->
<!--                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"-->
<!--                        aria-labelledby="dropdownMenuLink">-->
<!--                        <div class="dropdown-header">Dropdown Header:</div>-->
<!--                        <a class="dropdown-item" href="#">Action</a>-->
<!--                        <a class="dropdown-item" href="#">Another action</a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="#">Something else here</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--             Card Body -->
<!--            <div class="card-body">-->
<!--                <div class="chart-area">-->
<!--                    <canvas id="myAreaChart"></canvas>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <!-- Pie Chart -->
<!--    <div class="col-xl-4 col-lg-5">-->
<!--        <div class="card shadow mb-4">-->
            <!-- Card Header - Dropdown -->
<!--            <div-->
<!--                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">-->
<!--                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>-->
<!--                <div class="dropdown no-arrow">-->
<!--                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"-->
<!--                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>-->
<!--                    </a>-->
<!--                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"-->
<!--                        aria-labelledby="dropdownMenuLink">-->
<!--                        <div class="dropdown-header">Dropdown Header:</div>-->
<!--                        <a class="dropdown-item" href="#">Action</a>-->
<!--                        <a class="dropdown-item" href="#">Another action</a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="#">Something else here</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <!-- Card Body -->
<!--            <div class="card-body">-->
<!--                <div class="chart-pie pt-4 pb-2">-->
<!--                    <canvas id="myPieChart"></canvas>-->
<!--                </div>-->
<!--                <div class="mt-4 text-center small">-->
<!--                    <span class="mr-2">-->
<!--                        <i class="fas fa-circle text-primary"></i> Direct-->
<!--                    </span>-->
<!--                    <span class="mr-2">-->
<!--                        <i class="fas fa-circle text-success"></i> Social-->
<!--                    </span>-->
<!--                    <span class="mr-2">-->
<!--                        <i class="fas fa-circle text-info"></i> Referral-->
<!--                    </span>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- Content Row -->
<!--<div class="row">-->

    <!-- Content Column -->
<!--    <div class="col-lg-6 mb-4">-->

        <!-- Project Card Example -->
<!--        <div class="card shadow mb-4">-->
<!--            <div class="card-header py-3">-->
<!--                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>-->
<!--            </div>-->
<!--            <div class="card-body">-->
<!--                <h4 class="small font-weight-bold">Server Migration <span-->
<!--                        class="float-right">20%</span></h4>-->
<!--                <div class="progress mb-4">-->
<!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"-->
<!--                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                </div>-->
<!--                <h4 class="small font-weight-bold">Sales Tracking <span-->
<!--                        class="float-right">40%</span></h4>-->
<!--                <div class="progress mb-4">-->
<!--                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"-->
<!--                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                </div>-->
<!--                <h4 class="small font-weight-bold">Customer Database <span-->
<!--                        class="float-right">60%</span></h4>-->
<!--                <div class="progress mb-4">-->
<!--                    <div class="progress-bar" role="progressbar" style="width: 60%"-->
<!--                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                </div>-->
<!--                <h4 class="small font-weight-bold">Payout Details <span-->
<!--                        class="float-right">80%</span></h4>-->
<!--                <div class="progress mb-4">-->
<!--                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%"-->
<!--                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                </div>-->
<!--                <h4 class="small font-weight-bold">Account Setup <span-->
<!--                        class="float-right">Complete!</span></h4>-->
<!--                <div class="progress">-->
<!--                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"-->
<!--                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <!-- Color System -->
<!--        <div class="row">-->
<!--            <div class="col-lg-6 mb-4">-->
<!--                <div class="card bg-primary text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                        Primary-->
<!--                        <div class="text-white-50 small">#4e73df</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-6 mb-4">-->
<!--                <div class="card bg-success text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                        Success-->
<!--                        <div class="text-white-50 small">#1cc88a</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-6 mb-4">-->
<!--                <div class="card bg-info text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                        Info-->
<!--                        <div class="text-white-50 small">#36b9cc</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-6 mb-4">-->
<!--                <div class="card bg-warning text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                        Warning-->
<!--                        <div class="text-white-50 small">#f6c23e</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-6 mb-4">-->
<!--                <div class="card bg-danger text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                        Danger-->
<!--                        <div class="text-white-50 small">#e74a3b</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-6 mb-4">-->
<!--                <div class="card bg-secondary text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                        Secondary-->
<!--                        <div class="text-white-50 small">#858796</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-6 mb-4">-->
<!--                <div class="card bg-light text-black shadow">-->
<!--                    <div class="card-body">-->
<!--                        Light-->
<!--                        <div class="text-black-50 small">#f8f9fc</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-6 mb-4">-->
<!--                <div class="card bg-dark text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                        Dark-->
<!--                        <div class="text-white-50 small">#5a5c69</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--    </div>-->

<!--    <div class="col-lg-6 mb-4">-->

        <!-- Illustrations -->
<!--        <div class="card shadow mb-4">-->
<!--            <div class="card-header py-3">-->
<!--                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>-->
<!--            </div>-->
<!--            <div class="card-body">-->
<!--                <div class="text-center">-->
<!--                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"-->
<!--                        src="{{ asset('img/undraw_posting_photo.svg') }}" alt="...">-->
<!--                </div>-->
<!--                <p>Add some quality, svg illustrations to your project courtesy of <a-->
<!--                        target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a-->
<!--                    constantly updated collection of beautiful svg images that you can use-->
<!--                    completely free and without attribution!</p>-->
<!--                <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on-->
<!--                    unDraw &rarr;</a>-->
<!--            </div>-->
<!--        </div>-->

        <!-- Approach -->
<!--        <div class="card shadow mb-4">-->
<!--            <div class="card-header py-3">-->
<!--                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>-->
<!--            </div>-->
<!--            <div class="card-body">-->
<!--                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce-->
<!--                    CSS bloat and poor page performance. Custom CSS classes are used to create-->
<!--                    custom components and custom utility classes.</p>-->
<!--                <p class="mb-0">Before working with this theme, you should become familiar with the-->
<!--                    Bootstrap framework, especially the utility classes.</p>-->
<!--            </div>-->
<!--        </div>-->

<!--    </div>-->
<!--</div>-->

</div>
@endsection