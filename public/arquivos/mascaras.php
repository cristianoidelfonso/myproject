<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title>Mascara em JavaScript para campos numéricos</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/comum.css">
<script src="assets/js/mascara.js"></script>

<!-- Inclusão para abas css, js, ajax -->
<!-- link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Fim da inclusão para abas -->
</head>
<body>
<!-- Inicio abas -->
<div class="container">
	<h2>Dynamic Tabs</h2>
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
		<li><a data-toggle="tab" href="#menu1">Endereço</a></li>
		<li><a data-toggle="tab" href="#menu2">Matrícula</a></li>
		<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
	</ul>
	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			<h3>HOME</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
				labore et dolore magna aliqua.</p>
			<a href="" class="btn btn-default" style="margin-top: 100px;">Ir para Tab Home</a>	
		</div>
		<div id="menu1" class="tab-pane fade">
			<h3>Endereço</h3>
			<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex 
				ea commodo consequat.</p>
			<button class="btn btn-default" style="margin-top: 100px;">Ir para Tab Home</button>
		</div>
		<div id="menu2" class="tab-pane fade">
			<h3>Matrícula</h3>
			<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque 
				laudantium, totam rem aperiam.</p>
			<button class="btn btn-default" style="margin-top: 100px;">Ir para Tab Home</button>
		</div>
		<div id="menu3" class="tab-pane fade">
			<h3>Menu 3</h3>
			<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
			<button class="btn btn-default" style="margin-top: 100px;">Ir para Tab Home</button>
		</div>
	</div>
	<script>$('button').click(function(){ $('a[href="#home"]').tab('show');})</script> 
</div>
<!-- Fim abas -->
<div class="container">	
	<div class="well well-lg text-center">
		<h1>Máscara em JavaScript</h1>
		<h3>Para campos númericos, como Telefone, Celular, CPF, CNPJ, RG, etc...</h3>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h2 class="text-center">E X E M P L O S</h2>
			<form class="form-horizontal">
				<div class="form-group form-group">
					<label class="col-sm-4 control-label" for="formGroupInputSmall">CPF:</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" id="cpf" placeholder="000.000.000-00" 
						onkeyup="mascara('###.###.###-##',this,event,true)" maxlength="14">
					</div>
				</div>
				<div class="form-group form-group">
					<label class="col-sm-4 control-label" for="formGroupInputSmall">Telefone:</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" id="telefone" placeholder="(00) 0000-0000" 
						onkeyup="mascara('(##) ####-####',this,event,true)" maxlength="14">
					</div>
				</div>
				<div class="form-group form-group">
					<label class="col-sm-4 control-label" for="formGroupInputSmall">Celular:</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" id="celular" placeholder="(00)00000-0000" 
						onkeyup="mascara('(##)#####-####',this,event,true)" maxlength="14">
					</div>
				</div>
				<div class="form-group form-group">
					<label class="col-sm-4 control-label" for="formGroupInputSmall">RG:</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" id="rg" placeholder="00.000.000" 
						onkeyup="mascara('##.###.###',this,event,true)" maxlength="10">
					</div>
				</div>
				<div class="form-group form-group">
					<label class="col-sm-4 control-label" for="formGroupInputSmall">CNPJ:</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" id="cnpj" placeholder="##.###.###/####-##" 
						onkeyup="mascara('##.###.###/####-##',this,event,true)" maxlength="18">
					</div>
				</div>
				<div class="form-group form-group-sm text-center">
					<div class="col-sm-12">
						<button type="reset" type="button" class="btn btn-lg btn-danger" onclick="ResetCampos()">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Apagar
						</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<h2 class="text-center">Como usar?</h2>
			<p>Para usar é muito simples, basta adicionar o script "mascara.js" no head do seu Html.</p>
			<p>No campo do formlário inclua:</p>
			<div class="panel panel-default">
				<div class="panel-body text-center">
				<strong>onkeyup="mascara('(##)#####.####',this,event)"</strong>
				</div>
			</div>
			<p>Você pode formar as máscaras que quiser, onde aparece o caracter <strong>#</strong> será substituido pelo número digitado pelo usuário. Os outros símbolos aparecerão como você colocou nas máscara.</p>
			<p>Veja os exemplos!</p>
		</div>
	</div>
</div>
</body>
</html>