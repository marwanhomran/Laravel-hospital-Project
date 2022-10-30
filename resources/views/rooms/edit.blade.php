@extends('layout')

@section('title')
    <title>Edit Employee Page</title>
@endsection


@section('content')
    <form method="POST" action="{{route('rooms.update', ['room'=> $room->id])}}"> {{-- method = "post " --}}
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col">
                <label for="beds_number">Number Of Beds</label>
                <input type="number" class="form-control" id="beds_number" value="{{$room->beds_number}}" name="beds_number" placeholder="Number Of Beds">
            </div>
            <div class="form-group col">
                <label for="department_id">Department Name</label>
                <select class="form-control" name="department_id">
                    @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{route('rooms.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
