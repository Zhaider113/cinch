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
                <h6 class="m-0 font-weight-bold text-primary">Update Event Center</h6>
            </div>
            <div class="card-body col
            <div class="col">
            <form action="{{route ('admin.nearby-events.update',$nearby_event->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="form-outline mb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-outline mb-2">
                                <label class="form-label">Venue</label>
                                <input type="text" name="venue" class="form-control" value="{{$nearby_event->venue}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-outline mb-4">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" value="{{$nearby_event->location}}">
                            </div>
                        </div>  
                        <div class="col-md-12">
                            <div class="form-outline mb-4">
                                <label class="form-label">Zipcode</label>
                                <input type="text" name="zipcode" class="form-control" value="{{$nearby_event->zipcode}}">
                            </div>
                        </div> 
                        
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label class="form-label">Old Venue Image</label>
                        <div style = "margin-left: 3px; width: 60px; height: 60px; background: url({{ asset($nearby_event->venue_image) }}); background-size: contain; background-repeat: no-repeat;"></div>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label">Venue Image</label>
                        <input type="file" name="venue_image" class="form-control">
                    </div>
                     
                </div>
                <div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" style="width: 196px;" class="btn btn-primary btn-block mb-4">Update Event Center</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection