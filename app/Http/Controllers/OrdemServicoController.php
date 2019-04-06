<?php

namespace App\Http\Controllers;

use App\OrdemServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PhpParser\Node\Expr\Cast\Object_;

class OrdemServicoController extends Controller
{
    public $data;
    public function index()
    {
        $data['OrdemServicos'] = OrdemServico::all();
        return view('OrdemServico/index',$data);
    }
    public function add()
   {

        return view('OrdemServico/add',array(data => []));
    }
    public function addPost()
    {
        $OrdemServico_data = array(
            'descricao' => Input::get('descricao'),
            'cliente' => Input::get('cliente'),
            'produto' => Input::get('produto'),
            'desconto' => Input::get('desconto'),
        );
        $OrdemServico_id = OrdemServico::insert($OrdemServico_data);
        return redirect('OrdemServico')->with('message', 'OrdemServico successfully added');
    }
    public function delete($id)
    {
        $OrdemServico=OrdemServico::find($id);
        $OrdemServico->delete();
        return redirect('OrdemServico')->with('message', 'OrdemServico deleted successfully.');
    }
    public function edit($id)
    {
        $data['OrdemServico']=OrdemServico::find($id);
        return view('OrdemServico/edit',$data);
    }
    public function editPost()
    {
        $id =Input::get('OrdemServico_id');
        $OrdemServico=OrdemServico::find($id);

        $OrdemServico_data = array(
            'descricao' => Input::get('descricao'),
            'cliente' => Input::get('cliente'),
            'produto' => Input::get('produto'),
            'desconto' => Input::get('desconto'),
        );
        $OrdemServico_id = OrdemServico::where('id', '=', $id)->update($OrdemServico_data);
        return redirect('OrdemServico')->with('message', 'OrdemServico Updated successfully');
    }


    public function changeStatus($id)
    {
        $OrdemServico=OrdemServico::find($id);
        $OrdemServico->status=!$OrdemServico->status;
        $OrdemServico->save();
        return redirect('OrdemServico')->with('message', 'Change OrdemServico status successfully');
    }
    public function view($id)
    {
        $data['OrdemServico']=OrdemServico::find($id);
        return view('OrdemServico/view',$data);

    }

    public function table(Request $request)
    {
        array_push($request['produtoObject'],$this->data);
        return view('OrdemServico/add').with('a', $this->data);
    }
}
