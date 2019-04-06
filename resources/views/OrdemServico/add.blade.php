@extends('adminlte::page')
@section('title', 'Lano\'s Informatica - Home')
@section('content')


    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/jquery.autocomplete.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>
    <link href="{{asset('css/jquery.autocomplete.css')}}" rel="stylesheet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h2>Add OrdemServico</h2>
    <form role="form" method="post" action="{{Request::root()}}/OrdemServico/add-OrdemServico-post" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="descricao">Descricao:</label>
            <input type="text" class="form-control" id="descricao" name="descricao">
        </div>
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <input type="text" class="form-control" id="cliente" name="cliente">
            <input type="hidden" id="clienteId" name="clienteId">
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" class="form-control" id="valor" name="valor">
        </div>
        <div class="form-group">
            <label for="produto">Produto:</label>
            <input type="text" class="form-control" id="produto" name="produto">
            <button type="button" class="btn btn-primary" id="btn">Adicionar</button>
            <input type="hidden" id="produtoId" name="produtoId">
            <input type="hidden" id="produtoObject" name="produtoObject">
            <input type="hidden" id="data" name="data">
        </div>

        <table class="table table-striped table-bordered" id="myTable">
            <thead class="">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Valor</th>
            </tr>
            </thead>
            <tbody id="tbody">
            @if(isset($data))
                @foreach($data as $d)
                    <tr>
                        <th scope="col">#</th>
                        <td scope="col">Produto</td>
                        <td scope="col">Valor</td>
                    </tr>
                @endforeach
            @endif


            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        $('#produto').autocomplete({
            serviceUrl: '../Produto/nome',
            onSelect: function (suggestion) {
                $('#produtoId').val(suggestion.id);
                $('#produtoObject').val(JSON.stringify(suggestion));
            }
        });
        $('#cliente').autocomplete({
            serviceUrl: '../Cliente/nome',
            onSelect: function (suggestion) {
                $('#clienteId').val(suggestion.id)
            }
        });
        $(document).ready( function () {
            $('#myTable').DataTable();
            $('input.form-control.input-sm').keypress(function () {
                console.log($(this).val())
            });

            $("#btn").click(function () {
                // var html = $("#tbody").html();
                // var produto = JSON.parse($('#produtoObject').val());
                //
                // if($("#tbody").children().hasClass("odd")){
                //     $("#tbody").children().remove();
                // }


                // $("#tbody").prepend(`
                //     <tr id="l${produto.id}" >
                //         <th>${produto.id}</th>
                //         <td>${produto.value}</td>
                //         <td>${produto.valor}</td>
                //     </tr>
                // `);
                //
                //
                //
                //
                //
                // if ($('#data').val().isEmpty) {
                //     let produtoArray = new Array();;
                //     produtoArray.push(produto);
                // }else {
                //     // let produtoArray = $('#data').val();
                //     // produtoArray.push(produto);
                // }
            });
        } );








    </script>
    <style>

    </style>
@endsection