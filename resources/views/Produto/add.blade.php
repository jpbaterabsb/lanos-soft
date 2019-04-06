@extends('adminlte::page')
@section('title', 'Lano\'s Informatica - Home')

@section('content')
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>
    <h2>Add Produtos</h2>
    <form role="form" method="post" action="{{Request::root()}}/Produto/add-Produto-post" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <select class="form-control" id="tipo" name="tipo">
                <option value="SERVICO">SERVICO</option>
                <option value="MATERIAL">MATERIAL</option>
            </select>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select class="form-control" id="categoria" name="categoria">
                @foreach($Categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="valor">Valor R$:</label>
            <input type="text" class="form-control money" id="valor" name="valor">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection