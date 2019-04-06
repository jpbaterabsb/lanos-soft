<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function ordemServicos(){
        return $this->hasMany('App\OrdemServico');
    }
}
