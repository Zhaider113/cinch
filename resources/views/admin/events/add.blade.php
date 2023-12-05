@extends('layouts.admin.app')
@section('content')

<div class="row">
    <div class="col-md-8">
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
    <div class="col-md-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route ('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route ('admin.events.index')}}">Events List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Event</li>
            </ol>
        </nav>
    </div>
</div>

<div class="mt-1">
    <div class="d-flex justify-content-center">   
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Event</h6>
            </div>
            <div class="card-body col">
            <div class="col">
            <form action="{{route ('admin.events.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-outline mb-2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-outline mb-2">
                                <label class="form-label">Title</label>
                                <input type="text" name="event_title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" id="pac-input">
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-outline mb-2">
                                <label class="form-label">Latitude</label>
                                <input type="text" name="latitude" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Longitude</label>
                                <input type="text" name="longitude" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Image</label>
                                <input type="file" name="event_banner" class="form-control">
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Start Date</label>
                                <input type="date" name="start_date" class="form-control">
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">End Date (optional)</label>
                                <input type="date" name="end_date" class="form-control">
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <label class="form-label">Days</label>
                                <input type="number" name="days" class="form-control">
                            </div>
                        </div>   
                        
                    </div>
                    <div class="row justify-content-end">
                        <div class="d-flex ">
                           <button type="submit" class="btn btn-primary btn-block mb-4">Add Event</button>
                       </div>  
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection