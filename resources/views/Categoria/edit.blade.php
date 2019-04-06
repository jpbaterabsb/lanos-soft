@extends('adminlte::page')
@section('title', 'Lano\'s Informatica - Home')

@section('content')

        <h2>Update Categoria</h2>
        <form role="form" method="post" action="{{Request::root()}}/Categoria/edit-Categoria-post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" value="<?php echo $Categoria->id ?>"   name="Categoria_id">

            <div class="form-group ">
                <label for="nome">Nome:</label>
                <input type="text" value="<?php echo $Categoria->nome ?>" class="form-control" id="nome" name="nome">
            </div>

            <div class="form-group ">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

@endsection