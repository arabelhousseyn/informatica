@extends('dashboard.main')
@section('title','admin panel-commandes')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau de bord
            <small>Admin panel</small>
        </h1>
        @include('dashboard.layouts.breadcrumb',['data' => ['Commandes']])

        <a href="{{route('dashboard.orders.index')}}" class="btn btn-success" style="margin-top: 20px;"><i class="fa fa-arrow-circle-left"></i></a>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Commandes</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="admins" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Photo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>{{(new NumberFormatter('ar_DZ',NumberFormatter::CURRENCY))->formatCurrency($item->price,'DZD')}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>
                                            <img src="{{$item->product->photo}}" width="300" height="300" />
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Article</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Photo</th>
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
