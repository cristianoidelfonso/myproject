<main class="content">
    <?php
        requireValidSession();
        // renderTitle('Cadastro de Alunos', 'Mantenha os dados dos alunos atualizados', 'icofont-group-students');

        include(TEMPLATE_PATH . "/messages.php");   
    ?>
    <div class="card">
        <form action="#" method="post" accept-charset="utf-8">
            <input type="hidden" name="codigo" value="<?= $codigo ?? null ?>">
            <div class="card-body">
                <!-- Codigo, CPF, Identidade, CertNasc, Naturalidade -->
                <fieldset>
                    <legend>Documentos</legend>
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label hidden>Código</label>
                            <input type="text" class="form-control <?= isset($erros['codigo']) ? 'is-invalid' : '' ?>" id="codigo" name="codigo" placeholder="" readonly value="<?= $codigo ?? null ?>">
                            <div class="invalid-feedback">
                                <?= $erros['codigo'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label hidden>CPF</label>
                            <input type="text" class="form-control <?= isset($erros['cpf']) ? 'is-invalid' : '' ?>" 
                            id="cpf" name="cpf" placeholder="CPF" value="<?= $cpf ?? '' ?>" required
                            onkeyup="mascara('###.###.###-##',this,event,true)" maxlength="14"
                            onblur="teste();" <?php if(isset($_REQUEST['update'])){ echo 'readonly';} ?> >
                            <div class="invalid-feedback">
                                <?= $erros['cpf'] ?>
                            </div>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-2">
                            <label hidden>Identidade</label>
                            <input type="text" class="form-control <?= isset($erros['identidade']) ? 'is-invalid' : '' ?>" id="identidade" name="identidade" placeholder="Identidade" value="<?= $identidade ?? '' ?>" onkeyup="mascara('##.###.###',this,event,true)" maxlength="10">
                            <div class="invalid-feedback">
                                <?= $erros['identidade'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label hidden>Certidão de Nascimento</label>
                            <input type="text" class="form-control <?= isset($erros['certNasc']) ? 'is-invalid' : '' ?>" id="certNasc" name="certNasc" placeholder="Livro: ____  ; Folha: ____ ; Numero: _______ " value="<?= $certNasc ?? '' ?>">
                            <div class="invalid-feedback">
                                <?= $erros['certNac'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label hidden>Naturalidade</label>
                            <input type="text" class="form-control <?= isset($erros['naturalidade']) ? 'is-invalid' : '' ?>" id="naturalidade" name="naturalidade" placeholder="Cidade - UF" value="<?= $naturalidade ?? '' ?>" required>
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
                            <label hidden>Nome</label>
                            <input type="text" class="form-control <?= isset($erros['nome']) ? 'is-invalid' : '' ?>" id="nome" name="nome" placeholder="Nome" value="<?= $nome ?? '' ?>" required onblur="this.value = this.value.toUpperCase()">
                            <div class="invalid-feedback">
                                <?= $erros['nome'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label hidden>Sexo</label>
                            <select class="form-control" id="sexo" name="sexo" required>
                                <option value="">Sexo</option>
                                <option value="Masculino" <?= (isset($sexo) ? ($sexo === 'Masculino' ? 'SELECTED' : '') : '') ?>>Masculino</option>
                                <option value="Feminino" <?= (isset($sexo) ? ($sexo === 'Feminino' ? 'SELECTED' : '') : '') ?>>Feminino</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $erros['sexo'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label hidden>Raça</label>
                            <select class="form-control" id="raca" name="raca" required>
                                <option value="">Raça</option>
                                <option value="Branco" <?= (isset($raca) ? ($raca === 'Branco' ? 'SELECTED' : '') : '') ?>>Branco</option>
                                <option value="Pardo" <?= (isset($raca) ? ($raca === 'Pardo' ? 'SELECTED' : '') : '') ?>>Pardo</option>
                                <option value="Negro" <?= (isset($raca) ? ($raca === 'Negro' ? 'SELECTED' : '') : '') ?>>Negro</option>
                                <option value="Amarelo" <?= (isset($raca) ? ($raca === 'Amarelo' ? 'SELECTED' : '') : '') ?>>Amarelo</option>
                                <option value="Indígena" <?= (isset($raca) ? ($raca === 'Indígena' ? 'SELECTED' : '') : '') ?>>Indígena</option>
                                <option value="Outro" <?= (isset($raca) ? ($raca === 'Outro' ? 'SELECTED' : '') : '') ?>>Outro</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $erros['raca'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label hidden>Data de Nasc.</label>
                            <input type="date" class="form-control <?= isset($erros['dataNasc']) ? 'is-invalid' : '' ?>" id="dataNasc" name="dataNasc" value="<?= $dataNasc ?? '' ?>" required onblur="getMenorIdade(getIdadeJS(this.value))">
                            <div class="invalid-feedback">
                                <?= $erros['dataNasc'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label hidden>Escolaridade</label>
                            <select class="form-control" id="escolaridade" name="escolaridade" required>
                                <option value="">Escolaridade</option>
                                <option value="Fundamental incompleto" <?= (isset($escolaridade) ? ($escolaridade === 'Fundamental incompleto' ? 'SELECTED' : '') : '') ?>>Fund. incompleto</option>
                                <option value="Fundamental completo" <?= (isset($escolaridade) ? ($escolaridade === 'Fundamental completo' ? 'SELECTED' : '') : '') ?>>Fund. completo</option>
                                <option value="Médio incompleto" <?= (isset($escolaridade) ? ($escolaridade === 'Médio incompleto' ? 'SELECTED' : '') : '') ?>>Médio incompleto</option>
                                <option value="Médio completo" <?= (isset($escolaridade) ? ($escolaridade === 'Médio completo' ? 'SELECTED' : '') : '') ?>>Médio completo</option>
                                <option value="Superior incompleto" <?= (isset($escolaridade) ? ($escolaridade === 'Superior incompleto' ? 'SELECTED' : '') : '') ?>>Sup. incompleto</option>
                                <option value="Superior completo" <?= (isset($escolaridade) ? ($escolaridade === 'Superior completo' ? 'SELECTED' : '') : '') ?>>Sup. completo</option>
                                <option value="Mestrado" <?= (isset($escolaridade) ? ($escolaridade === 'Mestrado' ? 'SELECTED' : '') : '') ?>>Mestrado</option>
                                <option value="Doutorado" <?= (isset($escolaridade) ? ($escolaridade === 'Doutorado' ? 'SELECTED' : '') : '') ?>>Doutorado</option>
                            </select>
                        </div>
                    </div>
                    <!-- Nome da mãe, Nome do pai e Necessidade especial -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label hidden>Nome da mãe</label>
                            <input type="text" class="form-control 
                                <?= isset($erros['nomeMae']) ? 'is-invalid' : '' ?>" 
                                id="nomeMae" name="nomeMae" placeholder="Nome da mãe" 
                                value="<?= $nomeMae ?? '' ?>" required>
                            <div class="invalid-feedback">
                                <?= $erros['nomeMae'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label hidden>Nome do pai</label>
                            <input type="text" class="form-control <?= isset($erros['nomePai']) ? 'is-invalid' : '' ?>" id="nomePai" name="nomePai" placeholder="Nome do pai" value="<?= $nomePai ?? '' ?>">
                            <div class="invalid-feedback">
                                <?= $erros['nomePai'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label hidden>Necessidade especial</label>
                            <input type="text" class="form-control <?= isset($erros['necessidadeEspecial']) ? 'is-invalid' : '' ?>" 
                            id="necessidadeEspecial" name="necessidadeEspecial" placeholder="Necessidade Especial ? Cite." 
                            value="<?= $necessidadeEspecial ?? '' ?>">
                            <div class="invalid-feedback">
                                <?= $erros['necessidadeEspecial'] ?>
                            </div>
                        </div>
                    </div>
                    <!-- responsavel vinculo cpfResponsavel identidadeResponsavel -->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>
                                <input type="checkbox" id="menorIdade" class="" name="menorIdade" <?= $idade ?>>&ensp;Menor de Idade</label>
                        </div>
                        <div class="form-group col-md-4">
                            <label hidden>Nome do responsável</label>
                            <input type="text" id="responsavel" class="form-control" name="responsavel" placeholder=" Nome do Responsável Legal" value="<?= $responsavel ?? '' ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label hidden>Tipo de vínculo</label>
                            <input type="text" id="vinculo" class="form-control" name="vinculo" placeholder="Vínculo" value="<?= $vinculo ?? '' ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label hidden>CPF do responsável</label>
                            <input type="text" id="cpfResponsavel" class="form-control" name="cpfResponsavel" placeholder="CPF do Respon." value="<?= $cpfResponsavel ?? '' ?>" onkeyup="mascara('###.###.###-##',this,event,true)" maxlength="14">
                        </div>
                        <div class="form-group col-md-2">
                            <label hidden>RG do responsável</label>
                            <input type="text" id="identidadeResponsavel" class="form-control" name="identidadeResponsavel" placeholder="RG do Respon." value="<?= $identidadeResponsavel ?? '' ?>" onkeyup="mascara('##.###.###',this,event,true)" maxlength="10">
                        </div>
                    </div>
                </fieldset>
                <!-- Email, SenhaEmail, Telefone, Celular, Trabalha?, Profissão, TemComputador?, ConhecInformatica -->
                <fieldset>
                    <legend>Informações de Contato e Adicionais</legend>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label hidden>E-mail</label>
                            <input type="email" class="form-control <?= isset($erros['email']) ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="E-mail" value="<?= $email ?? '' ?>" required>
                            <div class="invalid-feedback">
                                <?= $erros['email'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label hidden>Senha</label>
                            <input type="senha" class="form-control <?= isset($erros['senha']) ? 'is-invalid' : '' ?>" id="senha" name="senha" placeholder="Senha" value="<?= $senha ?? '' ?>" required>
                            <div class="invalid-feedback">
                                <?= $erros['senha'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label hidden>Telefone fixo</label>
                            <input type="text" class="form-control <?= isset($erros['telefone']) ? 'is-invalid' : '' ?>" id="telefone" name="telefone" placeholder="Tel. fixo: (00)0000-0000" value="<?= $telefone ?? '' ?>" onkeyup="mascara('(##) ####-####',this,event,true)" maxlength="14">
                            <div class="invalid-feedback">
                                <?= $erros['telefone'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label hidden>Celular</label>
                            <input type="text" class="form-control <?= isset($erros['celular']) ? 'is-invalid' : '' ?>" id="celular" name="celular" placeholder=" Celular: (00) 9 0000-0000" value="<?= $celular ?? '' ?>" onkeyup="mascara('(##)#####-####',this,event,true)" maxlength="14">
                            <div class="invalid-feedback">
                                <?= $erros['celular'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label hidden>Profissão</label>
                            <input type="text" class="form-control <?= isset($erros['profissao']) ? 'is-invalid' : '' ?>" id="profissao" name="profissao" placeholder="Profissão" value="<?= $profissao ?? '' ?>" required>
                            <div class="invalid-feedback">
                                <?= $erros['profissao'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label hidden>Conhecimento em Informática</label>
                            <select class="form-control <?= isset($erros['conhecInfor']) ? 'is-invalid' : '' ?>" id="conhecInfor" name="conhecInfor" value="<?= $conhecInfor ?? '' ?>" required>
                                <option value="">Conhecimento em Infor. ?</option>
                                <option value="Sem Conhecimento" <?= (isset($conhecInfor) ? ($conhecInfor === 'Sem Conhecimento' ? 'SELECTED' : '') : '') ?>>Sem Conhecimento</option>
                                <option value="Básico" <?= (isset($conhecInfor) ? ($conhecInfor === 'Básico' ? 'SELECTED' : '') : '') ?>>Básico</option>
                                <option value="Intermediário" <?= (isset($conhecInfor) ? ($conhecInfor === 'Intermediário' ? 'SELECTED' : '') : '') ?>>Intermediário</option>
                                <option value="Avançado" <?= (isset($conhecInfor) ? ($conhecInfor === 'Avançado' ? 'SELECTED' : '') : '') ?>>Avançado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <select class="form-control" name="possuiPC" id="possuiPC" required>
                                <option value="">Tem computador ?</option>
                                <option value="Sim" <?= (isset($possuiPC) ? ($possuiPC === 'Sim' ? 'SELECTED' : '') : '') ?>>Sim</option>
                                <option value="Não" <?= (isset($possuiPC) ? ($possuiPC === 'Não' ? 'SELECTED' : '') : '') ?>>Não</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <select class="form-control" name="trabalha" id="trabalha" required>
                                <option value="">Trabalha ?</option>
                                <option value="Sim" <?= (isset($trabalha) ? ($trabalha === 'Sim' ? 'SELECTED' : '') : '') ?>>Sim</option>
                                <option value="Não" <?= (isset($trabalha) ? ($trabalha === 'Não' ? 'SELECTED' : '') : '') ?>>Não</option>
                            </select>
                        </div>
                    </div>
                    <!-- Endereço -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label hidden>Logradouro</label>
                            <input type="text" id="logradouro" class="form-control" name="logradouro" placeholder="Logradouro" value="<?= $logradouro ?? '' ?>" required>
                        </div>
                        <div class="form-group col-md-1">
                            <label hidden>Numero</label>
                            <input type="text" id="numero" class="form-control" name="numero" placeholder="Número" value="<?= $numero ?? '' ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label hidden>Bairro</label>
                            <input type="text" id="bairro" class="form-control" name="bairro" placeholder="Bairro" value="<?= $bairro ?? '' ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label hidden>Cidade</label>
                            <input type="text" id="cidade" class="form-control" name="cidade" placeholder="Cidade" value="<?= $cidade ?? '' ?>" required>
                        </div>
                        <div class="form-group col-md-1">
                            <label hidden>Estado</label>
                            <input type="text" id="estado" class="form-control" name="estado" placeholder="Estado" value="<?= $estado ?? '' ?>" required maxlength="2" onblur="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="form-group col-md-4" hidden>
                            <label hidden>CEP</label>
                            <input type="text" id="cep" class="form-control" name="cep" placeholder="CEP" value="<?= $cep ?? '39.260-000' ?>">
                        </div>
                    </div>
                </fieldset>
                <!-- Matrícula -->
                <fieldset>
                    <legend>Matrícula</legend>
                    <div class="form-row">
                        <div class="form-group col-md-5 <?= isset($erros['curso']) ? 'is-invalid' : '' ?>">
                            <label hidden>Curso</label>
                            <select id="curso" class="form-control" name="curso" value="<?= $curso ?? '' ?>" required>
                                <option value="">Selecione o curso</option>
                                <?php
                                $cursos = DATABASE::getResultFromQuery('SELECT * FROM curso');
                                foreach ($cursos as $curso) {
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
                            <label hidden>Dias da semana</label>
                            <input type="text" id="dias" class="form-control" name="dias" 
                                value="<?= $dias ?? 'Dias da semana' ?>" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label hidden>Data de matrícula</label>
                            <input type="date" id="dataMatricula" class="form-control" name="dataMatricula" 
                                value="<?= $dataMatricula ?? date('Y-m-d') ?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="inicio"><span>Início: </span>
                                <input type="date" id="dataInicio" class="form-control" name="dataInicio" 
                                    value="<?= $dataInicio ?? date('Y-m-d', strtotime("+1 day")) ?>"></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label hidden>Horário</label>
                            <select id="horario" class="form-control" name="horario" required>
                                <option value="">Selec. horário</option>
                                <?php
                                $horarios = DATABASE::getResultFromQuery('SELECT * FROM horario');
                                foreach ($horarios as $horario) {
                                    echo "<option value='{$horario['horario']}'>{$horario['horario']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label hidden>Sala</label>
                            <select id="sala" class="form-control" name="sala" required>
                                <option value="">Selec. sala</option>
                                <option value="01 - Incl. Digital" <?= (isset($sala) ? ($sala === '01 - Incl. Digital' ? 'SELECTED' : '') : '') ?>>01 - Incl. Digital</option>
                                <option value="02 - Incl. Digital" <?= (isset($sala) ? ($sala === '02 - Incl. Digital' ? 'SELECTED' : '') : '') ?>>02 - Incl. Digital</option>
                                <option value="03 - Incl. Digital" <?= (isset($sala) ? ($sala === '03 - Incl. Digital' ? 'SELECTED' : '') : '') ?>>03 - Incl. Digital</option>
                            </select>
                        </div>
                        <!-- Funcionário responsável pelo cadastro -->
                        <div class="form-group col-md-4 offset-md-1">
                            <label class="funcionario">
                                <span>Func. Respon.: </span>
                                <input type="text" id="usuario" class="form-control funcionario" name="usuario" 
                                value="<?= isset($usuario) ? $usuario : $_SESSION['user']->nome ?>" readonly>
                            </label>
                        </div>
                        <div class="form-group col-md-3">
                             <div class="buttons">
                                <button class="btn btn-primary btn-md">Salvar</button>
                                <a href="/alunos.php" class="btn btn-dark btn-md">Cancelar</a>
                            </div>     
                        </div>
                    </div>
                </fieldset>
            </div><!-- //fim div-card-body-->
            <!-- <div class="card-footer"> -->
               
            <!-- </div>//fim div-card-footer -->
        </form><!-- //fim form -->
    </div><!-- fim do card -->
</main>

<script>
    function teste(){
        let campo = document.getElementById("cpf");
        let cpf = campo.value;
        if(!cpf){
            return campo.focus();
        }
        
        $.ajax({
            method: "POST",
            url: "verificar_teste.php",
            dataType:"json",
            data:{"cpf": cpf },
            success:function(retorno){
                if(retorno.x === true && retorno['msg'] != null){
                    // console.log(`${retorno['x']}  -  ${retorno['cpf']}  -  ${retorno['msg']}  -  ${retorno['a']}`);
                    //console.log (retorno);

                    if(selectParams() !== 'update'){
                        var r = confirm(`${retorno.msg}\n\nClique "OK" para atualizar o cadastro!`);

                        if ( r === true ) {
                            console.log(retorno.row);
                            console.log(`save_aluno.php?update=${retorno.row['codigo']}`);
                            window.location.href = (`save_aluno.php?update=${retorno.row['codigo']}`);
                        } else {
                            campo.value = "";
                            window.location.href = (`save_aluno.php`);
                            return campo.focus();
                        }
                    }else{
                        console.log("Você já esta da tela de atualização do cadastro");
                    } 
                }else{
                    console.log("Ocorreu algum problema!");
                    console.log(retorno['msg']);  
                    // return true;
                }
            },
            error:function(){
            }
        });
    }

    function selectParams(){
        //Array de parametros 'chave=valor'
        var params = window.location.search.substring(1).split('&');

        //Criar objeto que vai conter os parametros
        var paramArray = {};

        //Passar por todos os parametros
        for(var i=0; i<params.length; i++) {
            //Dividir os parametros chave e valor
            var param = params[i].split('=');

            //Adicionar ao objeto criado antes
            paramArray[param[0]] = param[1];
        }

        var keyParam = params[0].split('=')[0];
        
        return keyParam;

    }

    if(selectParams() === 'update'){
        console.log(selectParams());
    }else{
        console.log('Nada aqui');
    }
</script>