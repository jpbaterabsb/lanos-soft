<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategoriaController extends Controller
{
    public function index()
    {
        $data['Categorias'] = Categoria ::all();
        return view('Categoria/index',$data);
    }
    public function add()
    {
        return view('Categoria/add');
    }
    public function addPost()
    {
        $Categoria_data = array(
            'nome' => Input::get('nome'),
        );
        $Categoria_id = Categoria::insert($Categoria_data);
        return redirect('Categoria')->with('message', 'Categoria successfully added');
    }
    public function delete($id)
    {
        $Categoria=Categoria::find($id);
        $Categoria->delete();
        return redirect('Categoria')->with('message', 'Categoria deleted successfully.');
    }
    public function edit($id)
    {
        $data['Categoria']=Categoria::find($id);
        return view('Categoria/edit',$data);
    }
    public function editPost()
    {
        $id =Input::get('Categoria_id');
        $Categoria=Categoria::find($id);

        $Categoria_data = array(
            'nome' => Input::get('nome'),
        );
        $Categoria_id = Categoria::where('id', '=', $id)->update($Categoria_data);
        return redirect('Categoria')->with('message', 'Categoria Updated successfully');
    }


    public function changeStatus($id)
    {
        $Categoria=Categoria::find($id);
        $Categoria->status=!$Categoria->status;
        $Categoria->save();
        return redirect('Categoria')->with('message', 'Change Categoria status successfully');
    }
    public function view($id)
    {
        $data['Categoria']=Categoria::find($id);
        return view('Categoria/view',$data);

    }
}
