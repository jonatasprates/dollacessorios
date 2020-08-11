@extends('painel.templates.template')

@section('content')
<section class="destaques">
    <div class="container">
        <h3 class="text-center mg-40">Listagem de Produtos</h3>
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <form class="navbar-form navbar-left" role="search" method="post" action="/painel/produto/pesquisar">
                {{csrf_field()}}
                
                <a href="{{url('/painel/produto/cadastrar')}}" class="btn btn-danger">
                <li class="fa fa-plus-circle"></li>
            </a>
                
                <div class="form-group">
                    <input type="text" name="pesquisar" placeholder="Pesquisar?" class="form-control">
                </div>
                    <button type="submit" class="btn btn-danger"> 
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 
                        Encontrar
                    </button>
                    
            </form>
            <table class="table table-striped custab">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Código</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Material</th>
                    <th class="text-center">Ação</th>
                </tr>
            </thead>
            
            @forelse( $produto as $produtos )
            
            <tr>
                <td>{{$produtos->categoria}}</td>
                <td>{{$produtos->codigo}}</td>
                <td>{{$produtos->produto}}</td>
                <td>{{$produtos->quantidade}}</td>
                <td>{{$produtos->material}}</td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="{{url("/painel/produto/editar/$produtos->id")}}">
                        <span class="glyphicon glyphicon-edit"></span> Alterar</a> 
                    <a href="{{url("/painel/produto/deletar/$produtos->id")}}" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-remove"></span> Excluir</a>
                </td>
            </tr>
            
            @empty
                <tr><td colspan="90">Não possui nenhum produto cadastrado</td></tr>
            @endforelse
            </table>
            
            {{$produto->links()}}
            
        </div>
    </div>    
</section>
@endsection