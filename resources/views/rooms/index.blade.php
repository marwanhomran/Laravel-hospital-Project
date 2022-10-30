@extends('layout')

@section('title')
    <title>Rooms Page</title>
@endsection


@section('content')
    <a href="{{route('rooms.create')}}" class="btn btn-success ">Create New One</a>

    <table class="table table-dark mt-1 text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Number Of Beds</th>
            <th scope="col">Department Name</th>
        </tr>
        </thead>
        <tbody>

        @foreach($rooms as $room)
            <tr>
                <td>{{$room->id}}</td>
                <td>{{$room->beds_number}}</td>
                <td>{{DB::table('departments')->where('id', $room->department_id)->value('department_name')}}</td>
                <td>
                    <a href="{{route('rooms.show', ['room'=> $room->id])}}"
                       class="btn btn-info">View</a>
                    <a href="{{route('rooms.edit', ['room'=> $room->id])}}" class="btn btn-primary">Edit</a>
                    <form class="d-inline" method="POST"
                          action="{{route('rooms.destroy', ['room'=> $room->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger delete" type="submit">Delete</button>

                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$rooms->links()}}
@endsection

