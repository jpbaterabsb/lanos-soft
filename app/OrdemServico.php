<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    public function usuarioOrdemServicos(){
        return $this->hasMany('App\OrdemServico');
    }

    public function ordemServicoProdutos(){
        return $this->hasMany('App\OrdemServicoProduto');
    }
}
