@extends('layout')

@section('title')
    <title>Edit Bills Page</title>
@endsection

@section('content')
    <form action="{{route('bills.update', ['bill'=> $bill->id])}}" method= "post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col">
                <label for="print_date">Print Date</label>
                <input type="date" class="form-control" id="print_date" value="{{$bill->print_date}}" name="print_date">
            </div>
            <div class="form-group col">
                <label for="pay_date">Pay Date</label>
                <input type="date" class="form-control" id="pay_date" value="{{$bill->pay_date}}" name="pay_date">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" value="{{$bill->amount}}" name="amount" placeholder="Amount">
            </div>
            <div class="form-group col">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" value="{{$bill->status}}" name="status" placeholder="Status">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{route('bills.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
