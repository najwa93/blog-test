@extends('layouts/Admin_app')

@section('title')
    Add Post
    @endsection

@section('content')

    <form method="post" action="{{route('Post.store')}}">
        {{csrf_field()}}
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Post Info
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="name">Title:</label>
                    <input type="text" name="title" class="form-control" id="name" placeholder="Title">
                </div>

                <div class="form-group">
                    <label for="name">Text:</label>
                    <textarea name="text" placeholder="content" class="form-control ckeditor"></textarea>
                </div>

                <div class="form-group">
                    <label>Section:</label>
                    <select name="section_id" class="js-example-basic-single form-control">
                        @foreach($sections as $section)
                            <option value="{{$section->id}}">{{$section->name}}</option>
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
                                <input type="checkbox" name="photos[]" value="{{$photo->id}}/>
                            </div>
                                @endforeach
                    </div>
                </div>

            </div>
        </div>

        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
    </form>
    @endsection


