@extends('layout')

@section('title')
    <title>Create New Post</title>
@endsection

@section('content')
    <form action="{{route('posts.store')}}" method= "post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
            <div class="form-group">
                <label for="image">Upload image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control " id="body" name="body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{route('posts.index')}}" class="btn btn-secondary">Go Back</a>
    </form>
@endsection
