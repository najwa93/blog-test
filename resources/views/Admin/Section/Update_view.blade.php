@extends('layouts/Admin_app')

@section('title')
    Update Post
@endsection

@section('content')

    <form method="post" action="{{route('Section.update',$section->id)}}">
        {{csrf_field()}}
        @method('PUT')
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Post Info
                </div>
                <div class="panel-body">
                    <label>Editor For This Section:</label>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="section name" value="{{$section->name}}">
                    </div>
                    <div class="form-group">
                        <select name="admin">
                            <option value="">Empty</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                            @if(!is_null($section->user))
                            <option selected="selected" value="{{$section->user->id}}">{{$section->user->name}}</option>
                                @endif
                        </select>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
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


