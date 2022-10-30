@extends('layout')

@section('title')
    <title>Medicines Page</title>
@endsection


@section('content')
    <a href="{{route('medicines.create')}}" class="btn btn-success ">Create New One</a>

    <table class="table table-dark mt-1 text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Medicine Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($medicines as $medicine)
            <tr>
                <td>{{$medicine->id}}</td>
                <td>{{$medicine->medicine_name}}</td>
                <td>
                    <a href="{{route('medicines.show', ['medicine'=> $medicine->id])}}"
                       class="btn btn-info">View</a>
                    <a href="{{route('medicines.edit', ['medicine'=> $medicine->id])}}" class="btn btn-primary">Edit</a>
                    <form class="d-inline" method="POST"
                          action="{{route('medicines.destroy', ['medicine'=> $medicine->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger delete" type="submit">Delete</button>

                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$medicines->links()}}
@endsection

