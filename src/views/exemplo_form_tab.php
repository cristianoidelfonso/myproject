<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<script src="assets/js/bootstrap.min.js"></script>

<main class="content">
	<?php
		renderTitle('Exemplo de paginação por abas bootstrap','Este é um exemplo!','');
	?>
	<div hidden>
		<h2>Dynamic Tabs</h2>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
			<li><a data-toggle="tab" href="#endereco">Endereço</a></li>
			<li><a data-toggle="tab" href="#matricula">Matrícula</a></li>
			<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
		</ul>
		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<h3>HOME</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
					labore et dolore magna aliqua.</p>
				<a href="" class="btn btn-default" style="margin-top: 100px;">Ir para Tab Home</a>	
			</div>
			<div id="endereco" class="tab-pane fade">
				<h3>Endereço</h3>
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex 
					ea commodo consequat.</p>
				<button class="btn btn-default" style="margin-top: 100px;">Ir para Tab Home</button>
			</div>
			<div id="matricula" class="tab-pane fade">
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

		<!-- ######################################################################### -->
	<div>
		<form action="#" method="POST">
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Home</a>
					<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
					<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
					<a class="nav-item nav-link" id="nav-contactX-tab" data-toggle="tab" href="#nav-contactX" role="tab" aria-controls="nav-contactX" aria-selected="false">Contact X</a>
				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
		
				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<h3 class="h5">Menu 1</h3>
					<input type="text" name="nome" id="nome" 
						value="<?= $_POST['nome'] ?? '' ?>" placeholder="Nome" required>
					<input type="email" name="email" id="email" 
						value="<?= $_POST['email'] ?? '' ?>" placeholder="email" required>
					<input type="password" name="password" id="password" 
						value="<?= $_POST['password'] ?? '' ?>" placeholder="Senha">
					<input type="date" name="dataNasc" id="dataNasc" 
						value="<?= $_POST['dataNasc'] ?? '' ?>" placeholder="Datade Nasc.">
					<a href="" class="btn btn-default btn-outline-light" style="margin-top: 100px;">Ir para Tab Home</a>	
				</div>
		
				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<h3 class="h5">Menu 2</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
						labore et dolore magna aliqua.</p>
					<input type="text" name="sobrenome" id="sobrenome" 
						value="<?= $_POST['sobrenome'] ?? '' ?>" placeholder="Sobrenome" required>
					<input type="number" name="idade" id="idade" 
						value="<?= $_POST['idade'] ?? '' ?>" placeholder="Idade" required>
					<a href="" class="btn btn-default btn-outline-light" style="margin-top: 100px;">Ir para Tab Home</a>	
				</div>
		
				<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
					<h3 class="h5">Menu 3</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
						labore et dolore magna aliqua.</p>
					<input type="text" name="escola" id="escola" 
					value="<?= $_POST['escola'] ?? '' ?>" placeholder="Escola" required>
					<input type="text" name="curso" id="curso" 
					value="<?= $_POST['curso'] ?? '' ?>" placeholder="Curso">
					<a href="" class="btn btn-default btn-outline-light" style="margin-top: 100px;">Ir para Tab Home</a>	
				</div>

				<div class="tab-pane fade" id="nav-contactX" role="tabpanel" aria-labelledby="nav-contactX-tab">
					<h3 class="h5">Menu 3</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
						labore et dolore magna aliqua.</p>
					<input type="text" name="escola" id="escola" 
					value="<?= $_POST['escola'] ?? '' ?>" placeholder="Escola" required>
					<input type="text" name="curso" id="curso" 
					value="<?= $_POST['curso'] ?? '' ?>" placeholder="Curso">
					<a href="" class="btn btn-default btn-outline-light" style="margin-top: 100px;">Ir para Tab Home</a>	
				</div>

			</div>
			<button class="btn btn-lg btn-outline-success">Enviar</button>
			<a href="limpar.php" class="btn btn-lg btn-outline-danger">Limpar</a>
		</form>
	</div>


	<?=  '<br><br><br>'. var_dump($_POST) .'<br><br><br>' ; ?>


	<div>
        <form action="#" method="POST">
            <input type="hidden" name="codigo" value="<?= $codigo ?? null ?>">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" 
                        href="#nav-home1" role="tab" aria-controls="nav-home1" aria-selected="false">Home1</a>
                    
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" 
                        href="#nav-profile1" role="tab" aria-controls="nav-profile1" aria-selected="false">Profile1</a>
                    
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" 
                        href="#nav-contact1" role="tab" aria-controls="nav-contact1" aria-selected="false">Contact1</a>
                    
                    <a class="nav-item nav-link" id="nav-matricula-tab" data-toggle="tab" 
                        href="#nav-matricula1" role="tab" aria-controls="nav-matricula1" aria-selected="false">Matrícula1</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                
                <div class="tab-pane fade show active" id="nav-home1" role="tabpanel" aria-labelledby="nav-home-tab">
                    <!-- Codigo, CPF, Identidade, CertNasc, Naturalidade -->
                    <fieldset>
                        <legend>Documentos</legend>
                        <div class="form-row">
                            <div class="form-group col-md-1">
                                <label>Código</label>
                                <input type="text" 
                                    class="form-control <?= isset($erros['codigo']) ? 'is-invalid' : '' ?>"
                                    id="codigo" name="codigo" placeholder="" readonly
                                    value="<?= $codigo ?? '' ?>">
                                <div class="invalid-feedback">
                                    <?= $erros['codigo'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>CPF</label>
                                <input type="text" 
                                    class="form-control <?= isset($erros['cpf']) ? 'is-invalid' : '' ?>"
                                    id="cpf" name="cpf" placeholder="000.000.000-00" autofocus required
                                    value="<?= $cpf ?? '' ?>" 
                                    onkeyup="mascara('###.###.###-##',this,event,true)" maxlength="14">
                                <div class="invalid-feedback">
                                    <?= $erros['cpf'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Identidade</label>
                                <input type="text"
                                    class="form-control <?= isset($erros['identidade']) ? 'is-invalid' : ''?>"
                                    id="identidade" name="identidade" placeholder="Identidade"
                                    value="<?= $identidade ?? '' ?>"
                                    onkeyup="mascara('##.###.###',this,event,true)" maxlength="10">
                                <div class="invalid-feedback">
                                    <?= $erros['identidade'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Certidão de Nascimento</label>
                                <input type="text"
                                    class="form-control <?= isset($erros['certNasc']) ? 'is-invalid' : ''?>"
                                    id="certNasc" name="certNasc" placeholder="Livro: ____  ; Folha: ____ ; Numero: _______ "
                                    value="<?= $certNasc ?? '' ?>">
                                <div class="invalid-feedback">
                                    <?= $erros['certNac'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Naturalidade</label>
                                <input type="text" 
                                    class="form-control <?= isset($erros['naturalidade']) ? 'is-invalid' : ''?>"
                                    id="naturalidade" name="naturalidade" placeholder="Cidade - UF" 
                                    value="<?= $naturalidade ?? '' ?>" required>
                                <div class="invalid-feedback">
                                    <?= $erros['naturalidade'] ?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Nome, Sexo, Raça, DataNasc, Escolaridade, Nome da Mãe, Nome do Pai e Necessidade Especial-->
                    <fieldset>
                        <legend>Informações Pessoais</legend>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nome</label>
                                <input type="text" 
                                    class="form-control <?= isset($erros['nome']) ? 'is-invalid' : ''?>"
                                    id="nome" name="nome" placeholder="Nome"
                                    value="<?= $nome ?? '' ?>" required>
                                <div class="invalid-feedback">
                                    <?= $erros['nome'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <label>Sexo</label>
                                <select class="form-control" id="sexo" name="sexo" required>
                                    <option value=""></option>
                                    <option value="M">Masc</option>
                                    <option value="F">Fem</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $erros['sexo'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Raça</label>
                                <select class="form-control" id="raca" name="raca">
                                    <option value=""></option>
                                    <option value="Branco">Branco</option>
                                    <option value="Pardo">Pardo</option>
                                    <option value="Negro">Negro</option>
                                    <option value="Indígena">Indígena</option>
                                    <option value="Amarelo">Amarelo</option>
                                    <option value="Outro">Outro</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $erros['raca'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Data de Nasc.</label>
                                <input type="date"
                                    class="form-control <?= isset($erros['dataNasc']) ? 'is-invalid' : ''?>"
                                    id="dataNasc" name="dataNasc"
                                    value="<?= $dataNasc ?? '' ?>" required onblur="getMenorIdade(getIdadeJS(this.value))">
                                <div class="invalid-feedback">
                                    <?= $erros['dataNasc'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Escolaridade</label>
                                <select class="form-control" id="escolaridade" name="escolaridade" required>
                                    <option value=""></option>
                                    <option>Ensino elementar</option>
                                    <option>Ensino fundamental incompleto</option>
                                    <option>Ensino fundamental completo</option>
                                    <option>Ensino médio incompleto</option>
                                    <option SELECTED>Ensino médio completo</option>
                                    <option>Ensino superior incompleto</option>
                                    <option>Ensino superior completo</option>
                                    <option>Ensino mestrado</option>
                                    <option>Ensino doutorado</option>
                                </select>    
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nome da mãe</label>
                                <input type="text" 
                                    class="form-control <?= isset($erros['nomeMae']) ? 'is-invalid' : ''?>"
                                    id="nomeMae" name="nomeMae" placeholder="Nome da mãe"
                                    value="<?= $nomeMae ?? '' ?>" required>
                                <div class="invalid-feedback">
                                    <?= $erros['nomeMae'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nome do pai</label>
                                <input type="text" 
                                    class="form-control <?= isset($erros['nomePai']) ? 'is-invalid' : ''?>"
                                    id="nomePai" name="nomePai" placeholder="Nome do pai"
                                    value="<?= $nomePai ?? '' ?>">
                                <div class="invalid-feedback">
                                    <?= $erros['nomePai'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Necessidade especial</label>
                                <input type="text" 
                                    class="form-control <?= isset($erros['necessidadeEspecial']) ? 'is-invalid' : ''?>"
                                    id="necessidadeEspecial" name="necessidadeEspecial" placeholder="Necessidade Especial"
                                    value="<?= $necessidadeEspecial ?? 'Não' ?>">
                                <div class="invalid-feedback">
                                    <?= $erros['necessidadeEspecial'] ?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Email, SenhaEmail, Telefone, Celular, Trabalha?, Profissão, TemComputador?, ConhecInformatica -->
                    <fieldset>
                        <legend>Informações de Contato e Adicionais</legend>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>E-mail</label>
                                <input type="email"
                                    class="form-control <?= isset($erros['email']) ? 'is-invalid' : ''?>"
                                    id="email" name="email" placeholder="E-mail" 
                                    value="<?= $email ?? '' ?>" required>
                                <div class="invalid-feedback">
                                    <?= $erros['email'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Senha</label>
                                <input type="senha"
                                    class="form-control <?= isset($erros['senha']) ? 'is-invalid' : ''?>"
                                    id="senha" name="senha" placeholder="Senha"
                                    value="<?= $senha ?? '' ?>" required>
                                <div class="invalid-feedback">
                                    <?= $erros['senha'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Telefone fixo</label>
                                <input type="text" 
                                    class="form-control <?= isset($erros['telefone']) ? 'is-invalid' : ''?>"
                                    id="telefone" name="telefone" placeholder="(00)0000-0000"
                                    value="<?= $telefone ?? '' ?>"
                                    onkeyup="mascara('(##) ####-####',this,event,true)" maxlength="14">
                                <div class="invalid-feedback">
                                    <?= $erros['telefone'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Celular</label>
                                <input type="text" 
                                    class="form-control <?= isset($erros['celular']) ? 'is-invalid' : ''?>"
                                    id="celular" name="celular" placeholder="(00) 9 0000-0000"
                                    value="<?= $celular ?? '' ?>"
                                    onkeyup="mascara('(##)#####-####',this,event,true)" maxlength="14">
                                <div class="invalid-feedback">
                                    <?= $erros['celular'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="trabalha">Trabalha ?</label>
                                <div class="form-control" id="trabalha" name="trabalha">
                                    <input type="radio" class="" name="trabalha" value="Sim"><span>Sim</span>
                                    <input type="radio" class="" name="trabalha" value="Não" CHECKED><span>Não</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Profissão</label>
                                <input type="text"
                                    class="form-control <?= isset($erros['profissao']) ? 'is-invalid' : ''?>"
                                    id="profissao" name="profissao" placeholder="Profissão"
                                    value="<?= $profissao ?? '' ?>" required>
                                <div class="invalid-feedback">
                                    <?= $erros['profissao'] ?>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Conhecimento em Informática</label>
                                <select class="form-control <?= isset($erros['conhecInfor']) ? 'is-invalid' : ''?>"
                                    id="conhecInfor" name="conhecInfor"
                                    value="<?= $conhecInfor ?? '' ?>" required>
                                    <option value=""></option>
                                    <option value="Sem Conhecimento">Sem Conhecimento</option>
                                    <option value="Básico">Básico</option>
                                    <option value="Intermediário">Intermediário</option>
                                    <option value="Avançado" SELECTED>Avançado</option>   
                                </select>   
                            </div>
                            <div class="form-group col-md-2">
                                <label for="possuiPC">Possui computador ?</label>
                                <div class="form-control" id="possuiPC" name="possuiPC">
                                    <input type="radio" class="" name="possuiPC" value="Sim" CHECKED><span>Sim</span>
                                    <input type="radio" class="" name="possuiPC" value="Não"><span>Não</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>	
                </div>
                
                <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <!-- responsavel vinculo cpfResponsavel identidadeResponsavel -->
                    <fieldset>
                        <legend>Responsável Legal</legend>
                        <div class="form-row">
                            <div class="form-group col-md-1">
                                <label>Menor de Idade</label>
                                <input type="checkbox" id="menorIdade" class="" name="menorIdade"
                                <?=  $idade ?>>
                            </div>
                            <div class="form-group col-md-5">
                                <label>Nome do responsável</label>
                                <input type="text" id="responsavel" class="form-control" name="responsavel" 
                                placeholder=" Nome do Responsável Legal"
                                value="<?= $responsavel ?? '' ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Tipo de vínculo</label>
                                <input type="text" id="vinculo" class="form-control" name="vinculo" 
                                placeholder="Vínculo"
                                value="<?= $vinculo ?? '' ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label>CPF do responsável</label>
                                <input type="text" id="cpfResponsavel" class="form-control" name="cpfResponsavel" 
                                placeholder="CPF do Responsável"
                                value="<?= $cpfResponsavel ?? '' ?>"
                                onkeyup="mascara('###.###.###-##',this,event,true)" maxlength="14">
                            </div>
                            <div class="form-group col-md-2">
                                <label>ID do responsável</label>
                                <input type="text" id="identidadeResponsavel" class="form-control" name="identidadeResponsavel" placeholder="ID do Responsável"
                                value="<?= $identidadeResponsavel ?? '' ?>"
                                onkeyup="mascara('##.###.###',this,event,true)" maxlength="10">
                            </div>
                        </div>
                    </fieldset>	
                </div>
                
                <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <!-- Endereço -->
                    <fieldset>
                        <legend>Endereço</legend>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label>Logradouro</label>
                                <input type="text" id="logradouro" class="form-control" name="logradouro" placeholder="Logradouro"
                                value="<?= $logradouro ?? '' ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Numero</label>
                                <input type="text" id="numero" class="form-control" name="numero" placeholder="Número"
                                value="<?= $numero ?? '' ?>">
                            </div>
                            <div class="form-group col-md-4">
                            <label>Bairro</label>
                                <input type="text" id="bairro" class="form-control" name="bairro" placeholder="Bairro"
                                value="<?= $bairro ?? '' ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label>Cidade</label>
                                <input type="text" id="cidade" class="form-control" name="cidade" placeholder="Cidade"
                                value="<?= $cidade ?? '' ?>" required>
                            </div>   
                            <div class="form-group col-md-3">
                                <label>Estado</label>    
                                <input type="text" id="estado" class="form-control" name="estado" placeholder="Estado"
                                value="<?= $estado ?? '' ?>" required>
                            </div>    
                            <div class="form-group col-md-4">
                                <label>cep</label>    
                                <input type="text" id="cep" class="form-control" name="cep" placeholder="CEP"
                                value="<?= $cep ?? '39.260-000' ?>">
                            </div>
                        </div>   
                    </fieldset>	
                </div>

                <div class="tab-pane fade" id="nav-matricula1" role="tabpanel" aria-labelledby="nav-matricula-tab">
                    <!-- Matrícula -->
                    <fieldset>
                        <legend>Matrícula</legend>
                        <div class="form-row">
                            <div class="form-group col-md-5 <?= isset($erros['curso']) ? 'is-invalid' : ''?>">
                                <label>Curso</label>
                                <select id="curso" class="form-control" name="curso" 
                                    value="<?= $curso ?? '' ?>" required>
                                    <option value="">Selecione o curso</option>
                                    <?php 
                                        $cursos = DATABASE::getResultFromQuery('SELECT * FROM curso');
                                        foreach($cursos as $curso){
                                            echo "<option 
                                            value='{$curso['codigo']} - {$curso['nomeCurso']} - {$curso['cargaHoraria']} hs'>
                                            {$curso['codigo']} - 
                                            {$curso['nomeCurso']}  -  
                                            {$curso['cargaHoraria']} hs
                                            </option>";
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Dias da semana</label>
                                <input type="text" id="dias" class="form-control" name="dias" 
                                value="<?= $dias ?? '' ?>" required>
                            </div>    
                            <div class="form-group col-md-2">
                                <label>Data de matrícula</label>
                                <input type="date" id="dataMatricula" class="form-control" name="dataMatricula"
                                value="<?= $dataMatricula ?? date('Y-m-d') ?>" readonly>
                            </div>    
                            <div class="form-group col-md-2">
                                <label>Previsão de início</label>    
                                <input type="date" id="dataInicio" class="form-control" name="dataInicio"
                                value="<?= $dataInicio ?? date('Y-m-d',strtotime("+1 day")) ?>">
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Horário</label>    
                                <select id="horario" class="form-control" name="horario" required>
                                    <option value="">Selecione o horário</option>
                                    <?php 
                                        $horarios = DATABASE::getResultFromQuery('SELECT * FROM horario');
                                        foreach($horarios as $horario){
                                            echo "<option value='{$horario['horario']}'>{$horario['horario']}</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sala</label>
                                <select id="sala" class="form-control" name="sala" required>
                                    <option value="">Selecione a sala</option>
                                    <option value="Inclusão Digital 01">Inclusão Digital 01</option>
                                    <option value="Inclusão Digital 02">Inclusão Digital 02</option>
                                    <option value="Inclusão Digital 03">Inclusão Digital 03</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Usuário responsavel pelo cadastro -->
                    <fieldset>    
                        <legend>Funcionário responsável pelo cadastro</legend>
                        <div class="form-group">
                            <input type="text" id="usuario" class="form-control" name="usuario"
                                value="<?= $_SESSION['user']->nome ?>" readonly>
                        </div>
                    </fieldset>   
                    <a href="" class="btn btn-default btn-outline-light" style="margin-top: 100px;">Ir para Tab Home</a>	
                </div>

            </div><!-- fim da div-tab-content -->
            <button class="btn btn-primary btn-lg">Salvar</button>
            <a href="/alunos_tab.php" class="btn btn-secondary btn-lg">Cancelar</a>
        </form><!-- fim do form -->
    </div>

</main>
