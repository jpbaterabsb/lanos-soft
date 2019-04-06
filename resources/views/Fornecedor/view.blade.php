@extends('adminlte::page')
@section('title', 'Lano\'s Informatica - Home')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-10 well">
            nome  :  <?php echo $Fornecedor->nome ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-10 well">
            telefone  :  <?php echo $Fornecedor->telefone ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-10 well">
            email  :  <?php echo $Fornecedor->email ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-10 well">
            endereco  :  <?php echo $Fornecedor->endereco ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-10 well">
            cidade  :  <?php echo $Fornecedor->cidade ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-10 well">
            cep  :  <?php echo $Fornecedor->cep ?>
        </div>
    </div>
@endsection