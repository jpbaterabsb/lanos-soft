@extends('adminlte::page')
@section('title', 'Lano\'s Informatica - Home')

@section('content')
        <h2>Add Categoria</h2>
        <form role="form" method="post" action="{{Request::root()}}/Categoria/add-Categoria-post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection