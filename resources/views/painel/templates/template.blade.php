<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='initial-scale=1, maximum-scale=1'>
        <title>{{$title or 'Doll - Painel Administrativo'}} </title>
        <meta name='keywords' content='Tecnologia, Informação, Sites, Websites, Informatica, Responsivo, SEO, Blog, Manutenção'>
        <meta name='author' content='Tiws'>
        <meta name='description' content='Trabalhamos com Brincos (bijuterias) novos, vários tamanhos, modelos e tipos, para todos os gostos e feições femininas '>

        <!--Facebook-->
        <meta property='og:locale' content='pt_BR'>
        <meta property='og:type' content='article' />
        <meta property='og:url' content='http://www.dollacessorios.com.br/'>
        <meta property='og:title' content='Doll Acessorios'>
        <meta property='og:site_name' content='Doll Acessorios'>
        <meta property='og:description' content='Trabalhamos com Brincos (bijuterias) novos, vários tamanhos, modelos e tipos, para todos os gostos e feições femininas.'>


        <!--Bootstrap-->
        <link rel="stylesheet" href="{{url('assets/all/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/all/css/bootstrap-theme.min.css')}}">

        <!--Basico -->
        <link rel="stylesheet" href="{{url('assets/painel/css/style.css')}}">

        <!-- Font Awesome -->
        <link media="all" type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!--[if lt IE 9]>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
        <![endif]-->

        <link rel="icon" type="image/png" href="imgs/favicon.png">
    </head>
    <body>

        <header>  
            <nav class="navbar navbar-default">
                <div class="container-fluid container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand logo" href="{{url('/painel/')}}" > 
                            <h2> Doll Acessórios </h2>
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header> 

        <div class="col-lg-3 col-md-3">
            <div id="sidebar" class="well sidebar-nav">
                <h4><i class="glyphicon glyphicon-home"></i>
                    Categoria
                </h4>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{url('/painel/categoria/cadastrar')}}">Adicionar</a></li>
                    <li><a href="{{url('/painel/categorias')}}">Listar</a></li>
                </ul>
                <h4><i class="glyphicon glyphicon-user"></i>
                    Produto
                </h4>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{url('/painel/produto/cadastrar')}}">Adicionar</a></li>
                    <li><a href="{{url('/painel/produtos')}}">Listar</a></li>
                </ul>
            </div>
        </div>

        @yield('content')

        <div class="remote-nav">
            <div class="rodape">
                <ul id="nav-legal">
                    <li>
                        <span>Doll Acessórios</span> <em>© 2016</em> 
                    </li>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#" alt="Conheça mais sobre a empresa" title="Clique e conheça mais sobre à empresa EspecializaTi">À empresa</a>
                    </li>
                </ul>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="{{url('assets/all/js/bootstrap.min.js')}}"></script>
    </body>
</html>