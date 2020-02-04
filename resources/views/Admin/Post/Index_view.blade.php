@extends('layouts/Admin_app')

@section('title')
    Index Posts
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    All Posts
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <a class="btn btn-primary" href="{{route('Section.index')}}" style="margin-bottom: 10px">Add Post</a>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Section</th>
                            <th>Posted by</th>
                            <th>Date</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                        <tr class="odd gradeX">
                            <td>{{$post->title}}</td>
                            <td>{{$post->section->name}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->created_at }}</td>
                            <td class="center">

                                <a class="btn btn-warning" href="{{route('Post.edit',['id' => $post->id])}}">Update</a>
                                <a class="btn btn-danger" href="{{route('Post.delete',['id' => $post->id])}}">Delete</a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

        <!-- /.col-lg-12 -->
    </div>
@endsection
