<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public function compraProdutos(){
        return $this->hasMany('App\CompraProduto');
    }
}
