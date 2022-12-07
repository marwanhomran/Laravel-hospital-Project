@extends('layout')

@section('title')
    <title>Create Dose Page</title>
@endsection

@section('content')
    <form action="{{route('doses.store')}}" method= "post">
        @csrf
        <div class="row">
            <div class="form-group col">
                <label for="dose">Dose</label>
                <input type="text" class="form-control" id="dose" name="dose" placeholder="dose">
            </div>
            <div class="form-group col">
                <label for="unit">Unit</label>
                <input type="text" class="form-control" id="unit" name="unit" placeholder="unit">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="dose_time">Dose Time</label>
                <select class="form-control" name="dose_time">
                    <option value="morning">Morning</option>
                    <option value="mid-day">Mid-Day</option>
                    <option value="evening">Evening</option>
                </select>
            </div>

        </div>
        <div class="row">
            <div class="form-group col">
                <label for="medicine_id">Medicine Name</label>
                <select class="form-control" name="medicine_id">
                    @foreach($medicines as $medicine)
                        <option value="{{$medicine->id}}">{{$medicine->medicine_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col">
                <label for="patient_id">Patient Name</label>
                <select class="form-control" name="patient_id">
                    @foreach($patients as $patient)
                        <option value="{{$patient->id}}">{{$patient->first_name}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{route('doses.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
