@extends('layout')

@section('title')
    <title>Single Bill Page</title>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            Bill Info
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$bill->id}}</h5>
            <p class="card-text">{{$bill->visit_id}}</p>
            <a href="/bills" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
