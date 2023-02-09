@extends('dashboard.main')
@section('title','admin panel-Acceuil')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau de bord
            <small>Admin panel</small>
        </h1>
        @include('dashboard.layouts.breadcrumb',['data' => ['Admins',"modifier $admin->full_name"]])

        <a href="{{route('dashboard.admins.index')}}" class="btn btn-success" style="margin-top: 20px;"><i class="fa fa-arrow-circle-left"></i></a>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modifier admin</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('dashboard.admins.update',$admin)}}">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom complet</label>
                                <input type="text" class="form-control" name="full_name" placeholder="Nom complet" value="{{$admin->full_name}}" required>
                                <x-input-error class="mt-2" :messages="$errors->get('full_name')" />
                            </div>

                            <div class="form-group">
                                <label>Téléphone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Téléphone" value="{{$admin->phone}}" required>
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="E-mail" value="{{$admin->email}}" required>
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Modifier</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
