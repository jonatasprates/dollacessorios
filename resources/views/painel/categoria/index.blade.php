@extends('painel.templates.template')

@section('content')
<section class="destaques">
    <div class="container">
        <h3 class="text-center mg-40">Listagem de Categorias</h3>
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            
            
            
            <form class="navbar-form navbar-left" role="search" method="post" action="/painel/categoria/pesquisar">
                {{csrf_field()}}
                
                <a href="{{url('/painel/categoria/cadastrar')}}" class="btn btn-danger">
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
                    <th>Código</th>
                    <th>Categoria</th>
                    <th class="text-center">Ação</th>
                </tr>
            </thead>
            
            @forelse( $categorias as $categoria )
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->categoria }}</td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="{{url("/painel/categoria/editar/$categoria->id")}}">
                       <span class="glyphicon glyphicon-edit"></span> Alterar</a> 
                    <a href="{{url("/painel/categoria/deletar/$categoria->id")}}" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-remove"></span> Excluir</a>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="90">Não Existem Categorias Cadastrados</td>
                </tr>
            @endforelse
            </table>
            
            <nav>
                {{$categorias->links()}}
            </nav>  
        </div>
    </div>    
</section>
@endsection