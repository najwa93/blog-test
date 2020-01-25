
@extends('layouts.Web_app')

@section('title')
    Main Page
    @endsection

@section('head')
<style>
    .panel{
        border: #0c5460 1px dashed;
        padding: 30px;
        margin: 30px;
        border-radius: 20px;
        width: 100%;
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
        @foreach($sections as $section)
        <div class="col-md-4">
            <div class="panel">
                <label>{{$section->name}}</label>
            </div>
        </div>
            @endforeach
    </div>
    @endsection
