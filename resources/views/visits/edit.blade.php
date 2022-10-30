@extends('layout')

@section('title')
    <title>Edit Visit Page</title>
@endsection

@section('content')
    <form method="POST" action="{{route('visits.update', ['visit'=> $visit->id])}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col">
                <label for="entrance_date">Entrance Date</label>
                <input type="date" class="form-control" id="entrance_date" value="{{$visit->entrance_date}}" name="entrance_date" placeholder="Entrance Date">
            </div>
            <div class="form-group col">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" value="{{$visit->status}}" name="status" placeholder="Status">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="patient_name">Patient Name</label>
                <input type="text" class="form-control" id="patient_name" name="patient_name"
                       value="{{\App\Models\Patient::query()->where('id','=',$visit->patient_id)->value('first_name')}}"
                       placeholder="patient Name">
            </div>
            <div class="form-group col">
                <label for="room_number">Room Number</label>
                <input type="number" class="form-control" id="room_number" name="room_number"
                       value="{{\App\Models\Room::query()->where('id','=',$visit->room_id)->value('id')}}"
                       placeholder="Room Number">
            </div>
            <div class="form-group col">
                <label for="employee_name">Employee Name</label>
                <input type="text" class="form-control" id="employee_name" name="employee_name"
                       value="{{\App\Models\Employee::query()->where('id','=',$visit->employee_id)->value('first_name')}}"
                       placeholder="Employee Name">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{route('visits.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
