@extends('layout')

@section('title')
    <title>Create Department Page</title>
@endsection

@section('content')
    <form action="{{route('departments.store')}}" method= "post">
        @csrf
        <div class="row">
            <div class="form-group col">
                <label for="department_name">Department Name</label>
                <input type="text" class="form-control" id="department_name" name="department_name" placeholder="Department Name">
            </div>
            <div class="form-group col">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{route('departments.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
