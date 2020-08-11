<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Painel\Produto;
use App\Model\Painel\Categoria;

class ProdutoController extends Controller
{
    
    protected $request, $produto;
    
    public function __construct(Request $request, Produto $produto) 
    {
        $this->request   = $request;
        $this->produto   = $produto;
    }
    
   public function index()
   {
       $produto = $this->produto
                        ->join('categorias', 'categorias.id', '=', 'produtos.id_categoria')
                        ->select('produtos.*', 'categorias.categoria')
                        ->paginate(10);
       
       return view('painel.produto.index', compact('produto'));
   }
   
   public function cadastrar()
   {
       $categorias = Categoria::get();
       
       return view('painel.produto.cad-edit', compact('categorias'));
   }
   
   public function cadastrarProduto()
   {
       $dadosForm = $this->request->all();
       
       $validator = validator($dadosForm, $this->produto->rules);
       if($validator->fails())
       {
           return redirect('/painel/produto/cadastrar')
                        ->withErrors($validator)
                        ->withInput();
       }
       
       //Recupera o campo de Imagem
       $produto = $this->request->file('imagem');
       
       //Define o caminho
       $path = public_path('assets/uploads/imgs/produtos');
       
       //Define o nome da Imagem
       $nameProduct = date('YmdHms').'.'. $produto->getClientOriginalExtension();
       $dadosForm['imagem'] = $nameProduct;
       
       //Faz Upload da Imagem
       $upload = $produto->move($path, $nameProduct);
       
       if( !$upload )
       {
           return redirect('/painel/produto/cadastrar')
                        ->withErrors(['errors' => 'Falha ao fazer upload']);
       }
       
       //Faz o insert
       $inserir = $this->produto->create($dadosForm);
       
       if($inserir)
           return redirect('/painel/produtos');
       else
           return redirect('/painel/produto/cadastrar')
                        ->withErrors(['errors' => 'Falha ao Cadastrar'])
                        ->withInput();
   }
   
   //mostrar formulário para fazer alteração
    public function editar($id)
    {
        
        // Recupera as categorias
        $categorias = Categoria::get();
        
        // Recupera o produto pelo id
        $produto = $this->produto->find($id);
        
        return view('painel.produto.cad-edit', compact('categorias','produto'));
    }
    
    
    // editando a categoria cadastrada
    public function editarProduto($id)
    {   
        // Recupera os dados do formulário em form de Array
        $dadosForm = $this->request->all();
               
        //valida os dados antes de editar
        $validator = validator($dadosForm, $this->produto->rulesEdit);
        if( $validator->fails() )
        {
            return redirect("/painel/produto/editar/$id")
                            ->withErrors($validator)
                            ->withInput();
        }
        
         // Recupera sua produto pelo id
        $item = $this->produto->find($id);

        //Se existe o arquivo para o upload
        if( $this->request->hasFile('imagem') && $this->request->file('imagem')->isValid() )
        {
            //Recupera  o campo do Updade
            $imagem = $this->request->file("imagem");
            
            //Define o caminho
            $path = public_path('assets/uploads/imgs/produtos');
            
            //Define o nome da Imagem
            $nameProduct = $item->imagem;

            //Faz Upload da Imagem
            $upload = $imagem->move($path, $nameProduct);
            
            if( !$upload )
            {
                return redirect("/painel/produto/editar/{$id}")
                             ->withErrors(['errors' => 'Falha ao fazer upload']);
            }
            
            //Faz a edição da imagem
            $dadosForm['imagem'] = $item->imagem;
            $update = $item->update($dadosForm);
            
            if($update)
                return redirect ('/painel/produtos');
            else
                return redirect("/painel/produto/editar/{$id}")
                             ->withErrors(['errors' => 'Falha ao editar']);
            
        }
            
       
    }
    
    // Deletar categoria
    public function deletar($id)
    {
        // Recupera sua categoria pelo id
        $produto = $this->produto->find($id);
        
        //faz a exclusão do item
        $deletar = $produto->delete();
       
        return redirect ('/painel/produtos');
        
    }
    
    // Faz a pesquisa
    public function pesquisar()
    {
        $palavraPesquisa = $this->request->get('pesquisar');
        
        $produto = $this->produto
                        ->join('categorias', 'categorias.id', '=', 'produtos.id_categoria')
                        ->select('produtos.*', 'categorias.categoria')
                        ->where('produtos.produto', 'LIKE', "%$palavraPesquisa%")
                        ->orWhere('produtos.codigo', 'LIKE',"%$palavraPesquisa%")
                        ->paginate(10);
        
        return view('painel.produto.index', compact('produto'));
    }
   
   
}
