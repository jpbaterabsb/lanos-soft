<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $fillable = [
        'id', 'nome', 'tipo', 'categoria_id', 'created_at','updated_at'
    ];

    public function __construct()
    {

    }


    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function compraProdutos(){
        return $this->hasMany('App\CompraProduto');
    }

    public function ordemServicoProdutos(){
        return $this->hasMany('App\OrdemServicoProduto');
    }
}
