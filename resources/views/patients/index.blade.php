@extends('layout')

@section('title')
    <title>Patients Page</title>
@endsection


@section('content')
    <a href="{{route('patients.create')}}" class="btn btn-success ">Create New One</a>

    <table class="table table-dark mt-1 text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($patients as $patient)
            <tr>
                <td>{{$patient->id}}</td>
                <td>{{$patient->first_name}}</td>
                <td>{{$patient->last_name}}</td>
                <td>{{$patient->phone}}</td>
                <td>{{$patient->gender}}</td>
                <td>{{$patient->age}}</td>
                <td>
                    <a href="{{route('patients.show', ['patient'=> $patient->id])}}"
                       class="btn btn-info">View</a>
                    <a href="{{route('patients.edit', ['patient'=> $patient->id])}}" class="btn btn-primary">Edit</a>
                    <form class="d-inline" method="POST"
                          action="{{route('patients.destroy', ['patient'=> $patient->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger delete" type="submit">Delete</button>

                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$patients->links()}}
@endsection

