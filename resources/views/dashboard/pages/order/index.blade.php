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
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>adresse 1</th>
                                    <th>adresse 2</th>
                                    <th>Ville</th>
                                    <th>Total prix</th>
                                    <th>Statu</th>
                                    <th>Articles</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->first_name}}</td>
                                        <td>{{$order->last_name}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->address1}}</td>
                                        <td>{{$order->address2}}</td>
                                        <td>{{$order->city}}</td>
                                        <td>{{(new NumberFormatter('ar_DZ',NumberFormatter::CURRENCY))->formatCurrency($order->total,'DZD')}}</td>
                                        <td>
                                            @if($order->status == \App\States\Order\Pending::getMorphClass())
                                                en attente
                                            @endif

                                            @if($order->status == \App\States\Order\Shipment::getMorphClass())
                                                    expédié
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="{{route('dashboard.orders.show',$order)}}"><i class="fa fa-first-order"></i></a>
                                        </td>
                                        <td class="action">

                                            @if($order->status == \App\States\Order\Pending::getMorphClass())
                                                <form method="post" action="{{route('dashboard.orders.update',$order)}}">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            <form method="post" action="{{route('dashboard.orders.destroy',$order)}}">
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
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>adresse 1</th>
                                    <th>adresse 2</th>
                                    <th>Ville</th>
                                    <th>Total prix</th>
                                    <th>Statu</th>
                                    <th>Articles</th>
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
