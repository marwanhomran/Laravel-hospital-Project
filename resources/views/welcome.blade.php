@extends('layout')

@section('title')
    <title>Welcome Page</title>
@endsection

@section('content')

    <h1 class="text-secondary text-center display-1 mt-5">
        Welcome! {{auth()->user()->name }}
    </h1>
    @if(\Illuminate\Support\Facades\Session::has('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif
@endsection


