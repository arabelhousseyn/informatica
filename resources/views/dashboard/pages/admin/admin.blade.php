@extends('dashboard.main')
@section('title','admin panel-admins')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau de bord
            <small>Admin panel</small>
        </h1>
        @include('dashboard.layouts.breadcrumb',['data' => ['Admins']])

        <a href="{{route('dashboard.admins.create')}}" class="btn btn-primary" style="margin-top: 20px;">Ajouter admin <i class="fa fa-plus"></i></a>
    </section>

    <!-- Main content -->
    <section class="content">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Admins</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="admins" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nom complet</th>
                                        <th>email</th>
                                        <th>Téléphone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                        <tr>
                                            <td>{{$admin->full_name}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td>{{$admin->phone}}</td>
                                            <td class="action">
                                                <a href="{{route('dashboard.admins.edit',$admin)}}" class="btn btn-success">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <form method="post" action="{{route('dashboard.admins.destroy',$admin)}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-times-circle"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Nom complet</th>
                                        <th>email</th>
                                        <th>Téléphone</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
    </section>
    <!-- /.content -->

    <!-- page script -->
    <script>
        $(function () {
            $('#admins').DataTable()
        })
    </script>
@endsection
