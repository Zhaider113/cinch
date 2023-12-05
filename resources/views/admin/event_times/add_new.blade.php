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
                <h6 class="m-0 font-weight-bold text-primary">Add New Event Time</h6>
            </div>
            <div class="card-body col
            <div class="col">
            <form action="{{route ('admin.event-times.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-outline mb-2">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Event Centers</label>
                            <select name="event_center_id" class="form-control">
                                <option value="">---Select Event Center---</option>
                                @foreach($nearby_events as $nearby_event)
                                    <option value="{{$nearby_event->id}}">{{$nearby_event->venue}}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-outline mb-2">
                                <label class="form-label">Event Date</label>
                                <input type="date" name="event_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Event time</label>
                                <input type="time" name="event_time" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Event Duration</label>
                                <input type="text" name="event_duration" class="form-control">
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Event Capacity</label>
                                <input type="number" name="event_capacity" class="form-control">
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Host Name</label>
                                <input type="text" name="host_name" class="form-control">
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
                                <input type="text" name="competition_level" class="form-control">
                            </div>
                        </div> 
                       <div class="col-md-4">
                        <div class="form-outline mb-4">
                            <label class="form-label">Game Type</label>
                            <input type="text" name="game_type" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-outline mb-4">
                            <label class="form-label">Price</label>
                             <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                     <select name="price_currency" class="form-control">
                                         <option value="" selected>Currency</option>
                                          <option value="PKR">PKR</option>
                                          <option value="$">Dollar</option>
                                          <option value="€">Euro</option>
                                     </select>    
                                 </div>
                                 <input type="number" name="price" class="form-control" placeholder="Price">
                             </div>
                        </div>
                    </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary btn-block mb-4">Add New Event Time</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection