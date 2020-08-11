@extends('site.templates.template')

@section('title', 'Contato')

@section('content')
<section class="destaques">
    <div class="container">
        <h3 class="text-center">CONTATO</h2>
        <div class="divider"></div>
            <p class="text-center">
               Preencha este formulário e entre em contato conosco.
            </p>
            <div class="col-sm-8 col-xs-12">
                
                @if (isset($success))
                    <div class="alert alert-success">
                        {{$success }}
                    </div>
                @endif
                
                @if( Session::has('success') )
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                
                @if( isset($errors) && count($errors) > 0 )
                <div class="alert alert-danger">
                    @foreach( $errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                </div>
                @endif
                
                <form class="form-horizontal form-contato" name="contato" id="formulario" role="form" method="post" action="{{url('/contato')}}">
                  
                    {{csrf_field()}}
                    
                    <div class="form-group">
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nome" placeholder="Nome" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10"> 
                      <input type="email" class="form-control" name="email" placeholder="Email" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10"> 
                      <input type="text" class="form-control" name="assunto" placeholder="Assunto" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10"> 
                      <textarea name="mensagem" class="form-control input-pd" rows="5" placeholder="Mensagem" ></textarea>
                    </div>
                  </div>

                  <div class="form-group"> 
                    <div class="col-xs-12 ">
                        <input type="submit" class="btn btn-default" id="btn-enviar" value="Enviar">
                    </div>
                  </div>
                </form>
            </div>
    </div>
</section>
@endsection