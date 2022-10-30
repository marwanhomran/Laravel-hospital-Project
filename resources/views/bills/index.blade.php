@extends('layout')

@section('title')
    <title>Bills Page</title>
@endsection


@section('content')
        <a href="{{route('bills.create')}}" class="btn btn-success ">Create New One</a>

    <table class="table table-dark mt-1 text-center table-responsive">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Print Date</th>
            <th scope="col">Pay Date</th>
            <th scope="col">Amount</th>
            <th scope="col" colspan="3">Visit Info</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Employee</td>
        <td>Room</td>
        <td>Patient</td>
        <td>&nbsp;</td>
        @foreach($bills as $bill)
            <tr>
                <td>{{$bill->id}}</td>
                <td>{{$bill->print_date}}</td>
                <td>{{$bill->pay_date}}</td>
                <td>{{$bill->amount}}</td>
                {{--for visit info--}}
                <td>{{\Illuminate\Support\Facades\DB::table('employees')->join('visits','visits.employee_id','=','employees.id')
                                                                    ->join('bills','visits.id','=','bills.visit_id')->where('bills.id','=', $bill->id)->value('employees.first_name')
                }}</td>

                <td>{{\Illuminate\Support\Facades\DB::table('rooms')->join('visits','visits.room_id','=','rooms.id')
                                                                    ->join('bills','visits.id','=','bills.visit_id')->where('bills.id','=', $bill->id)->value('rooms.id')
                }}</td>

                <td>{{\Illuminate\Support\Facades\DB::table('patients')->join('visits','visits.patient_id','=','patients.id')
                                                                    ->join('bills','visits.id','=','bills.visit_id')->where('bills.id','=', $bill->id)->value('patients.first_name')
                }}</td>
                {{--for visit info--}}
                <td>{{$bill->status}}</td>
                <td>
                    <a href="{{route('bills.show', ['bill'=> $bill->id])}}"
                       class="btn btn-info">View</a>
                    <a href="{{route('bills.edit', ['bill'=> $bill->id])}}" class="btn btn-primary">Edit</a>
                    <form class="d-inline" method="POST"
                          action="{{route('bills.destroy', ['bill'=> $bill->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger delete" type="submit">Delete</button>

                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
        {{$bills->links()}}
@endsection


