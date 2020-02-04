@extends('layouts/Admin_app')

@section('title')
    Update Section
@endsection

@section('content')

    <form method="post" action="{{route('Post.update',$post->id)}}">
        {{csrf_field()}}
        @method('PUT')
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Section Info
                </div>
                <div class="panel-body">
                    <label>Editor For This Section:</label>
                    <div class="form-group">
                        <label for="name">Title:</label>
                        <input type="text" name="title" class="form-control" id="name" placeholder="Title" value="{{$post->title}}">
                    </div>

                    <div class="form-group">
                        <label for="name">Text:</label>
                        <textarea name="text" placeholder="content" class="form-control ckeditor" >{{$post->text}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Section:</label>
                        <select name="section_id" class="js-example-basic-single form-control">
                            @foreach($sections as $section)
                                <option {{$section->id == $post->section->id?'selected="selected"':''}} value="{{$section->id}}">{{$section->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Post Info
                </div>
                <div class="panel-body">
                    <div class="row">
                            @foreach($photos as $photo)
                                <div class="col-md-4">
                                    <img src="{{url('/images/'.$photo->path)}}" style="width: 100px;height: 100px; margin: 10px;" onclick="alert('{{url('/images/'.$photo->path)}}')">
                                    <input {{$post->photo()->where('photo_id',$photo->id)->count()==1?'checked':''}} type="checkbox" name="photos[]" value="{{$photo->id}}" />
                                </div>
                            @endforeach
                    </div>
                </div>

            </div>
        </div>

    </form>
@endsection


