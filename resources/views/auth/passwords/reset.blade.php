@extends('auth.templates.template')

@section('content-form')
<form class="form-login" id="form-login" role="form" method="POST" action="{{ url('/password/reset') }}">
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

        @if ($errors->has('password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
        @endif

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" placeholder="Seu Nome" name="email" value="{{ $email or old('email') }}">
        </div>


        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" placeholder="Sua Senha" class="form-control" name="password">
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input id="password-confirm" type="password" placeholder="Confirmar Sua Senha" class="form-control" name="password_confirmation">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-theme btn-block">
                <i class="fa fa-btn fa-refresh"></i> Resetar Senha
            </button>
        </div>
    </div>
</form>
@endsection
