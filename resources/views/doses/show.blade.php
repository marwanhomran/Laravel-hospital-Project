@extends('layout')

@section('title')
    <title>Single Dose Page</title>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            Dose Info
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$dose->id}} {{$dose->dose}}</h5>
            <p class="card-text">{{$dose->dose_time}}</p>
            <a href="/doses" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
