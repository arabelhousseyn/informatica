<ol class="breadcrumb">
    <li><a href="/dashboard/admin"><i class="fa fa-dashboard"></i> Acceuil</a></li>
    @foreach($data as $value)
        <li class="active">{{$value}}</li>
    @endforeach
</ol>
