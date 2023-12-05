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

<div class="mt-3">
    <div class="d-flex justify-content-center">   
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Event Gallery</h6>
            </div>
            <div class="card-body col>
            <div class="col">
            <form action="{{route ('admin.event-galleries.update',$event_gallery->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="form-outline mb-2">
                    <label class="form-label">Event Centers</label>
                    <select name="event_center_id" class="form-control">
                        @foreach($nearby_events as $nearby_event)
                            <option value="{{$nearby_event->id}}" @if($event_gallery->event_center_id == $nearby_event->id) selected @endif>{{$nearby_event->venue}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-outline mb-2">
                    <label class="form-label">Old Image</label>
                    <div style = "margin-left: 3px; width: 60px; height: 60px; background: url({{ asset($event_gallery->media) }}); background-size: contain; background-repeat: no-repeat;"></div>
                </div>
                <div class="form-outline mb-2">
                    <label class="form-label">Image</label>
                    <input type="file" name="media" class="form-control" >
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label">Media Type</label>
                    <input type="text" name="media_type" class="form-control" value="{{$event_gallery->media_type}}">
                </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" style="width: 196px;" class="btn btn-primary btn-block mb-4">Update Event Gallery</button>
                    </div>
                </div>      
            </form>
        </div>
    </div>
</div>


@endsection