@extends('layouts.app')

@section('content')
    
    

    <div class="card card-default">
        <div class="card-header">Create Category</div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id='name' name='name' placeholder="Name" class="form-control">
            </div>

            <div class="form-group">
                <a href="" class="btn btn-success">Add Category</a>
            </div>


        </div>
    </div>

@endsection