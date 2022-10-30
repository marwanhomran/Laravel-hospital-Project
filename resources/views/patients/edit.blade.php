@extends('layout')

@section('title')
    <title>Edit Patient Page</title>
@endsection


@section('content')
    <form method="POST" action="{{route('patients.update', ['patient'=> $patient->id])}}"> {{-- method = "post " --}}
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" value="{{$patient->first_name}}" name="first_name"
                       placeholder="First Name">
            </div>
            <div class="form-group col">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" value="{{$patient->last_name}}" name="last_name"
                       placeholder="Last Name">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="phone">Phone</label>
                <input type="number" class="form-control" id="phone" value="{{$patient->phone}}" name="phone"
                       placeholder="Phone Number">
            </div>

            <div class="form-group col">
                <label for="gender">Gender</label>
                <select class="form-control" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="form-group col">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" value="{{$patient->age}}" name="age">
            </div>

        </div>
        <div class="row">
            <div class="form-group col">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" value="{{$patient->address}}"
                       name="address"
                       placeholder="Address">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{route('patients.index')}}" class="btn btn-secondary">Go Back</a>

    </form>
@endsection
