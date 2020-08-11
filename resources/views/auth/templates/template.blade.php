<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='initial-scale=1, maximum-scale=1'>
        <title>{{$titulo or 'Doll - Login'}} </title>
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

        <div class="container">
            
            @yield('content-form')
            
        </div>


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