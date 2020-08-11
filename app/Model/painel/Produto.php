<?php

namespace App\Model\Painel;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $fillable = ['id_categoria','imagem', 'produto','codigo','quantidade','material', 'peso'];
    
    public $rules = [
        'id_categoria' => 'required',
        'produto'      => 'required|min:3|max:150',
        'imagem'       => 'required|image|max:5000|mimes:jpg,png,jpeg',
        'codigo'       => 'required|min:3|max:15',
        'quantidade'   => 'required|max:11',
        'material'     => 'required|min:3|max:120',
    ];
    
    public $rulesEdit = [
        'id_categoria' => 'required',
        'produto'      => 'required|min:3|max:150',
        'imagem'       => 'image|max:5000|mimes:jpg,png,jpeg',
        'codigo'       => 'required|min:3|max:15',
        'quantidade'   => 'required|max:11',
        'material'     => 'required|min:3|max:120',
    ];
    
   
}
