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
                    <h6 class="m-0 font-weight-bold text-primary">Event Galleries</h6>
                    <div class="d-flex justify-content-end">
                <a href="{{route ('admin.event-galleries.create')}}" type="button" class="btn btn-primary" style="margin-top: -25px; padding: 6px 30px" >
                    <i class="fa fa-plus" aria-hidden="true"></i> New
                </a></div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>                        
                                    <th>Event Center Name</th>  
                                    <th>Media</th>                                        
                                    <th>Media Type</th>                                                                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>                        
                                    <th>Event Center Name</th>  
                                    <th>Media</th>                                        
                                    <th>Media Type</th>                                                                                  
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($event_galleries as $event_gallery)                        
                                    <tr>
                                        <td>{{$event_gallery->id}}</td>
                                        <td>{{$event_gallery->event_center_details->venue}}</td>
                                        <td>
                                            <div style = "margin-left: 3px; width: 40px; height: 40px; background: url({{ asset($event_gallery->media) }}); background-size: contain; background-repeat: no-repeat;"></div>
                                        </td>
                                        <td>{{$event_gallery->media_type}}</td>                                
                                        <td>                                            
                                            <div class="row pl-3">     
                                                <div class = "col-md-4 col-6">
                                                    <a href="{{route ('admin.event-galleries.edit',$event_gallery->id)}}" class = "btn btn-sm btn-circle btn-outline-primary" style = "margin-left: -10px;" data-toggle="tooltip" title="Edit Event Gallery"><i class = "fa fa-edit"></i></a>
                                                </div>      
                                                <div class = "col-md-4 col-6">
                                                    <form action="{{route ('admin.event-galleries.destroy',$event_gallery->id)}}" method = "POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type = "submit" name = "submit" value = "submit" data-toggle="tooltip" title="Delete Event Gallery" onclick = "return confirm('Do You Really Want to Delete?')" class = "btn btn-sm btn-circle btn-outline-danger" style = "margin-left: -10px;"><i class = "fa fa-trash"></i></button>
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