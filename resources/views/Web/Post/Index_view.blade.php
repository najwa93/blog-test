
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

        .comment {
            margin: 20px;
            border: solid #0c5460 1px;
            border-radius: 20px;
            padding: 10px;
            word-wrap: break-word;
        }

        .comment .user-name {
            width: 75px;
            height: 75px;
            background-color: #0c5460;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .control{
            font-size: 13px;
        }
        .comment .footer{
            font-size: 12px;
            color: #828d95;
            margin-left: auto;
            margin-right: 0;

        }

    </style>
    @endsection
@section('content')
    <article>
            <div class="row">
                <div class=" col-md-10">
                   {!! $post->text !!}
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
                            <textarea rows="5" class="form-control my-textarea" name="content" placeholder="Comment" required data-validation-required-message="Please enter a message."></textarea>
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

    <div class="row">
        <div class="col-md-12">
            @foreach($comment as $comm)
            <div class="row comment">
                <div class="col-md-2">
                    <div class="user-name">
                        <label> {{$comm->user->name}} </label>
                    </div>
                </div>
                <div class="col-md-8">
                   {{$comm->content}}
                </div>
                @if($comm->user_id == \Illuminate\Support\Facades\Auth::user()->id or \Illuminate\Support\Facades\Auth::user()->role == 'admin' or \Illuminate\Support\Facades\Auth::user()->id == $post->section->user_id)
                <div class="col-md-2">
                    <div class="control">
                        <a href="{{route('Comment.edit',['id' => $comm->id])}}">Edit</a>
                        <a href="#">Delete</a>
                    </div>
                </div>
                @endif
                <div class="footer">
                  {{ $comm->created_at}}
                </div>
            </div>
                @endforeach
        </div>
    </div>
    @endauth
@endsection
