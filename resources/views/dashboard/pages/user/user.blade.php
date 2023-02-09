@extends('dashboard.main')
@section('title','admin panel-utilisateurs')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau de bord
            <small>Admin panel</small>
        </h1>
        @include('dashboard.layouts.breadcrumb',['data' => ['Utilisateurs']])

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Utilisateurs</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="users" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nom complet</th>
                                    <th>email</th>
                                    <th>Téléphone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->full_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td class="action">
                                            <form method="post" action="{{route('dashboard.users.destroy',$user)}}">
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
            $('#users').DataTable()
        })
    </script>
@endsection
