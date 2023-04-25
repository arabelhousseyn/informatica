@extends('dashboard.main')
@section('title','admin panel-publicités')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau de bord
            <small>Admin panel</small>
        </h1>
        @include('dashboard.layouts.breadcrumb',['data' => ['Publicités']])

        <a href="{{route('dashboard.ads.create')}}" class="btn btn-primary" style="margin-top: 20px;">Ajouter une publicité <i class="fa fa-plus"></i></a>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Publicités</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="admins" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ads as $ad)
                                    <tr>
                                        <td>{{$ad->title}}</td>
                                        <td>{{$ad->description}}</td>
                                        <td>
                                            <img src="{{$ad->photo}}" />
                                        </td>
                                        <td class="action">
                                            <form method="post" action="{{route('dashboard.ads.destroy',$ad)}}">
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
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Image</th>
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
