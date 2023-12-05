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
                    <h6 class="m-0 font-weight-bold text-primary">Users Events</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>                        
                                    <th>Event Center Name</th>  
                                    <th>Event Time</th>                                        
                                    <th>User Name</th>                                      
                                    <th>Receipt Image</th>                                                                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>                        
                                    <th>Event Center Name</th>  
                                    <th>Event Time</th>                                        
                                    <th>User Name</th>                                      
                                    <th>Receipt Image</th>                                                                                  
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($user_events as $user_event)                     
                                    <tr>
                                        <td>{{$user_event->id}}</td>
                                        <td>{{$user_event->event_center_details->venue}}</td>
                                        <td>{{$user_event->event_time_details->event_time}} / {{$user_event->event_time_details->event_date}}</td>
                                        <td>{{$user_event->user_details->name}}</td>
                                        <td>
                                            <div class="row pl-5">                                                    
                                                <div class = "col-md-2 col-6">
                                                    @if($user_event->receipt_url == null && $user_event->receipt_url == "")
                                                    <a></a>
                                                    @else
                                                    <a href="{{ $user_event->receipt_url}}" class = "btn btn-sm btn-circle btn-outline-success" style = "margin-left: -10px;" data-toggle="tooltip" title="click to view receipt"><i class = "fa fa-eye"></i></a>
                                                    @endif
                                                </div> 
                                            </div>     
                                        </td>                                
                                        <td>                                            
                                            <div class="row pl-3">                                                    
                                                <div class = "col-md-2 col-6">
                                                    <form action="{{route ('admin.user-events.destroy',$user_event->id)}}" method = "POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" name="submit" value="submit" data-toggle="tooltip" title="Delete User" onclick="return confirm('Do You Really Want to Delete?')" class="btn btn-sm btn-circle btn-outline-danger" style = "margin-left: -10px;"><i class = "fa fa-trash"></i></button>
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