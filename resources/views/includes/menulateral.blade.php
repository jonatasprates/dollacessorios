<div class="col-lg-2 col-md-2">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#"><h4>Categorias</h4></a></li>
        
        @forelse( $categorias as $categoria )
            <li><a href="/categoria/{{$categoria->id}}">
                    {{$categoria->categoria}}</a>
            </li>
        @empty
            <li> Não existem categorias cadastrados</li>
        @endforelse
    </ul>
</div>