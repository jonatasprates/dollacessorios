<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Painel\Categoria;
use App\Model\Painel\Produto;
use Mail;
use Session;

class SiteController extends Controller
{
    
    protected $request, $categoria, $produto;
    
    public function __construct(Request $request, Categoria $categoria, Produto $produto) {
        $this->request   = $request;
        $this->categoria = $categoria;
        $this->produto   = $produto;
    }


    public function index()
    {   
        $categorias = $this->categoria->orderBy('categoria', 'ASC')->get();
        $produtos   = $this->produto->orderBy('created_at', 'DESC')->get();
        
        return view('site.home.index', compact('categorias', 'produtos'));
    }
    
    public function sobre()
    {
        return view('site.sobre.index');
    }
    
    public function contato()
    {
        return view('site.contato.index');
    }
    
   public function contatoEnviarEmail(Request $request)
   {
       //Pega todos os dados do formulário
        $dadosForm = $request->all();
        
    //Validação dos campos
        $validator = validator($dadosForm, 
          [
            'nome' => 'required',
            'email' => 'required',
            'assunto' => 'required',
            'mensagem' => 'required',
          ]
        );
        
        if( $validator->fails() )
        {
            return redirect('/contato')
                            ->withErrors($validator)
                            ->withInput();
        }
        
        //Passa dos dados para a view
        $send = Mail::send('includes.mail', $dadosForm, function ($message) 
        {
            $message->from('contato@tiws.com.br', 'Email Teste');

            $message->to('contato@escolati.com.br', 'Teste');
            $message->subject('Contato - Doll');
        
        });

        if( $send ){
            Session::flash('success', 'E-mail enviado com Sucesso!');
            return redirect('/contato');
        }
        else
            return redirect ('/contato')->withErrors(['errors' => 'Falha ao Enviar'])->withIpunt();

   }
   
   public function produtoCategoria($idCategoria)
   {
       //recupera a categoria
       $categoria = $this->categoria->find($idCategoria);
       
       //recupera as musicas desta categoria
       $produtos = $categoria->produtos()->get();
      
       //incluir menu lateral com as categorias
       $categorias = $this->categoria->orderBy('categoria', 'ASC')->get();
       
       return view('site.produto.index', compact('categoria', 'produtos', 'categorias'));
   }
   
   public function detalheProduto($idProduto)
   {
       //recupera o produto
       $produtos = $this->produto->where('id', $idProduto)->get();
       
       //incluir menu lateral com as categorias
       $categorias = $this->categoria->orderBy('categoria', 'ASC')->get();
       
       return view('site.produto.detalhe', compact('produtos', 'categorias'));
   }
   
   public function OrcamentoEnviarEmail(Request $request)
   {
       //Pega todos os dados do formulário
        $dadosForm = $request->all();
        
        //Passa dos dados para a view
        $send = Mail::send('includes.orcamento', $dadosForm, function ($message) 
        {
            $message->from('contato@tiws.com.br', 'Email Teste');

            $message->to('contato@escolati.com.br', 'Teste');
            $message->subject('Contato - Doll');
        
        });
        
   }
   
}