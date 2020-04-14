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

        @include('partial.errors')
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
            <label for="category">Category</label>
            <select name="category" id="cateory" class="form-control">

                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @if (isset($post))
                            @if ($category->id == $post->category_id)
                                selected
                            @endif
                        @endif>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>
        </div>

        @if ($tags->count() > 0)
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="form-control" multiple>

                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}"
                            
                            @if (isset($post))
                                @if($post->hasTag($tag->id))
                                    selected
                                @endif
                            @endif
                            >
                            {{ $tag->name }}
                        </option>
                    @endforeach

                </select>
            </div>
        @endif

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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection