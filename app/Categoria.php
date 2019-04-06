<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $table = 'categorias';
//    protected $fillable = [
//        'id', 'nome', 'created_at','updated_at'
//    ];


    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
