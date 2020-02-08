@extends('layouts.Web_app')

@section('title')
    Main Page
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
    Welcome
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('register') }}">
                {{csrf_field()}}
                <div class="control-group">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control myText" name="name" placeholder="Email Address">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="email" class="form-control myText" name="email" placeholder="Email Address">
                    </div>
                </div>
                <div class="form-group">
                    <label>Phone:</label>
                    <input type="text" class="form-control myText" name="phone" placeholder="Phone">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control myText" name="password" placeholder="Phone">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label>Confirm Password:</label>
                    <input type="password" class="form-control myText" name="password_confirmation" placeholder="Password">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="border-radius: 8px">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
