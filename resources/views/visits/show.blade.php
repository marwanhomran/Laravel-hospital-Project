@extends('layout')

@section('title')
    <title>Single Visit Page</title>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            Visit Info
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$visit->entrance_date}} {{$visit->status}}</h5>
            <p class="card-text">Patient Name:- {{\App\Models\Patient::query()->where('id','=',$visit->patient_id)->value('first_name')}} <br>
                Room Number:- {{\App\Models\Room::query()->where('id','=',$visit->room_id)->value('id')}}<br>
                Employee Name:- {{\App\Models\Employee::query()->where('id','=',$visit->employee_id)->value('first_name')}}
            </p>
            <a href="/visits" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
