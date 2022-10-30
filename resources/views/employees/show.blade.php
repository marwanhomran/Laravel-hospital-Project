@extends('layout')

@section('title')
    <title>Single Employees Page</title>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            Employee Info
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$employee->first_name}}</h5>
            <p class="card-text">{{$employee->description}}</p>
            <a href="/employees" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
