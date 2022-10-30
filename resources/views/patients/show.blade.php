@extends('layout')

@section('title')
    <title>Single Patient Page</title>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            patient Info
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$patient->first_name}} {{$patient->last_name}}</h5>
            <p class="card-text">{{$patient->address}}</p>
            <a href="/patients" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
