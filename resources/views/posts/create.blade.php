@extends('layouts.app')

@section('content')


<div class="card card-default">
    <div class="card-header">
        {{ isset($post) ?  "Edit Posts" : "Create Posts"}}
    </div>
    <div class="card-body">
    <form action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($post))
            @method('PUT')
        @endif

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
        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{isset($post) ? $post->title : ""}}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="5" rows="3" class="form-control" placeholder="Description">{{isset($post) ? $post->description : ""}}</textarea>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : "" }}">
        <trix-editor input="content"></trix-editor>
        </div>

        <div class="form-group">
            <label for="published_at">Publisched At</label>
            <input type="text" class="form-control" id="published_at" name="published_at" placeholder="publisched at" value="{{ isset($post) ? $post->published_at : "" }}">
        </div>
        @if(isset($post))
            <div class="form-group">
                <img src="{{asset("storage/".$post->image)}}" alt="" style="width: 100%">
            </div>
        @endif

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Image">
        </div>

        <div class="form-group">
        <button type = "submit" class="btn btn-success">{{isset($post) ? "Update Post" : "Save Post"}}</button>
        </div>
    
    </form>
    </div>
</div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.js"></script>

    <script>
        flatpickr("#published_at", {
            enableTime : true,
        });
    </script>
    
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.css">
@endsection