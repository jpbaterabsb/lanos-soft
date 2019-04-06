<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FornecedorController extends Controller
{
    public function index()
    {
        $data['Fornecedors'] = Fornecedor::all();
        return view('Fornecedor/index',$data);
    }
    public function add()
    {
        return view('Fornecedor/add');
    }
    public function addPost()
    {
        $Fornecedor_data = array(
            'nome' => Input::get('nome'),
            'telefone' => Input::get('telefone'),
            'email' => Input::get('email'),
            'endereco' => Input::get('endereco'),
            'cidade' => Input::get('cidade'),
            'cep' => Input::get('cep'),
        );
        $Fornecedor_id = Fornecedor::insert($Fornecedor_data);
        return redirect('Fornecedor')->with('message', 'Fornecedor successfully added');
    }
    public function delete($id)
    {
        $Fornecedor=Fornecedor::find($id);
        $Fornecedor->delete();
        return redirect('Fornecedor')->with('message', 'Fornecedor deleted successfully.');
    }
    public function edit($id)
    {
        $data['Fornecedor']=Fornecedor::find($id);
        return view('Fornecedor/edit',$data);
    }
    public function editPost()
    {
        $id =Input::get('Fornecedor_id');
        $Fornecedor=Fornecedor::find($id);

        $Fornecedor_data = array(
            'nome' => Input::get('nome'),
            'telefone' => Input::get('telefone'),
            'email' => Input::get('email'),
            'endereco' => Input::get('endereco'),
            'cidade' => Input::get('cidade'),
            'cep' => Input::get('cep'),
        );
        $Fornecedor_id = Fornecedor::where('id', '=', $id)->update($Fornecedor_data);
        return redirect('Fornecedor')->with('message', 'Fornecedor Updated successfully');
    }


    public function changeStatus($id)
    {
        $Fornecedor=Fornecedor::find($id);
        $Fornecedor->status=!$Fornecedor->status;
        $Fornecedor->save();
        return redirect('Fornecedor')->with('message', 'Change Fornecedor status successfully');
    }
    public function view($id)
    {
        $data['Fornecedor']=Fornecedor::find($id);
        return view('Fornecedor/view',$data);

    }
}
