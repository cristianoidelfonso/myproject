<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/print.png" type="image/x-icon">
    <title>Ficha de Matrícula</title>
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/print.css">
</head>

<body>    
    <header class="row header">
        <div class="col-3 img">
            <img src="assets/img/logo-oficial.png" alt="">
        </div> <!-- 25% -->
        <div class="col-8">
            <h4 style="margin-bottom: 0rem;"><u>UAITEC - Universidade Aberta e Intergrada de Minas Gerais<u></h4>
            <span>Polo Várzea da Palma - MG</span><br>
            <span>www.uaitec.mg.gov.br</span><br>
            <span>38 3731-1219</span>
        </div>
        <div class="col-1" hidden>

        </div> <!-- 25% -->
    </header>
    <main class="content">

        <p class="ficha">Ficha de matrícula do aluno</p>
        <!-- Stack the columns on mobile by making one full-width and the other half-width -->
        <div class="row">
            <div class="col-6">
                <label>Nome :</label><br>
                <input readonly type="text" id="nome"
                value="<?php if($aluno[0]->nome !== ''){echo $aluno[0]->nome;}else{echo '---';}?>">
            </div>
            <div class="col-2">
                <label>Data de nasc. :</label><br>
                <input readonly type="text"
                value="<?php if($aluno[0]->dataNasc !== ''){echo date('d/m/Y', strtotime($aluno[0]->dataNasc));}else{echo '---';} ?>">
            </div>
            <div class="col-2">
                <label>Sexo :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->sexo !== ''){echo $aluno[0]->sexo;}else{echo '---';} ?>">
            </div>
            <div class="col-2">
                <label>Raça :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->raca !== ''){echo $aluno[0]->raca;}else{echo '---';} ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <label>CPF :</label><br>
                <input readonly type="text" id="cpf"
                value="<?php if($aluno[0]->cpf !== ''){echo $aluno[0]->cpf;}else{echo '---';} ?>">
            </div>
            <div class="col-3">
                <label>Identidade :</label><br>
                <input readonly type="text" id="identidade" 
                value="<?php if($aluno[0]->identidade !== ''){echo $aluno[0]->identidade;}else{echo '---';} ?>">
            </div>
            <div class="col-6">
                <label>Cert. Nasc. :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->certNasc !== ''){echo $aluno[0]->certNasc;}else{echo '---';} ?>">
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <label>Naturalidade :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->naturalidade !== ''){echo $aluno[0]->naturalidade;}else{echo '---';} ?>">
            </div>
            <div class="col-6">
                <label>Escolaridade :</label><br><input readonly type="text"
                    value="<?php if($aluno[0]->escolaridade !== ''){echo $aluno[0]->escolaridade;}else{echo '---';} ?>">
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <label>Nome da mãe :</label><br> 
                <input readonly type="text" 
                value="<?php if($aluno[0]->nomeMae !== ''){echo $aluno[0]->nomeMae;}else{echo '---';} ?>">
            </div>
            <div class="col-6">
                <label>Nome do pai :</label><br> 
                <input readonly type="text" 
                value="<?php if($aluno[0]->nomePai !== ''){echo $aluno[0]->nomePai;}else{echo '---';} ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label>Portador de necessidades especiais:</label>
            </div>
            <div class="col-8">
                <input readonly type="text" 
                value="<?php if($aluno[0]->necessidadeEspecial !== ''){echo $aluno[0]->necessidadeEspecial;}else{echo '---';} ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <label>Logradouro :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->logradouro !== ''){echo $aluno[0]->logradouro;}else{echo '---';} ?>">
            </div>
            <div class="col-2">
                <label>Número :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->numero !== ''){echo $aluno[0]->numero;}else{echo '---';} ?>">
            </div>
            <div class="col-5">
                <label>Bairro :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->bairro !== ''){echo $aluno[0]->bairro;}else{echo '---';} ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <label>Cidade :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->cidade !== ''){echo $aluno[0]->cidade;}else{echo '---';} ?>">
            </div>
            <div class="col-2">
                <label>Estado :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->estado !== ''){echo $aluno[0]->estado;}else{echo '---';} ?>">
            </div>
            <div class="col-3">
                <label>Telefone :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->telefone !== ''){echo $aluno[0]->telefone;}else{echo '---';} ?>">
            </div>    
            <div class="col-3">
                <label>Celular :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->celular !== ''){echo $aluno[0]->celular;}else{echo '---';} ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <label>Trabalha :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->trabalha !== ''){echo $aluno[0]->trabalha;}else{echo '---';} ?>">
            </div>
            <div class="col-4">
                <label>Profissão :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->profissao !== ''){echo $aluno[0]->profissao;}else{echo '---';} ?>">
            </div>    
            <div class="col-6">
                <label>Curso :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->curso !== ''){echo $aluno[0]->curso;}else{echo '---';} ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <label>E-mail :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->email !== ''){echo $aluno[0]->email;}else{echo '---';} ?>">
            </div>
            <div class="col-3">
                <label>Senha :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->senha !== ''){echo $aluno[0]->senha;}else{echo '---';} ?>">
            </div>
            <div class="col-3">
                <label>Data Matrícula :</label><br>
                <input readonly type="text"
                value="<?php if($aluno[0]->dataMatricula !== ''){echo date('d/m/Y', strtotime($aluno[0]->dataMatricula));}else{echo '---';} ?>">
            </div>
        </div>

        <div class="row">   
            <div class="col-3">
                <label>Data Início :</label><br>
                <input readonly type="text"
                value="<?php if($aluno[0]->dataInicio !== ''){echo date('d/m/Y', strtotime($aluno[0]->dataInicio));}else{echo '---';} ?>">
            </div>
            <div class="col-3">
                <label>Dias da semana :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->dias !== ''){echo $aluno[0]->dias;}else{echo '---';} ?>">
            </div>
            <div class="col-3">
                <label>Horário :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->horario !== ''){echo $aluno[0]->horario;}else{echo '---';} ?>">
            </div>    
            <div class="col-3">
                <label>Sala :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->sala !== ''){echo $aluno[0]->sala;}else{echo '---';} ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <label>Responsável :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->responsavel !== ''){echo $aluno[0]->responsavel; }else{echo '---';} ?>">
            </div>
            <div class="col-2">
                <label>Vínculo :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->vinculo !== ''){echo $aluno[0]->vinculo; }else{echo '---';} ?>">
            </div>
            <div class="col-3">
                <label>CPF do Respon. :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->cpfResponsavel !== ''){echo $aluno[0]->cpfResponsavel;}else{echo '---';} ?>">
            </div>
            <div class="col-3">
                <label>RG do Respon. :</label><br>
                <input readonly type="text" 
                value="<?php if($aluno[0]->identidadeResponsavel !== ''){echo $aluno[0]->identidadeResponsavel; }else{echo '---'; } ?>">
            </div>
        </div>

        <div class="row anotation">
            <label>Anotações: </label>
        </div>

        <div class="row">            
            <div class="col-4">
                <label>Usuario responsável pelo cadastro :</label>
            </div>
            <div class="col-8">
                <input readonly type="text" 
                value="<?php if($aluno[0]->usuario !== ''){echo $aluno[0]->usuario; }else{echo '---';} ?>">
            </div>
        </div>
        
        
        <!--?php var_dump($aluno); ?-->
    
    </main>
    <footer class="footer">
        <div class="rodape">
            <span>Rua Dr.  Antonio Gomes Pinto Coelho, 1414 - Centro</span><br>
            <span>E-mail: varzeadapalma@uaitec.mg.gov.br</span><br>
            <span>Telefone: (38)3731-1219</span><br>
            <span><?= 'Data/hora desta impressão: ' . date('d/m/Y  -  H:m:s') ?></span>
        </div>
    </footer>
</body>

</html>
