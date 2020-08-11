<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='initial-scale=1, maximum-scale=1'>
    <title>Doll - @yield('title') </title>
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
    
     @stack('scripts-top')

    <!--Basico -->
    <link rel="stylesheet" href="{{url('assets/site/css/style.css')}}">
    
    <!-- Font Awesome -->
    <link media="all" type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <![endif]-->
    
    <link rel="icon" type="image/png" href="imgs/favicon.png">
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
          <a class="navbar-brand logo" href="{{url('/')}}" > 
          <h2> Doll Acessórios </h2>
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{url('/')}}">Início</a></li>
            <li><a href="{{url('/quem-somos')}}">Quem Somos</a></li>
            <li><a href="{{url('/contato')}}">Contato</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  </nav>
</header>  

@yield('content')

<footer class="rodape">
    <div class="container">
        <div class="col-md-4 text-center">
            <h4>INFORMAÇÕES DE CONTATO</h4>
            <p><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i> Avênida Angêlo Ragassi, 146 - São José / SP</p>
            <p><i class="fa fa-mobile fa-lg" aria-hidden="true"></i> (16) 99732-2922</p>
            <p><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> contato@dollacessorios.com.br</p>
        </div>
        <div class="col-md-4 text-center">
            <h4>NEWSLETTER</h4>
            <p>Cadastre-se e receba nossas novidades</p>
            <form action="enviar-newsletter.php" method="post" class="form-contato">    
                <div class="form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
                <div class="form-group">
                    <input class="btn btn-success form-control" type="submit" id="btn-enviar" value="ASSINAR">    
                </div>
                
            </form>
        </div>
        <div class="col-md-4 text-center" style="margin-bottom:20px;">
            <h4>ACOMPANHA-NOS NO FACEBOOK</h4>
            <div class="fb-page" data-href="https://www.facebook.com/00001dollacessorios/?fref=ts"  data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/00001dollacessorios/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/00001dollacessorios/?fref=ts">Doll Acessórios</a></blockquote></div>
        </div>
    </div>
    <div class="rodape" style="background:#1f1e1e; padding:20px;">
        <p class="text-center">
            Desenvolvido por  <a href="www.tiws.com.br" style="color:#fff;">Agência Tiws</a>
        </p>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{url('assets/all/js/bootstrap.min.js')}}"></script>
@stack('scripts-bottom')
</body>
</html>