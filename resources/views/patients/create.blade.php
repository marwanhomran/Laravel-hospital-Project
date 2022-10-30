@extends('layout')

@section('title')
    <title>Create Patient Page</title>
@endsection

@section('content')
    <form action="{{route('patients.store')}}" method= "post">
        @csrf
        <div class="row">
            <div class="form-group col">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
            </div>
            <div class="form-group col">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="phone">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="0599123456">
            </div>
            <div class="form-group col">
                <label for="gender">Gender</label>
                <select class="form-control" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age"
                       placeholder="Age">
            </div>
            <div class="form-group col">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="485 Hudson Garden Suite 502">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{route('patients.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
