@extends('layouts/Admin_app')

@section('title')
    Add Section
    @endsection

@section('content')

    <form method="post" action="{{route('Section.store')}}">
        {{csrf_field()}}
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Section Info
            </div>
            <div class="panel-body">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="section name">
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


