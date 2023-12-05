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
                    <h6 class="m-0 font-weight-bold text-primary">Event Centers</h6>
                    <div class="d-flex justify-content-end">
                        <a href="{{route ('admin.nearby-events.create')}}" type="button" class="btn btn-primary" style="margin-top: -25px; padding: 6px 30px" >
                        <i class="fa fa-plus" aria-hidden="true"></i> New</a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>                        
                                    <th>Venue</th> 
                                    <th>Location</th>                                         
                                    <th>Zipcode</th>                                      
                                    <th>venue_image</th>                                                                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>                        
                                    <th>Venue</th> 
                                    <th>Location</th>                                         
                                    <th>Zipcode</th>                                      
                                    <th>venue_image</th>                                                                                  
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($nearby_events as $nearby_event)                           
                                    <tr>
                                        <td>{{$nearby_event->id}}</td>
                                        <td>{{$nearby_event->venue}}</td>
                                        <td>{{$nearby_event->location}}</td>
                                        <td>{{$nearby_event->zipcode}}</td>
                                        <td>
                                            <div style = "margin-left: 3px; width: 40px; height: 40px; background: url({{ asset($nearby_event->venue_image) }}); background-size: contain; background-repeat: no-repeat;"></div>
                                        </td>                                
                                        <td>                                            
                                            <div class="row pl-3">    
                                                <div class = "col-md-4 col-6">
                                                    <a href="{{route ('admin.nearby-events.edit',$nearby_event->id)}}" class = "btn btn-sm btn-circle btn-outline-primary" style = "margin-left: -10px;" data-toggle="tooltip" title="Edit Event Center"><i class = "fa fa-edit"></i></a>
                                                </div>   
                                                <div class = "col-md-4 col-6">
                                                    <form action="{{route ('admin.nearby-events.destroy',$nearby_event->id)}}" method = "POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type = "submit" name = "submit" value = "submit" data-toggle="tooltip" title="Delete Event Center" onclick = "return confirm('Do You Really Want to Delete?')" class = "btn btn-sm btn-circle btn-outline-danger" style = "margin-left: -10px;"><i class = "fa fa-trash"></i></button>
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