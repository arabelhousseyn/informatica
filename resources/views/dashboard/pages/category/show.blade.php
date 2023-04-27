@extends('dashboard.main')
@section('title','admin panel-ajouter')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau de bord
            <small>Admin panel</small>
        </h1>
        @include('dashboard.layouts.breadcrumb',['data' => ['Catégories','Ajouter']])

        <a href="{{route('dashboard.categories.index')}}" class="btn btn-success" style="margin-top: 20px;"><i
                class="fa fa-arrow-circle-left"></i></a>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ajouter un Sous catégorie</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('dashboard.categories.subCategory', $category)}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Désignation</label>
                                <input type="text" class="form-control" name="name" placeholder="Désignation" required>
                                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
