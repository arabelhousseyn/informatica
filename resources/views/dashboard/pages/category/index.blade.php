@extends('dashboard.main')
@section('title','admin panel-catégories')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tableau de bord
            <small>Admin panel</small>
        </h1>
        @include('dashboard.layouts.breadcrumb',['data' => ['Catégories']])

        <a href="{{route('dashboard.categories.create')}}" class="btn btn-primary" style="margin-top: 20px;">Ajouter une
            catégorie <i class="fa fa-plus"></i></a>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Catégories</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="admins" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Désignation</th>
                                    <th>Catégorie fils</th>
                                    <th>Image</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            @if(!blank($category->children))
                                                <ul>
                                                    @foreach($category->children as $child)
                                                        <li>{{$child->name}}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{$category->photo}}" width="100" height="100"/>
                                        </td>
                                        <td>{{$category->created_at->format('Y-m-d H:i:s')}}</td>
                                        <td class="action">

                                            @if($category->depth != 1)
                                                <a href="{{route('dashboard.categories.show',$category)}}"
                                                   class="btn btn-primary" style="margin-top: 20px;">Ajouter un
                                                    sous catégorie <i class="fa fa-plus"></i></a>
                                            @endif


                                            <a href="{{route('dashboard.categories.edit',$category)}}"
                                               class="btn btn-success"><i class="fa fa-pencil"></i></a>

                                            <form method="post"
                                                  action="{{route('dashboard.categories.destroy',$category)}}">
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
                                    <th>Désignation</th>
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

    <!-- page scriptt -->
    <script>
        $(function () {
            $('#admins').DataTable({
                order: [[3, 'desc']],
            })
        })
    </script>
@endsection
