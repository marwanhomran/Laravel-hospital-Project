@extends('layout')

@section('title')
    <title>Single Department Page</title>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            Department Info
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$department->department_name}}</h5>
            <p class="card-text">{{$department->description}}</p>
            <a href="{{route('departments.index')}}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
