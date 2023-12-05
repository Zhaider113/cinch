@extends('layouts.admin.app')
@section('content')

<div class="row">
    <div class="col-md-12 text-center">
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

<div class="mt-1">
    <div class="d-flex justify-content-center">   
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Event Time</h6>
            </div>
            <div class="card-body col
            <div class="col">
            <form action="{{route ('admin.event-times.update',$event_time->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="form-outline mb-2">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Event Centers</label>
                            <select name="event_center_id" class="form-control">
                                @foreach($nearby_events as $nearby_event)
                                    <option value="{{$nearby_event->id}}" @if($event_time->event_center_id == $nearby_event->id )selected @endif>{{$nearby_event->venue}}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-outline mb-2">
                                <label class="form-label">Event Date</label>
                                <input type="date" name="event_date" class="form-control" value="{{$event_time->event_date}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Event time</label>
                                <input type="time" name="event_time" class="form-control" value="{{$event_time->event_time}}">
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Event Duration</label>
                                <input type="text" name="event_duration" class="form-control" value="{{$event_time->event_duration}}">
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Event Capacity</label>
                                <input type="number" name="event_capacity" class="form-control" value="{{$event_time->event_capacity}}">
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Host Name</label>
                                <input type="text" name="host_name" class="form-control" value="{{$event_time->host_name}}">
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Host Picture</label>
                                <input type="file" name="host_image" class="form-control">
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Competition Level</label>
                                <input type="text" name="competition_level" class="form-control" value="{{$event_time->competition_level}}">
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Game Type</label>
                                <input type="text" name="game_type" class="form-control" value="{{$event_time->game_type}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-outline mb-4">
                            <label class="form-label">Price</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    @if($event_time->price_currency == "PKR")
                                    <select name="price_currency" class="form-control">
                                          <option value="PKR" selected>PKR</option>
                                          <option value="$">Dollar</option>
                                          <option value="€">Euro</option>
                                    </select>  
                                    @elseif($event_time->price_currency == "$")
                                    <select name="price_currency" class="form-control">
                                        <option value="PKR">PKR</option>
                                        <option value="$" selected>Dollar</option>
                                        <option value="€">Euro</option>
                                    </select> 
                                    @else
                                    <select name="price_currency" class="form-control">
                                        <option value="PKR">PKR</option>
                                        <option value="$">Dollar</option>
                                        <option value="€" selected>Euro</option>
                                    </select> 
                                    @endif
                                </div>
                                <input type="number" name="price" class="form-control" placeholder="Price" value="{{$event_time->price}}">
                             </div>
                             <label class="form-label">Old Picture</label>
                            <div style = "margin-left: 3px; width: 60px; height: 60px; background: url({{ asset($event_time->host_image) }}); background-size: contain; background-repeat: no-repeat;"></div>
                        </div>
                    </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary btn-block mb-4">Update Event Time</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection