@extends('adminlte::page')
@section('title', 'Lano\'s Informatica - Home')
@section('content')
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>
    <h2>Add Cliente</h2>
    <form role="form" method="post" action="{{Request::root()}}/Cliente/add-Cliente-post" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="endereco">Endereco:</label>
            <input type="text" class="form-control" id="endereco" name="endereco">
        </div>
        <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade">
        </div>
        <div class="form-group">
            <label for="cep">Cep:</label>
            <input type="text" class="form-control" id="cep" name="cep">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection