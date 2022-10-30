@extends('layout')

@section('title')
    <title>Single Medicine Page</title>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            Medicine Info
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$medicine->medicine_name}}</h5>
            <p class="card-text">Some Description</p>
            <a href="/medicines" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
