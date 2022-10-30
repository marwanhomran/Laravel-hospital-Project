@extends('layout')

@section('title')
    <title>Create Visit Page</title>
@endsection

@section('content')
    <form action="{{route('visits.store')}}" method= "post">
        @csrf
        <div class="row">
            <div class="form-group col">
                <label for="entrance_date">Entrance Date</label>
                <input type="date" class="form-control" id="entrance_date" name="entrance_date" placeholder="Entrance Date">
            </div>
            <div class="form-group col">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status" placeholder="Status">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="patient_name">Patient Name</label>
                <input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="patient Name">
            </div>
            <div class="form-group col">
                <label for="room_number">Room Number</label>
                <input type="number" class="form-control" id="room_number" name="room_number" placeholder="Room Number">
            </div>
            <div class="form-group col">
                <label for="employee_name">Employee Name</label>
                <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Employee Name">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{route('visits.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
