@extends('adminlte::page')
@section('title', 'Lano\'s Informatica - Home')

@section('content')

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>

    <h2>Update OrdemServico</h2>
    <form role="form" method="post" action="{{Request::root()}}/OrdemServico/edit-OrdemServico-post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" value="<?php echo $OrdemServico->id ?>"   name="OrdemServico_id">


        <div class="form-group">
            <label for="descricao">Descricao:</label>
            <input type="text" value="<?php echo $OrdemServico->descricao ?>" class="form-control" id="descricao" name="descricao">
        </div>
        <div class="form-group">
            <label for="produto">Produto:</label>
            <input type="text" value="<?php echo $OrdemServico->produto ?>" class="form-control" id="produto" name="produto">
        </div>
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <input type="text" value="<?php echo $OrdemServico->cliente ?>" class="form-control" id="cliente" name="cliente">
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" value="<?php echo $OrdemServico->valor ?>" class="form-control" id="valor" name="valor">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection