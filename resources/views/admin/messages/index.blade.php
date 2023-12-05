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
                    <h6 class="m-0 font-weight-bold text-primary">Messages Data</h6>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>                        
                                    <th>Message From</th> 
                                    <th>Message To</th>                                         
                                    <th>Message Type</th>                                      
                                    <th>Message</th>                                                                                  
                                    <th>Media</th>
                                    <th>Media Type</th>
                                    <th>Time</th>
                                    <th>Seen</th>
                                    <th>Actions</th>                                                                               
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>                        
                                    <th>Message From</th> 
                                    <th>Message To</th>                                         
                                    <th>Message Type</th>                                      
                                    <th>Message</th>                                                                                  
                                    <th>Media</th>
                                    <th>Media Type</th>
                                    <th>Time</th>
                                    <th>Seen</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($messages as $message)                           
                                    <tr>
                                        <td>{{$message->id}}</td>
                                        <td>11</td>
                                        <td>11</td>
                                        <td>{{$message->message_type}}</td>
                                        <td>{{$message->text}}</td>   
                                        <td>
                                            <div style = "margin-left: 3px; width: 40px; height: 40px; background: url({{ asset($message->media) }}); background-size: contain; background-repeat: no-repeat;"></div>
                                        </td>
                                        <td>{{$message->media_type}}</td>
                                        <td>{{ date('d-m-Y', strtotime($message->time)) }}</td>
                                        <td>{{$message->seen}}</td>
                                        <td>                                            
                                            <div class="row pl-3">                                                    
                                                <div class = "col-md-2 col-6">
                                                    <form action="{{route('admin.messages.destroy',$message->id)}}" method = "POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type = "submit" name = "submit" value = "submit" data-toggle="tooltip" title="Delete message record" onclick = "return confirm('Do You Really Want to Delete?')" class = "btn btn-sm btn-circle btn-outline-primary" style = "margin-left: -10px;"><i class = "fa fa-trash"></i></button>
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