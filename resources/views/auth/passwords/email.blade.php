@extends('auth.templates.template')

<!-- Main Content -->
@section('content-form')

<form class="form-login" id="form-login" role="form" method="POST" action="{{ url('/password/email') }}">
    {{ csrf_field() }}

    <div class="form-login-heading">
        <a href="#" class="logo">
            <h3>Doll Acessórios</h3>
        </a>
    </div>

    <div class="login-wrap">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        
        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" placeholder="Seu E-mail" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-theme btn-block">
                <i class="fa fa-btn fa-envelope"></i> Enviar E-mail de Recuperação
            </button>
        </div>

    </div> 

</form>
@endsection
