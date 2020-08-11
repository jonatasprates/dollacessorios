<?php

namespace App\Model\Painel;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['categoria'];
    
    public $rules = [
        'categoria' => 'required|min:3|max:120'
    ];
    
    public function produtos()
    {
        return $this->hasMany('App\Model\Painel\Produto', 'id_categoria');
    }
    
}
