@extends('layouts/Admin_app')

@section('title')
    Add Post
    @endsection

@section('content')

    <form method="post" action="{{route('Section.store')}}">
        {{csrf_field()}}
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Post Info
            </div>
            <div class="panel-body">

                    <div class="form-group">
                        <label for="name">Title:</label>
                        <input type="text" name="title" class="form-control" id="name" placeholder="section name">
                    </div>

                <div class="form-group">
                    <label for="name">Content:</label>
                    <textarea name="content" placeholder="content" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Editor For This Section:</label>
                    <select name="admin">
                        <option value="">Empty</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="panel-footer">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
      </div>
    </div>
    </form>
    @endsection


