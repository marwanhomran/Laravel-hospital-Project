@extends('layout')

@section('title')
    <title>Create Medicine Page</title>
@endsection

@section('content')
    <form action="{{route('medicines.store')}}" method= "post">
        @csrf
        <div class="row">
            <div class="form-group col">
                <label for="medicine_name">Medicine Name</label>
                <input type="text" class="form-control" id="medicine_name" name="medicine_name" placeholder="Medicine Name">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{route('medicines.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
