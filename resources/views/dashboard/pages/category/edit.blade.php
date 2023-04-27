@extends('dashboard.main')
@section('title','admin panel-modifier')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau de bord
            <small>Admin panel</small>
        </h1>
        @include('dashboard.layouts.breadcrumb',['data' => ['Catégories',"modifier $category->name"]])

        <a href="{{route('dashboard.categories.index')}}" class="btn btn-success" style="margin-top: 20px;"><i class="fa fa-arrow-circle-left"></i></a>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modifier catégorie</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('dashboard.categories.update',$category)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Catégorie</label>
                                <input type="text" class="form-control" name="name" placeholder="Catégories" value="{{$category->name}}">
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div class="form-group">
                                <label >Image</label>
                                <input type="file" class="form-control" name="image">
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />

                                <img src="{{$category->photo}}" width="300" height="300">
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
