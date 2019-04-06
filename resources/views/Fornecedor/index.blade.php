@extends('adminlte::page')
@section('title', 'Lano\'s Informatica - Home')

@section('content')
    <h2>Manage Fornecedor</h2>

    @if(Session::has('message'))
        <div class="alert alert-success">
            <strong><span class="glyphicon glyphicon-ok"></span>{{  Session::get('message') }}</strong>
        </div>
    @endif

    @if(count($Fornecedors)>0)
        <table class="table table-hover">
            <thead>
            <tr>
                <th>SL No</th>
                <th>nome</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1 ?>
            @foreach($Fornecedors as $Fornecedor)
                <tr>
                    <td>{{$i}} </td>
                    <td> <a href="{{Request::root()}}/Fornecedor/view-Fornecedor/{{$Fornecedor->id}}" > {{$Fornecedor->nome }}</a> </td>

                    <td>
                        <a href="{{Request::root()}}/Fornecedor/change-status-Fornecedor/{{$Fornecedor->id }}" > @if($Fornecedor->status==0) {{"Activate"}}  @else {{"Dectivate"}} @endif </a>
                        <a href="{{Request::root()}}/Fornecedor/edit-Fornecedor/{{$Fornecedor->id}}" >Edit</a>
                        <a href="{{Request::root()}}/Fornecedor/delete-Fornecedor/{{$Fornecedor->id}}" onclick="return confirm('are you sure to delete')">Delete</a>
                    </td>

                </tr>
                <?php $i++;  ?>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info" role="alert">
            <strong>No Fornecedors Found!</strong>
        </div>
    @endif
@endsection