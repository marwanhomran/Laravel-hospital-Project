@extends('layout')

@section('title')
    <title>Departments Page</title>
@endsection


@section('content')
    <a href="{{route('departments.create')}}" class="btn btn-success ">Create New One</a>

    <table class="table table-dark mt-1 text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Department Name</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>

                <td>{{$department->id}}</td>
                <td>{{$department->department_name}}</td>
                <td>{{$department->created_at->format('Y-m-d')}}</td>


                <td>
                    <a href="{{route('departments.show', ['department' => $department->id])}}"
                       class="btn btn-info">View</a>

                    <a href="{{route('departments.edit', ['department' => $department->id])}}" class="btn btn-primary">Edit</a>

                    <form class="d-inline" method="POST"
                          action="{{route('departments.destroy', ['department'=>$department->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger delete" type="submit">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$departments->links()}}
@endsection
