@extends('adminlte::page')
@section('title', 'Lano\'s Informatica - Home')

@section('content')


        <h2>Manage Categoria</h2>

        @if(Session::has('message'))
            <div class="alert alert-success">
                <strong><span class="glyphicon glyphicon-ok"></span>{{  Session::get('message') }}</strong>
            </div>
        @endif

        @if(count($Categorias)>0)
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL No</th>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                @foreach($Categorias as $Categoria)
                    <tr>
                        <td>{{$i}} </td>
                        <td> <a href="{{Request::root()}}/Categoria/view-Categoria/{{$Categoria->id}}" > {{$Categoria->id }}</a> </td>
                        <td>  {{$Categoria->nome }} </td>
                        <td>
                            <a href="{{Request::root()}}/Categoria/change-status-Categoria/{{$Categoria->id }}" > @if($Categoria->status==0) {{"Activate"}}  @else {{"Dectivate"}} @endif </a>
                            <a href="{{Request::root()}}/Categoria/edit-Categoria/{{$Categoria->id}}" >Edit</a>
                            <a href="{{Request::root()}}/Categoria/delete-Categoria/{{$Categoria->id}}" onclick="return confirm('are you sure to delete')">Delete</a>
                        </td>

                    </tr>
                    <?php $i++;  ?>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info" role="alert">
                <strong>No Categorias Found!</strong>
            </div>
        @endif
@endsection