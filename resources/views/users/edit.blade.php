@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">

                @include('partial.errors')

                <div class="card-header">My Profile</div>
                <div class="card-body">
                    <form action="{{route('users.update-profile')}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{$user->about}}</textarea>
                    </div>

                    <button class="btn btn-success" type = "submit">Update Post</button>
                    
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
