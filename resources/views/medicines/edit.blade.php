@extends('layout')

@section('title')
    <title>Edit Medicine Page</title>
@endsection


@section('content')
    <form method="POST" action="{{route('medicines.update', ['medicine'=> $medicine->id])}}"> {{-- method = "post " --}}
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col">
                <label for="medicine_name">Medicine Name</label>
                <input type="text" class="form-control" id="medicine_name" value="{{$medicine->medicine_name}}" name="medicine_name">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{route('medicines.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
