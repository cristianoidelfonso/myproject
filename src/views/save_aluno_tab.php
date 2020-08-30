<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<script src="assets/js/bootstrap.min.js"></script>

<main class="content">
    <?php
        requireValidSession();
        //renderTitle('Cadastro de aluno','Teste','icofont-check-alt');
        include(TEMPLATE_PATH . "/messages.php");
    ?>

    <div class="card">
        <form action="#" method="POST">
            <input type="hidden" name="codigo" value="<?= $codigo ?? null ?>">
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" 
                            href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Dados Pessoais</a>
                        
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" 
                            href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Contatos</a>
                        
                        <a class="nav-item nav-link" id="nav-matricula-tab" data-toggle="tab" 
                            href="#nav-matricula" role="tab" aria-controls="nav-matricula" aria-selected="false">Matrícula</a>
                        
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                        value="<?= $nome ?? '' ?>" required onblur="this.value = this.value.toUpperCase()">
                                    <div class="invalid-feedback">
                                        <?= $erros['nome'] ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Sexo</label>
                                    <select class="form-control" id="sexo" name="sexo" required>
                                        <option value=""></option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
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
                    
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <!-- Email, SenhaEmail, Telefone, Celular, Trabalha?, Profissão, TemComputador?, ConhecInformatica -->
                        <fieldset>
                            <legend hidden>Informações de Contato e Adicionais</legend>
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
                        <!-- Endereço -->
                        <fieldset>
                            <legend hidden>Endereço</legend>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Logradouro</label>
                                    <input type="text" id="logradouro" class="form-control" name="logradouro" placeholder="Logradouro"
                                    value="<?= $logradouro ?? '' ?>" required>
                                </div>
                                <div class="form-group col-md-2">
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
                                    value="<?= $estado ?? '' ?>" required maxlength="2" 
                                    onblur="this.value = this.value.toUpperCase()">
                                </div>    
                                <div class="form-group col-md-4">
                                    <label>cep</label>    
                                    <input type="text" id="cep" class="form-control" name="cep" placeholder="CEP"
                                    value="<?= $cep ?? '39.260-000' ?>">
                                </div>
                            </div>   
                        </fieldset>	
                    </div>

                    <div class="tab-pane fade" id="nav-matricula" role="tabpanel" aria-labelledby="nav-matricula-tab">
                        <!-- Matrícula -->
                        <fieldset>
                            <legend hidden>Matrícula</legend>
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
                    </div>

                </div><!-- fim da div-tab-content -->
            </div><!-- //fim div-card-body-->  
            <div class="card-footer">
                <a href="https://signup.live.com/signup?mkt=pt-BR&uaid=c793342671004b1bae8cd8fb240d3dc3&lic=1" 
                    class="btn btn-sm btn-outline-dark mt-2 mr-auto" target="_blank">Criar e-mail</a>
                <div class="buttons">
                    <button class="btn btn-primary btn-lg">Salvar</button>
                    <a href="/alunos_tab.php" class="btn btn-secondary btn-lg">Cancelar</a>
                </div><!-- // fim do div-buttons-->
            </div><!-- // fim do div-card-footer -->  
        </form><!-- // fim do form -->
    </div><!-- // fim do div-card -->
</main><!-- // fim do main-->
