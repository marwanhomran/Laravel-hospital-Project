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
                <label for="patient_id">Patient Name</label>
                <select class="form-control" name="patient_id">
                    @foreach($patients as $patient)
                        <option value="{{$patient->id}}">{{$patient->first_name}} {{$patient->last_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col">
                <label for="room_id">Room Number</label>
                <select class="form-control" name="room_id">
                    @foreach($rooms as $room)
                        <option value="{{$room->id}}">{{$room->id}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col">
                <label for="employee_id">Employee Name</label>
                <select class="form-control" name="employee_id">
                    @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->first_name}} {{$employee->last_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{route('visits.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
