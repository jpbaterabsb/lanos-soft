<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    public function compras(){
        return $this->hasMany('App\Compra');
    }
}
