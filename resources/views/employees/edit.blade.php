@extends('layout')

@section('title')
    <title>Edit Employee Page</title>
@endsection


@section('content')
    <form method="POST" action="{{route('employees.update', ['employee'=> $employee->id])}}"> {{-- method = "post " --}}
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" value="{{$employee->first_name}}" name="first_name"
                       placeholder="First Name">
            </div>
            <div class="form-group col">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" value="{{$employee->last_name}}" name="last_name"
                       placeholder="Last Name">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="salary">Salary</label>
                <input type="number" class="form-control" id="salary" value="{{$employee->salary}}" name="salary"
                       placeholder="Salary">
            </div>
            <div class="form-group col">
                <label for="hire_date">Hire Date</label>
                <input type="date" class="form-control" id="hire_date" value="{{$employee->hire_date}}" name="hire_date">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="specialization">Specialization</label>
                <input type="text" class="form-control" id="specialization" value="{{$employee->specialization}}"
                       name="specialization"
                       placeholder="Specialization">
            </div>
            <div class="form-group col">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" value="{{$employee->description}}"
                       name="description" placeholder="Description">
            </div>
        </div>
        <div class="form-group">
            <label for="department_id">Department Name</label>
            <select class="form-control" name="department_id">
                @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{route('employees.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
