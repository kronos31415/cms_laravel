@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a>
</div>

<div class="card card-default">
    <div class="card-header">
        Posts
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        {{-- {{asset($post->image)}} --}}
                        <td><img src="storage/{{$post->image}}" width="50px" height="50px" alt=""></td>
                        <td>{{$post->title}}</td>
                        <td><button class="btn btn-info btn-sm">Edit</button></td>
                        <td><button class="btn btn-danger btn-sm">Trash</button></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    
@endsection