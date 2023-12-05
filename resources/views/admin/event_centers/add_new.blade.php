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
                <h6 class="m-0 font-weight-bold text-primary">Add New Event Center</h6>
            </div>
            <div class="card-body col
            <div class="col">
            <form action="{{route ('admin.nearby-events.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-outline mb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-outline mb-2">
                                <label class="form-label">Venue</label>
                                <input type="text" name="venue" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-outline mb-4">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-12">
                            <div class="form-outline mb-4">
                                <label class="form-label">Zipcode</label>
                                <input type="text" name="zipcode" class="form-control">
                            </div>
                        </div> 
                        
                    </div>
                    
                    <div class="form-outline mb-4">
                        <label class="form-label">Venue Image</label>
                        <input type="file" name="venue_image" class="form-control">
                    </div>
                     
                </div>
                <div>
                     <div class="d-flex justify-content-end">
                        <button type="submit" style="width: 196px;" class="btn btn-primary btn-block mb-4">Add New Event Center</button>
                    </div>  
                </div>
            </form>
        </div>
    </div>
</div>


@endsection