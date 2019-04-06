<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    public function index()
    {
        $data['Clientes'] = Cliente::all();
        return view('Cliente/index',$data);
    }
    public function add()
    {
        return view('Cliente/add');
    }
    public function addPost()
    {
        $Cliente_data = array(
            'nome' => Input::get('nome'),
            'telefone' => Input::get('telefone'),
            'email' => Input::get('email'),
            'endereco' => Input::get('endereco'),
            'cidade' => Input::get('cidade'),
            'cep' => Input::get('cep'),
        );
        $Cliente_id = Cliente::insert($Cliente_data);
        return redirect('Cliente')->with('message', 'Cliente successfully added');
    }
    public function delete($id)
    {
        $Cliente=Cliente::find($id);
        $Cliente->delete();
        return redirect('Cliente')->with('message', 'Cliente deleted successfully.');
    }
    public function edit($id)
    {
        $data['Cliente']=Cliente::find($id);
        return view('Cliente/edit',$data);
    }
    public function editPost()
    {
        $id =Input::get('Cliente_id');
        $Cliente=Cliente::find($id);

        $Cliente_data = array(
            'nome' => Input::get('nome'),
            'telefone' => Input::get('telefone'),
            'email' => Input::get('email'),
            'endereco' => Input::get('endereco'),
            'cidade' => Input::get('cidade'),
            'cep' => Input::get('cep'),
        );
        $Cliente_id = Cliente::where('id', '=', $id)->update($Cliente_data);
        return redirect('Cliente')->with('message', 'Cliente Updated successfully');
    }


    public function changeStatus($id)
    {
        $Cliente=Cliente::find($id);
        $Cliente->status=!$Cliente->status;
        $Cliente->save();
        return redirect('Cliente')->with('message', 'Change Cliente status successfully');
    }
    public function view($id)
    {
        $data['Cliente']=Cliente::find($id);
        return view('Cliente/view',$data);

    }

    public function pesquisarNomeCliente(Request $request)
    {
        $n = $request->query('query');
        $results = array();
        $queries =  DB::table('clientes')
            ->where('nome', 'like', '%'.$n.'%')
            ->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->nome ];
        }

        return response()->json(array("suggestions" => $results));
    }
}
