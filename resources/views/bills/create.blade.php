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
                <input type="text" class="form-control" id="status" name="status" placeholder="Status">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="employee_name">Employee Name</label>
                <input type="text" class="form-control" id="employee_name" name="employee_name"
                       placeholder="Employee Name">
            </div>
            <div class="form-group col">
                <label for="room_number">Room Number</label>
                <input type="number" class="form-control" id="room_number" name="room_number" placeholder="Room Number">
            </div>
            <div class="form-group col">
                <label for="patient_name">Patient Name</label>
                <input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="Patient Name">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{route('bills.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
