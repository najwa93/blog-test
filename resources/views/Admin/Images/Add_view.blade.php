@extends('layouts/Admin_app')

@section('title')
    Add Image
@endsection

@section('content')

    <form method="post" action="{{route('Image.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Image Info
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <input class="btn btn-primary" type="file" name="photo" value="Upload"/>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </div>
    </form>
@endsection


