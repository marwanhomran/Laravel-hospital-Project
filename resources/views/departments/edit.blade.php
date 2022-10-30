@extends('layout')

@section('title')
    <title>Edit Department Page</title>
@endsection


@section('content')
    <form action="{{route('departments.update', ['department'=> $department->id])}}" method= "post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col">
                <label for="department_name">Department Name</label>
                <input type="text" class="form-control" id="department_name" value="{{$department->department_name}}" name="department_name" placeholder="Department Name">
            </div>
            <div class="form-group col">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" value="{{$department->description}}" name="description" placeholder="Description">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{route('departments.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
