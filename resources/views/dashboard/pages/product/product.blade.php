@extends('dashboard.main')
@section('title','admin panel-produits')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau de bord
            <small>Admin panel</small>
        </h1>
        @include('dashboard.layouts.breadcrumb',['data' => ['Produits']])

        <a href="{{route('dashboard.products.create')}}" class="btn btn-primary" style="margin-top: 20px;">Ajouter produit <i class="fa fa-plus"></i></a>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Produits</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="products" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Description</th>
                                    <th>Catégorie</th>
                                    <th>Ancien prix</th>
                                    <th>Nouveaux prix</th>
                                    <th>Remise %</th>
                                    <th>Publié à</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->category?->name}}</td>
                                        <td>{{$product->old_price}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->discount}}</td>
                                        <td>{{\Illuminate\Support\Carbon::parse($product->published_at)->format('Y-m-d H:i:s')}}</td>
                                        <td class="action">
                                            <a href="{{route('dashboard.products.edit',$product)}}" class="btn btn-success">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <form method="post" action="{{route('dashboard.products.destroy',$product)}}">
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
            $('#products').DataTable()
        })
    </script>
@endsection
