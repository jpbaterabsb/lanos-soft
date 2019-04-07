@extends('adminlte::page')
@section('title', 'Lano\'s Informatica - Home')
@section('content')


    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/jquery.autocomplete.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>
    <link href="{{asset('css/jquery.autocomplete.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h2>Add OrdemServico</h2>
    <form role="form" method="post" action="{{Request::root()}}/OrdemServico/add-OrdemServico-post">
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
            <input type="hidden" id="produtoId" name="produtoId">
            <input type="hidden" id="produtoObject" name="produtoObject">
        </div>

        <div class="form-group">
            <button type="button" class="btn btn-primary" id="btn">Adicionar</button>
        </div>

        <table class="table table-striped table-bordered" id="myTable">
            <thead class="">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Valor</th>
                <th scope="col">Acap</th>
            </tr>
            </thead>

        </table>

        <div class="form-group row">
            <div class="col-sm-1 ">
                <label for="inputPassword" class="col-form-label">Desconto:</label>
            </div>
            <div class="col-sm-5">
                <input type="desconto" class="form-control money2" id="desconto" name="desconto" placeholder="Desconto">
            </div>
            <div class="col-sm-2">
                <p id="total">Total R$ 0,00</p>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>


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
        $(document).ready(function () {

            $('#myTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
            });

            var t = $('#myTable').DataTable();


            $('input.form-control.input-sm').on('keyup', function () {

                t.search(this.value).draw();
            });

            $("#btn").click(function () {

                var produto = JSON.parse($('#produtoObject').val());

                t.row.add([
                    produto.id, produto.value, produto.valor,
                    "<button name='remove' type='button' class='btn btn-primary remove'>Remover</button>"
                ]).draw(false)


                $('#total').text('R$' + mascaraValor
                (
                    parseFloat(
                        t
                            .column(2)
                            .data()
                            .reduce(function (a, b) {
                                return parseFloat(a) + parseFloat(b);
                            })).toFixed(2)));
            });

            $('#myTable tbody').on('click', '.remove', function () {
                t
                    .row($(this).parents('tr'))
                    .remove()
                    .draw()

                $('#total').text('R$' + mascaraValor
                (
                    parseFloat(
                        t
                        .column(2)
                        .data()
                        .reduce(function (a, b) {
                            return parseFloat(a) + parseFloat(b);
                        })).toFixed(2)));
            });

            $('#desconto').keyup( function () {
                let valor = $("#total").val();
               valor = valor.substring(valor.indexOf("R$"), valor.length);


                $('#total').text('R$' +  mascaraValor(parseFloat($("#total").val()).toFixed(2) - parseFloat($(this).val()).toFixed(2)));
            });
        });


    </script>
    <style>

    </style>
@endsection