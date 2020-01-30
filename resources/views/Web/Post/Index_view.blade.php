
@extends('layouts.Web_app')

@section('title')
    Main Page
@endsection


@section('headerImage')
    {{count($post->photo)>0?url('/images/'.$post->photo[0]->path):url('/images/home-bg.jpg')}}
@endsection
@section('subject')
   {{$post->title}}
@endsection

@section('head')
    <style>
    .my-textarea:focus{
        border:1px solid #1197a8;
        border-radius: 20px;
        padding: 10px;
        }
    
    </style>
    @endsection
@section('content')
    <article>
            <div class="row">
                <div class=" col-md-10">
                    {{$post->text}}
                    <div class="row">
                    @foreach($post->photo as $photo)

                            <div class="col-md-4">
                                <img  src="{{url('/images/'.$photo->path)}}" style="width: 150px;height: 150px"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </article>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control my-textarea" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
