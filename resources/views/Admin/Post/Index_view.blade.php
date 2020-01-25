@extends('layouts/Admin_app')

@section('title')
    Index User
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <a class="btn btn-primary" href="{{route('Section.create')}}" style="margin-bottom: 10px">Add Section</a>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Admin</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $section)
                        <tr class="odd gradeX">
                            <td>{{$section->name}}</td>
                            <td>{{is_null($section->user)?'':$section->user->name}}</td>
                            <td class="center">
                                {{--<form action="{{route('Section.destroy',$section->id)}}" >
                                    @method('DELETE')
                                    {{csrf_field()}}
                                    <button type='submit' class= 'btn btn-danger' >Delete</button>
                                </form>--}}
                                <a class="btn btn-warning" href="{{route('Section.update',['id' => $section->id])}}">Update</a>
                                <a class="btn btn-danger" href="{{route('Section.delete',['id' => $section->id])}}">Delete</a>
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
