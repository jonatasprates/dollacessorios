@extends('painel.templates.template')

@section('content')

<section class="destaques">
    <div class="container">
        <h3 class="text-center mg-40">Gestão de Produtos</h3>
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            
            @if( isset($errors) && count($errors) > 0 )
            <div class="alert alert-danger">
                @foreach( $errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
            @endif
            
            @if( isset($produto) )
                <form action="/painel/produto/editar/{{$produto->id}}" method="post" accept-charset="utf-8" class="form" role="form" enctype="multipart/form-data">  
            @else
                <form action="/painel/produto/cadastrar" method="post" accept-charset="utf-8" class="form" role="form" enctype="multipart/form-data">  
            @endif
                {{csrf_field()}}
                
                <select id="select" name="id_categoria" class="form-control input-lg" >
                     <option value="">Escolha a Categoria</option>
                 
                    @foreach( $categorias as $categoria )
                        <option value="{{$categoria->id}}"
                                @if( isset($produto->id_categoria) && $produto->id_categoria == $categoria->id )
                                    selected
                                @endif
                                >{{$categoria->categoria}}</option>
                    @endforeach
                
                </select>
               
                <input type="text" name="produto" value="{{$produto->produto or old('Produto')}}" class="form-control input-lg" placeholder="Produto" required/> 
               
                <input type="file" name="imagem" class="form-control input-lg">
                
                 <div class="row">
                    <div class="col-xs-6 col-md-6">
                        <input type="text" name="codigo" value="{{$produto->codigo or old('Código')}}" class="form-control input-lg" placeholder="Código" required />
                    </div>
                    <div class="col-xs-6 col-md-6">
                        <input type="text" name="quantidade" value="{{$produto->quantidade or old('Quantidade')}}" class="form-control input-lg" placeholder="Quantidade" required />
                    </div>
                    <div class="col-xs-6 col-md-6">
                        <input type="text" name="material" value="{{$produto->material or old('Material')}}" class="form-control input-lg" placeholder="Material" required />
                    </div>
                    <div class="col-xs-6 col-md-6">
                        <input type="text" name="peso" value="{{$produto->peso or old('Peso')}}" class="form-control input-lg" placeholder="Peso" required />
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block " type="submit" id="btn-padrao" style="margin-bottom:60px;">Cadastrar</button>
            </form>   
        </div>
    </div>    
</section>

@endsection