<?php

namespace App\Http\Controllers\Painel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Painel\Categoria;

class CategoriaController extends Controller
{
    
    protected $request, $categoria;
    
    public function __construct(Request $request, Categoria $categoria) 
    {
        $this->request   = $request;
        $this->categoria = $categoria;
    }



    // Listagem de categorias
    public function index()
    {
        
        //recupera todas as categorias cadastradas
        $categorias = $this->categoria->paginate(10);
        
        return view('painel.categoria.index', compact('categorias'));
    }
    
    // Exibe o formulário na tela
    public function cadastrar()
    {
        return view('painel.categoria.cad-edit');
    }
    
    // Cadastrando e validando a categoria 
    public function cadastrarCategoria()
    {
        $dadosForm = $this->request->all();
        
        $validator = validator($dadosForm, $this->categoria->rules);
        
        if( $validator->fails() )
        {
            return redirect('/painel/categoria/cadastrar')
                            ->withErrors($validator)
                            ->withInput();
        }
        
        $insert = $this->categoria->create($dadosForm);
        
        if( $insert )
            return redirect ('/painel/categorias');
        else
            return redirect('/painel/categoria/cadastrar')
                            ->withErrors(['errors' => 'Falha ao Cadastrar'])
                            ->withInput();
        
    }
    
    
    //mostrar formulário para fazer alteração
    public function editar($id)
    {
        // Recupera sua categoria pelo id
        $categoria = $this->categoria->find($id);
        
        return view('painel.categoria.cad-edit', compact('categoria'));
    }
    
    
    // editando a categoria cadastrada
    public function editarCategoria($id)
    {   
        // Recupera os dados do formulário em form de Array
        $dadosForm = $this->request->all();
               
        //valida os dados antes de editar
        $validator = validator($dadosForm, $this->categoria->rules);
        if( $validator->fails() )
        {
            return redirect("/painel/categoria/editar/$id")
                            ->withErrors($validator)
                            ->withInput();
        }
        
         // Recupera sua categoria pelo id
        $categoria = $this->categoria->find($id);
       
        //faz a edição do item
        $updade = $categoria->update($dadosForm);
        
        if( $updade )
            return redirect ('/painel/categorias');
        else
            return redirect("/painel/categoria/editar/$id")
                            ->withErrors(['errors' => 'Falha ao Editar'])
                            ->withInput();
       
    }
    
    // Deletar categoria
    public function deletar($id)
    {
        // Recupera sua categoria pelo id
        $categoria = $this->categoria->find($id);
        
        //faz a exclusão do item
        $deletar = $categoria->delete();
       
        return redirect ('/painel/categorias');
        
    }
    
    // Faz a pesquisa
    public function pesquisar()
    {
        $palavraPesquisa = $this->request->get('pesquisar');
        
        $categorias = $this->categoria
                        ->where('categoria', 'LIKE', "%$palavraPesquisa%")
                        ->orWhere('id', 'LIKE',"%$palavraPesquisa%")->paginate(10);
        
        return view('painel.categoria.index', compact('categorias'));
    }
    
}
