@extends('layout')

@section('title')
    <title>Employees Page</title>
@endsection

@if(auth()->user()->hasRole(['admin', 'patient', 'doctor']))
    @section('content')
        @if(auth()->user()->hasRole(['admin', 'doctor']))
            <a href="{{route('employees.create')}}" class="btn btn-success ">Create New One</a>
        @endif
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
                @if(auth()->user()->hasRole(['admin', 'doctor']))
                <th scope="col">Actions</th>
                    @endif
            </tr>
            <tr>

            </tr>
            </thead>
            <tbody>
            @if(auth()->user()->hasRole(['admin', 'doctor']))
            <td colspan="8">
                <form action="{{route('employees.index')}}" method="get">
                    @csrf
                    <div class="row">
                        <div class="form-group  col">
                            <select class="js-example-basic-single js-states form-control search" name="first_name"
                                    id="first_name">
                                @foreach($employees as $employee)
                                    <option></option>
                                    <option>{{$employee->first_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group   col">
                            <select class="js-example-basic-single js-states form-control  search" name="last_name"
                                    id="last_name">
                                @foreach($employees as $employee)
                                    <option></option>
                                    <option>{{$employee->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group  col">
                            <select class="js-example-basic-single js-states form-control  search" name="salary"
                                    id="salary">
                                @foreach($employees as $employee)
                                    <option></option>
                                    <option>{{$employee->salary}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group  col">
                            <select class="js-example-basic-single js-states form-control  search" name="hire_date"
                                    id="hire_date">
                                @foreach($employees as $employee)
                                    <option></option>
                                    <option>{{$employee->hire_date}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group  col">
                            <select class="js-example-basic-single js-states form-control  search"
                                    name="specialization"
                                    id="specialization">
                                @foreach($employees as $employee)
                                    <option></option>
                                    <option>{{$employee->specialization}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group  col">
                            <select class="js-example-basic-single js-states form-control  search"
                                    name="department_name"
                                    id="department_name">
                                @foreach($employees as $employee)
                                    <option></option>
                                    <option>{{\App\Models\Department::where('id','=' ,$employee->department_id)->value('department_name')}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </td>
            @endif

            @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->first_name}}</td>
                    <td>{{$employee->last_name}}</td>
                    <td>{{$employee->salary}}</td>
                    <td>{{$employee->hire_date}}</td>
                    <td>{{$employee->specialization}}</td>
                    <td>{{\App\Models\Department::where('id', $employee->department_id)->value('department_name')}}</td>
                    <td>
                        @if(auth()->user()->hasRole(['admin', 'doctor']))
                            <a href="{{route('employees.show', ['employee'=> $employee->id])}}"
                               class="btn btn-info">View</a>
                        @endif
                        @if(auth()->user()->hasRole(['admin', 'doctor']))
                            <a href="{{route('employees.edit', ['employee'=> $employee->id])}}"
                               class="btn btn-primary">Edit</a>
                        @endif
                        @if(auth()->user()->hasRole(['admin']))
                            <form class="d-inline" method="POST"
                                  action="{{route('employees.destroy', ['employee'=>$employee->id])}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger delete" type="submit">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$employees->links()}}

        <script>
            $('.search').select2({
                placeholder: 'Search',
            });
        </script>
    @endsection
@else
    <div class="alert alert-danger mt-2">
        You Don't Have Role To arrive to this content
    </div>
@endif



