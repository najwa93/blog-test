@extends('layouts/Admin_app')

@section('title')
    Display Image
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{route('Image.create')}}" style="margin-bottom: 10px">Add Image</a>
            <div class="panel panel-primary">
                <div class="panel-heading">
                  Images
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @foreach($photos as $photo)
                        <a href="{{route('Image.delete',['id' => $photo->id])}}"><img src="{{url('/images/'.$photo->path)}}" style="width: 100px;height: 100px"></a>
                        @endforeach
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>


        <!-- /.col-lg-12 -->
    </div>
@endsection
