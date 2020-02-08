@extends('layouts.Web_app')

@section('title')
    Login Page
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
   Login
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('login') }}">
                {{csrf_field()}}

                <div class="control-group">
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="email" class="form-control myText @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" name="email" placeholder="Email Address">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control myText @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    <p class="help-block text-danger"></p>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="border-radius: 8px">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
