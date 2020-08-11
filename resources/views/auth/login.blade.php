@extends('auth.templates.template')

@section('content-form')

<form class="form-login" id="form-login" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}

    <div class="form-login-heading">
        <a href="#" class="logo">
            <h3>Doll Acessórios</h3>
        </a>
    </div>

    <div class="login-wrap">
        
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif

            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Seu e-mail" autofocus="autofocus" >


        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <input id="password" type="password" class="form-control" name="password" placeholder="Sua Senha" >


        </div>

        <span class="pull-right">
            <a class="btn btn-link" href="{{ url('/password/reset') }}">Recuperar Senha?</a>
        </span>

        <div class="form-group">
            <button type="submit" class="btn btn-theme btn-block">
                <i class="fa fa-btn fa-sign-in"></i> Entrar
            </button>


        </div>
    </div>
</form>
@endsection
