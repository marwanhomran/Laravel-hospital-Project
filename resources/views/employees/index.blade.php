@extends('layout')

@section('title')
    <title>Employees Page</title>
@endsection


@section('content')
    <a href="{{route('employees.create')}}" class="btn btn-success ">Create New One</a>

    <table class="table table-dark mt-1 text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Salary</th>
            <th scope="col">Hire Date</th>
            <th scope="col">Specialization</th>
            <th scope="col">Department Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->salary}}</td>
                <td>{{$employee->hire_date}}</td>
                <td>{{$employee->specialization}}</td>
                <td>{{DB::table('departments')->where('id', $employee->department_id)->value('department_name')}}</td>
                <td>
                    <a href="{{route('employees.show', ['employee'=> $employee->id])}}"
                       class="btn btn-info">View</a> {{--inside href  Or /employees/{{$employee->id}} Or /employees/{employee}--}}
                    <a href="{{route('employees.edit', ['employee'=> $employee->id])}}" class="btn btn-primary">Edit</a>


{{--                    <a href="#" class="btn btn-danger delete" data-id="{{$employee->id}}">Delete</a>--}}
                    <form class="d-inline" method="POST"
                          action="{{route('employees.destroy', ['employee'=>$employee->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger delete" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$employees->links()}}
@endsection


