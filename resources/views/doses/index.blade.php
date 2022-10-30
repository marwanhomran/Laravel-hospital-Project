@extends('layout')

@section('title')
    <title>Doses Page</title>
@endsection


@section('content')
    <a href="{{route('doses.create')}}" class="btn btn-success ">Create New One</a>

    <table class="table table-dark mt-1 text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Dose</th>
            <th scope="col">Unit</th>
            <th scope="col">Medicine Name</th>
            <th scope="col">Patient Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($doses as $dose)
            <tr>
                <td>{{$dose->id}}</td>
                <td>{{$dose->dose}}</td>
                <td>{{$dose->unit}}</td>
                <td>{{DB::table('medicines')->where('id', $dose->medicine_id)->value('medicine_name')}}</td>
                <td>{{DB::table('patients')->where('id', $dose->patient_id)->value('first_name')}}</td>
                <td>
                    <a href="{{route('doses.show', ['dose'=> $dose->id])}}"
                       class="btn btn-info">View</a> {{--inside href  Or /employees/{{$employee->id}} Or /employees/{employee}--}}
                    <a href="{{route('doses.edit', ['dose'=> $dose->id])}}" class="btn btn-primary">Edit</a>
                    <form class="d-inline" method="POST"
                          action="{{route('doses.destroy', ['dose'=> $dose->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger delete" type="submit">Delete</button>

                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$doses->links()}}
@endsection

