@extends('layout')

@section('title')
    <title>Create Bills Page</title>
@endsection

@section('content')
    <form action="{{route('bills.store')}}" method= "post">
        @csrf
        <div class="row">
            <div class="form-group col">
                <label for="print_date">Print Date</label>
                <input type="date" class="form-control" id="print_date" name="print_date">
            </div>
            <div class="form-group col">
                <label for="pay_date">Pay Date</label>
                <input type="date" class="form-control" id="pay_date" name="pay_date">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount">
            </div>
            <div class="form-group col">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="paid">Paid</option>
                    <option value="unpaid">Unpaid</option>
                    <option value="incomplete">Incomplete</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="employee_id">Employee Name</label>
                <select class="form-control" name="employee_id">
                    @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->first_name}} {{$employee->last_name}}</option>
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
                <label for="patient_id">Patient Name</label>
                <select class="form-control" name="patient_id">
                    @foreach($patients as $patient)
                        <option value="{{$patient->id}}">{{$patient->first_name}} {{$patient->last_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{route('bills.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
