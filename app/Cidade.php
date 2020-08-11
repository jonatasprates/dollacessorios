<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
   protected $fillable = ['id','nome'];


   public function empresas_cidade()
    {
        return $this->hasMany('App\Empresa', 'cidades_id');
    }
}
