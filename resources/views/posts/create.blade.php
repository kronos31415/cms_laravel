@extends('layouts.app')

@section('content')


<div class="card card-default">
    <div class="card-header">
        Create Posts
    </div>
    <div class="card-body">
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item">
                       {{$error}} 
                    </li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="5" rows="3" class="form-control" placeholder="Description"></textarea>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="5" rows="3" class="form-control" placeholder="Content"></textarea>
        </div>

        <div class="form-group">
            <label for="publisched">Publisched At</label>
            <input type="text" class="form-control" id="publisched" name="publisched" placeholder="publisched at">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Image">
        </div>

        <div class="form-group">
            <button type = "submit" class="btn btn-success">Save Post</button>
        </div>
    
    </form>
    </div>
</div>
    
@endsection