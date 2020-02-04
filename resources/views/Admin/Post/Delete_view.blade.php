
@extends('layouts/Admin_app')

@section('title')
    Delete Post
  @endsection

@section('content')
    <form method="post" action="{{route('Post.destroy',$post->id)}}">
        {{csrf_field()}}
        @method('DELETE')
        <div class="col-lg-4">
            <div class="panel panel-red">
                <div class="panel-heading">
                    Delete Post
                </div>
                <div class="panel-body">
                    <label>Are you sure?</label><br/>
                    <span style="color: #761c19">{{$post->title}}</span>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </div>
        </div>
    </form>
    @endsection
