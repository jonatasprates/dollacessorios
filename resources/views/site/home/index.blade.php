@extends('site.templates.template')

@section('title', 'Acessórios')

@section('content')

@include('includes.menulateral')

<section class="destaques">
    <div class="container" style="width: 100%">
        <div class="col-md-10">
        <h3 class="text-center mg-40">Destaques</h3>
        <div class="row">
            @forelse( $produtos as $produto )
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              
                <div class="thumbnail">
                    <img src="{{url("assets/uploads/imgs/produtos/{$produto->imagem}")}}" alt="{{$produto->produto}}" title="{{$produto->produto}}">
                  <div class="caption">
                    <h3 class="text-center">{{$produto->produto}}</h3>
                      <p><a href="{{url("/detalhes/produto/{$produto->id}")}}" class="btn btn-primary  btn-block" id="orcamento" role="button">Detalhes</a></p>
                  </div>
                </div>
          </div>
          @empty
           <p>Produto existem produtos cadastrado</p>
           @endforelse
        </div>
        </div>
    </div>
</section>
@endsection