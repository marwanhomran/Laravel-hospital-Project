@extends('layout')

@section('title')
    <title>Edit Dose Page</title>
@endsection


@section('content')
    <form method="POST" action="{{route('doses.update', ['dose'=> $dose->id])}}"> {{-- method = "post " --}}
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col">
                <label for="dose">Dose</label>
                <input type="text" class="form-control" id="dose" value="{{$dose->dose}}" name="dose"
                       placeholder="Dose">
            </div>
            <div class="form-group col">
                <label for="unit">Unit</label>
                <input type="text" class="form-control" id="unit" value="{{$dose->unit}}" name="unit"
                       placeholder="Unit">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="dose_time">Dose Time</label>
                <input type="text" class="form-control" id="dose_name" value="{{$dose->dose_time}}" name="dose_time"
                       placeholder="Dose Time">
            </div>
            <div class="form-group col">
                <label for="medicine_id">Medicine Name</label>
                <select class="form-control" name="medicine_id">
                    @foreach($medicines as $medicine)
                        <option value="{{$medicine->id}}">{{$medicine->medicine_name}}</option>
                    @endforeach
                </select>
            </div>
                <div class="form-group col">
                    <label for="patient_id">Patient ID</label>
                    <input type="number" class="form-control" id="patient_id" value="{{$dose->patient_id}}" name="patient_id"
                           placeholder="patient_id">
                </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{route('employees.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection

