@extends('adminlte::page')
@section('title', 'Lano\'s Informatica - Home')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-10 well">
                id  :  <?php echo $Categoria->id ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-10 well">
                nome  :  <?php echo $Categoria->nome ?>
            </div>
        </div>
@endsection