@extends('layouts.Web_app')

@section('title')
    Profile Page
@endsection

@section('head')
    <style>
        .myText {
            border: 1px solid #a3a3a3 !important;
            border-radius: 10px !important;
            padding: 10px !important;
        }

        .myText:focus {
            border: 1px solid #1197a8;
            border-radius: 10px;
            padding: 10px;
        }
    </style>
@endsection

@section('headerImage')
    {{url('/images/home-bg.jpg')}}
@endsection
@section('subject')
    Profile
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="">
                {{csrf_field()}}
                <div class="control-group">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control myText" name="name" value="{{$user->name}}" placeholder="Email Address">
                    </div>
                </div>

                <div class="form-group">
                    <label>Phone:</label>
                    <input type="text" class="form-control myText" name="phone" value="{{$user->phone}}" placeholder="Phone">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label>Current password:</label>
                    <input type="password" class="form-control myText" name="c_password" placeholder="Current Password">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label>New Password:</label>
                    <input type="password" class="form-control myText" name="new_password" placeholder="New Password">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label>Re-Password:</label>
                    <input type="password" class="form-control myText" name="confirm_password" placeholder="Password">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="border-radius: 8px">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
