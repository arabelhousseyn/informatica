@extends('dashboard.main')
@section('title','admin panel-Modifier')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau de bord
            <small>Admin panel</small>
        </h1>
        @include('dashboard.layouts.breadcrumb',['data' => ['Produits','Modifier ' . $product->name]])

        <a href="{{route('dashboard.products.index')}}" class="btn btn-success" style="margin-top: 20px;"><i class="fa fa-arrow-circle-left"></i></a>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modifier Produit</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('dashboard.products.update',$product)}}">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Article</label>
                                <input type="text" class="form-control" name="name" placeholder="Article" value="{{$product->name}}" required>
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Description" value="{{$product->description}}" required>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>

                            <div class="form-group">
                                <label >Prix</label>
                                <input type="text" class="form-control" name="price" placeholder="Prix" value="{{$product->price}}" required>
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>

                            <div class="form-group">
                                <label >Catégorie</label>
                                <select name="category_id" class="form-control" required>
                                    @foreach($allCategories as $category)
                                        <option value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                            </div>

                            <div class="form-group">
                                <label >Remise</label>
                                <input type="number" class="form-control" name="discount" placeholder="Remise" value="{{$product->discount_value}}">
                                <x-input-error class="mt-2" :messages="$errors->get('discount')" />
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
