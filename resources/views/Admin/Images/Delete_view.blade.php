
@extends('layouts/Admin_app')

@section('title')
    Delete Image
@endsection

@section('content')
    <form method="post" action="{{route('Image.destroy',$photo->id)}}">
        {{csrf_field()}}
        @method('DELETE')
        <div class="col-lg-4">
            <div class="panel panel-red">
                <div class="panel-heading">
                    Delete Image
                </div>
                <div class="panel-body">
                    <label>Are you sure></label><br/>
                    <img src="{{url('/images/'.$photo->path)}}" style="width: 100px; height: 100px">
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </div>
        </div>
    </form>
@endsection
