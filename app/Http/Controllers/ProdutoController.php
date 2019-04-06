<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Produto;
use App\Utils\Converter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProdutoController extends Controller
{
    public function index()
    {
        $data['Produtos'] = Produto::all();
        return view('Produto/index',$data);
    }
    public function add()
    {
        $data['Categorias'] = Categoria::all();
        return view('Produto/add',$data);
    }
    public function addPost()
    {
        $Produto_data = array(
            'nome' => Input::get('nome'),
            'tipo' => Input::get('tipo'),
            'categoria_id' => Input::get('categoria'),
            'valor' => Converter::stringMoneyToDecimal(Input::get('valor'))
        );
        $Produto_id = Produto::insert($Produto_data);
        return redirect('Produto')->with('message', 'Produto successfully added');
    }
    public function delete($id)
    {
        $Produto=Produto::find($id);
        $Produto->delete();
        return redirect('Produto')->with('message', 'Produto deleted successfully.');
    }
    public function edit($id)
    {
        $data['Produto']=Produto::find($id);
        $data['Categorias'] = Categoria::all();
        return view('Produto/edit',$data);
    }
    public function editPost()
    {
        $id =Input::get('Produto_id');
        $Produto=Produto::find($id);

        $Produto_data = array(
            'nome' => Input::get('nome'),
            'tipo' => Input::get('tipo'),
            'categoria_id' => Input::get('categoria'),
            'valor' => Converter::stringMoneyToDecimal(Input::get('valor'))
        );
        dd($Produto_data);
        $Produto_id = Produto::where('id', '=', $id)->update($Produto_data);
        return redirect('Produto')->with('message', 'Produto Updated successfully');
    }


    public function changeStatus($id)
    {
        $Produto=Produto::find($id);
        $Produto->status=!$Produto->status;
        $Produto->save();
        return redirect('Produto')->with('message', 'Change Produto status successfully');
    }
    public function view($id)
    {
        $data['Produto']=Produto::find($id);
        return view('Produto/view',$data);

    }

    public function pesquisarNomeProduto(Request $request)
    {
            $n = $request->query('query');
            $results = array();
            $queries =  DB::table('produtos')
                ->where('nome', 'like', '%'.$n.'%')
                ->get();

            foreach ($queries as $query)
            {
                $results[] = [ 'id' => $query->id, 'value' => $query->nome, 'valor' => $query->valor ];
            }

        return response()->json(array("suggestions" => $results));
    }
}
