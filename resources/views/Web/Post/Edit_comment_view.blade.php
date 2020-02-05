
@extends('layouts.Web_app')

@section('title')
    Edit Comment
@endsection


@section('headerImage')
    {{count($post->photo)>0?url('/images/'.$post->photo[0]->path):url('/images/home-bg.jpg')}}
@endsection
@section('subject')
   {{$post->title}}
@endsection

@section('head')
    <style>
        .my-textarea{
            border: 1px solid #a3a3a3 !important;
            border-radius: 20px !important;
            padding: 10px !important;
        }

        .my-textarea:focus {
            border: 1px solid #1197a8;
            border-radius: 20px;
            padding: 10px;
        }

    </style>
    @endsection
@section('content')

    @auth
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{route('Web.post_comment',$post->id)}}">
                    {{csrf_field()}}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control my-textarea" name="content" placeholder="Comment" required data-validation-required-message="Please enter a message.">{{$comment->content}}</textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="border-radius: 8px" id="sendMessageButton">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endauth
@endsection
