@extends('layout')

@section('title')
    <title>Visits Page</title>
@endsection


@section('content')
    <a href="{{route('visits.create')}}" class="btn btn-success ">Create New One</a>

    <table class="table table-dark mt-1 text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Entrance Date</th>
            <th scope="col">Status</th>
            <th scope="col">Patient Name</th>
            <th scope="col">Room Number</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($visits as $visit)
            <tr>
                <td>{{$visit->id}}</td>
                <td>{{$visit->entrance_date}}</td>
                <td>{{$visit->status}}</td>
                <td>{{$visit->patient->first_name}}</td>
                <td>{{$visit->room->id}}</td>
                <td>{{$visit->employee->first_name}}</td>
{{--                <td>....</td>--}}
                <td>
                    <a href="{{route('visits.show', ['visit'=> $visit->id])}}"
                       class="btn btn-info">View</a> {{--inside href  Or /employees/{{$employee->id}} Or /employees/{employee}--}}
                    <a href="{{route('visits.edit', ['visit'=> $visit->id])}}" class="btn btn-primary">Edit</a>
                    <form class="d-inline" method="POST"
                          action="{{route('visits.destroy', ['visit'=> $visit->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger delete" type="submit">Delete</button>

                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$visits->links()}}
@endsection

