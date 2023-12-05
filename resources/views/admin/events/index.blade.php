@extends('layouts.admin.app')
@section('content')

<div class="mt-3">
    <div class="row">
        <div class="col-md-9 ">
            <h4>Event List</h4>
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
        <div class="col-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route ('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Events List</li>
                </ol>
            </nav>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Event Data</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>                        
                                    <th>Name</th>                                        
                                    <th>Location</th>                                      
                                    <th>Start Date</th>  
                                    <th>End Date</th>  
                                    <th>Days</th>   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>                        
                                    <th>Name</th>                                        
                                    <th>Location</th>                                      
                                    <th>Start Date</th>  
                                    <th>End Date</th>  
                                    <th>Days</th>  
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($events as $key=>$event)                            
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img class="img-profile rounded-circle btn-circle"
                                                    src="{{ asset($event->event_banner) }}">
                                                    {{ $event->event_title }}
                                        </td>
                                        <td>{{ $event->location }}</td>
                                        <td>{{ $event->start_date }}</td>
                                        <td>{{ $event->end_date }}</td>
                                        <td>{{ $event->days }}</td>
                                        <td>                                            
                                            <div class="row pl-3">                                                    
                                                <div class = "col-md-2">
                                                    <form action="{{ route('admin.events.destroy', $event->id) }}" method = "POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type = "submit" name = "submit" value = "submit" data-toggle="tooltip" title="Delete Event" onclick = "return confirm('Do You Really Want to Delete?')" class = "btn btn-sm btn-circle btn-outline-danger" style = "margin-left: -10px;"><i class = "fa fa-trash"></i></button>
                                                    </form>
                                                </div> 
                                                <div class="col-md-2 ml-2">
                                                    <button type = "buttton" name = "edit" data-toggle="tooltip" title="Edit Event"  class = "btn btn-sm btn-circle btn-outline-primary" style = "margin-left: -10px;"><i class = "fa fa-pen"></i></button>
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