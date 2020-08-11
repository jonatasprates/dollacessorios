@extends('painel.templates.template')

@section('content')

<section class="destaques">
    <div class="container">

        <h3 class="text-center mg-40">Gestão de Categorias</h3>

        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">

            @if( isset($errors) && count($errors) > 0 )
            <div class="alert alert-danger">
                @foreach( $errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
            @endif

            @if( isset($categoria) )
                <form action="/painel/categoria/editar/{{$categoria->id}}" method="post" accept-charset="utf-8" class="form" role="form">  
            @else
                <form action="/painel/categoria/cadastrar" method="post" accept-charset="utf-8" class="form" role="form">  
            @endif
                
                {{csrf_field()}}
                <input type="text" name="categoria" value="{{$categoria->categoria or old('Categoria')}}" class="form-control input-lg" placeholder="Categoria"/> 
                <button class="btn btn-lg btn-primary btn-block " type="submit" id="btn-padrao" style="margin-bottom:80px;">Cadastrar</button>
            </form>   
        </div>
    </div>    
</section>

@endsection