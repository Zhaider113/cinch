@extends('layouts.admin.app')
@section('content')

<div class="mt-3">
    <div class="row">
        <div class="col-md-12 text-center">
            <!--<h4>User Requests</h4>-->
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
                    <h6 class="m-0 font-weight-bold text-primary">Event Times</h6>
                </div>
                <a href="{{route ('admin.event-times.create')}}" type="button" class="btn btn-primary" style="width:10%; height:auto; max-width:300px;margin-left: 87%;margin-top:-45px">
                    <i class="fa fa-plus" aria-hidden="true"></i> New
                </a>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>                        
                                    <th>Event Center Name</th>  
                                    <th>Event time</th>                                        
                                    <th>Event Duration</th>                                      
                                    <th>Event Capacity</th>
                                    <th>Host Name</th>
                                    <th>Host Picture</th>
                                    <th>Competition Level</th>
                                    <th>Game Type</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>                        
                                    <th>Event Center Name</th>  
                                    <th>Event time</th>                                        
                                    <th>Event Duration</th>                                      
                                    <th>Event Capacity</th>
                                    <th>Host Name</th>
                                    <th>Host Picture</th>
                                    <th>Competition Level</th>
                                    <th>Game Type</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($event_times as $event_time)                           
                                    <tr>
                                        <td>{{$event_time->id}}</td>
                                        <td>{{$event_time->event_center_details->venue}}</td>
                                        <td>{{$event_time->event_time}} / {{$event_time->event_date}}</td>
                                        <td>{{$event_time->event_duration}}</td>
                                        <td>{{$event_time->event_capacity}}</td>  
                                        <td>{{$event_time->host_name}}</td>
                                        <td>
                                            <div style = "margin-left: 3px; width: 30px; height: 30px; background: url({{ asset($event_time->host_image) }}); background-size: contain; background-repeat: no-repeat;"></div>
                                        </td>
                                        <td>{{$event_time->competition_level}}</td>
                                        <td>{{$event_time->game_type}}</td>
                                        <td>{{$event_time->price}} {{$event_time->price_currency}}</td>
                                        <td>                                            
                                            <div class="row pl-3">  
                                                <div class = "col-md-6 col-6">
                                                    <a href="{{route ('admin.event-times.edit',$event_time->id)}}" class = "btn btn-sm btn-circle btn-outline-primary" style = "margin-left: -10px;" data-toggle="tooltip" title="Edit Event Time"><i class = "fa fa-edit"></i></a>
                                                </div> 
                                                <div class = "col-md-6 col-6">
                                                    <form action="{{route ('admin.event-times.destroy',$event_time->id)}}" method = "POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type = "submit" name = "submit" value = "submit" data-toggle="tooltip" title="Delete Event Time" onclick = "return confirm('Do You Really Want to Delete?')" class = "btn btn-sm btn-circle btn-outline-danger" style = "margin-left: -10px;"><i class = "fa fa-trash"></i></button>
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
</div> 
    
@endsection