@extends('admin/app')

@section('headSection')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
            <section class="content-header">
                @include('includes.messages')
            </section>
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Uses</h3>
                    <a href="{{route('users.create')}}" class="col-lg-offset-5 btn btn-success">Add new</a>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Assigned Roles</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$user->name}} </td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                {{$role->role}}
                                             @endforeach
                                        </td>
                                        <td>{{$user->status? 'Active':'Not active'}} </td>

                                        <td> <a href="{{route('users.edit',$user->id)}}"><i class="fa fa-fw fa-edit"></i></a></td>
                                        <td>

                                            <form id="form-{{$user->id}}" action="{{route('users.destroy',$user->id)}}" method="post" style="display:none;">
                                                {{csrf_field()}}
                                                {{method_field('delete')}}
                                            </form>
                                            <a href="" onclick="
                                                    if(confirm('Are you sure? You want to delete this? ')){
                                                    event.preventDefault();
                                                    document.getElementById('form-{{$user->id}}').submit();
                                                    }else{
                                                    event.preventDefault();
                                                    }
                                                    " >

                                                <i class="fa fa-fw fa-trash"></i></a>

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Assigned Roles</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('footerSection')
    <!-- DataTables -->
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection