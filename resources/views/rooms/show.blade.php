@extends('layout')

@section('title')
    <title>Single Rooms Page</title>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            Room Info
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$room->id}}</h5>
            <p class="card-text">{{$room->beds_number}}</p>
            <a href="/rooms" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
