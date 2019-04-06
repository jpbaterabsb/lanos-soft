@extends('adminlte::page')
@section('title', 'Lano\'s Informatica - Home')

@section('content')
    <h2>Update Produto</h2>
    <form role="form" method="post" action="{{Request::root()}}/Produto/edit-Produto-post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" value="<?php echo $Produto->id ?>"   name="Produto_id">


        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" value="<?php echo $Produto->nome ?>" class="form-control" id="nome" name="nome">
        </div>
        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <select class="form-control" id="tipo" name="tipo">
                <option value="SERVICO" <?php if($Produto->tipo == "SERVICO"){ echo "selected"; } ?> >SERVICO</option>
                <option value="MATERIAL" <?php if($Produto->tipo == "MATERIAL"){ echo "selected"; } ?> >MATERIAL</option>
            </select>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select class="form-control" id="categoria" name="categoria">
                @foreach($Categorias as $categoria)
                    <option value="{{$Produto->categoria->id}}">{{$Produto->categoria->id}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" class="form-control" id="valor" name="valor" value="<?php echo $Produto->valor ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection