@extends('layout')

@section('title')
    <title>Posts Page</title>
@endsection


@section('content')
    <a href="{{route('posts.create')}}" class="btn btn-success ">Create New One</a>

    <table class="table table-dark mt-1 text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>image</td>
                <td>
                    <a href="{{route('posts.show', ['post'=> $post->id])}}"
                       class="btn btn-info">View</a>
                    <form class="d-inline" method="POST"
                          action="{{route('posts.destroy', ['post'=> $post->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger delete" type="submit">Delete</button>

                    </form>
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>
    {{$posts->links()}}
@endsection

