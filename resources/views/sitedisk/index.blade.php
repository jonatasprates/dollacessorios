<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="">

</head>
<body>
	
<div class="container">

<br>
	<form action="/disk/empresas" role="search" class="form col-md-6 " method="get">
	
			<input type="text" name="pesquisar" placeholder="Digite o nome, categoria ou produto" class="form-control">
			<br>
			<select name="id_cidade" class="form-control">
                <option value=""> Escolha  a Cidade </option>
                
                @foreach($cidades as $cidade)
                    <option value="{{$cidade->id}}"
                    @if( isset($cidade->id_cidade) && $cidade->id_cidade == $estilo->id )
                        selected
                    @endif
                    >{{$cidade->nome}}</option> 
                @endforeach
                
            </select>
				<br>
			<input type="submit" class="btn btn-primary btn-block" value="Entrar">

	</form>
</div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>