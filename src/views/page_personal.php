<main class="content">
    <?php
    requireValidSession();

    // isset($aluno) ? var_dump($aluno) : "Nada aqui";

    // $a = $aluno[0];
    $a = $aluno;

    include(TEMPLATE_PATH . "/messages.php");

    ?>
    <style>
        label.form-control {
            font-size: .6rem;
            color: #0A239A;
            letter-spacing: .1em;

        }

        label.form-control strong {
            font-size: 1rem;
            color: black;
        }
    </style>

        <div style="padding:1rem 1rem 0rem 1rem;">
            <span style="background-color: #F00;"><?= $msg ?? "Não chegou nada aqui" ?></span>
            <div>
                <div hidden class="col-lg-2 form-control" style="border:1px solid;width:125px;height:125px;text-align:center;margin: 0px 5px;">
                    Foto
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-1 form-control" for="codigo">Código : <strong><?= $a->codigo ?? '' ?></strong></label>
                        <label class="col-lg-4 form-control" for="nome">Nome : <strong><?= $a->nome ?? '' ?></strong></label>
                        <label class="col-lg-2 form-control" for="cpf">CPF : <strong><?= $a->cpf ?? '' ?></strong></label>
                        <label class="col-lg-2 form-control" for="identidade">Identidade : <strong><?= $a->identidade ?? '' ?></strong></label>
                        <label class="col-lg-3 form-control" for="certNasc">Certidão de nascimento : <strong><?= $a->certNasc ?? '' ?></strong></label>
                    </div>
                    <div class="row">
                        <label class="col-lg-3 form-control" for="dataNasc">Data de nascimento : <strong><?= date('d/m/Y', strtotime($a->dataNasc)) ?? '' ?></strong></label><br>
                        <label class="col-lg-2 form-control" for="sexo">Sexo : <strong><?= $a->sexo ?? '' ?></strong></label>
                        <label class="col-lg-2 form-control" for="raca">Raça : <strong><?= $a->raca ?? '' ?></strong></label>
                        <label class="col-lg-5 form-control" for="naturalidade">Naturalidade : <strong><?= $a->naturalidade ?? '' ?></strong></label>
                        <label class="col-lg-4 form-control" for="escolaridade">Escolaridade : <strong><?= $a->escolaridade ?? '' ?></strong></label><br>
                        <label class="col-lg-4 form-control" for="nomeMae">Nome da mãe : <strong><?= $a->nomeMae ?? '' ?></strong></label>
                        <label class="col-lg-4 form-control" for="nomePai">Nome do pai : <strong><?= $a->nomePai ?? '' ?></strong></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-3 form-control" for="logradouro">Logradouro : <strong><?= $a->logradouro ?? '' ?></strong></label>
                        <label class="col-lg-2 form-control" for="numero">Numero : <strong><?= $a->numero ?? '' ?></strong></label>
                        <label class="col-lg-3 form-control" for="bairro">Bairro : <strong><?= $a->bairro ?? '' ?></strong></label>
                        <label class="col-lg-3 form-control" for="cidade">Cidade : <strong><?= $a->cidade ?? '' ?></strong></label>
                        <label class="col-lg-1 form-control" for="estado">Estado : <strong><?= $a->estado ?? '' ?></strong></label>
                    </div>
                    <div class="row">
                        <label class="col-lg-3 form-control" for="telefone">Telefone : <strong><?= $a->telefone ?? '' ?></strong></label>
                        <label class="col-lg-3 form-control" for="celular">Celular : <strong><?= $a->celular ?? '' ?></strong></label>
                        <label class="col-lg-2 form-control" for="trabalha">Trabalha ? <strong><?= $a->trabalha ?? '' ?></strong></label>
                        <label class="col-lg-4 form-control" for="profissao">Profissão : <strong><?= $a->profissao ?? '' ?></strong></label>
                    </div>
                    <div class="row">
                        <label class="col-lg-4 form-control" for="possuiPC">Possui computador ? <strong><?= $a->possuiPC ?? '' ?></strong></label>
                        <label class="col-lg-4 form-control" for="conhecInfor">Conhecimento em informática : <strong><?= $a->conhecInfor ?? '' ?></strong></label>
                        <label class="col-lg-4 form-control" for="necessidadeEspecial">Necessidade especial : <strong><?= $a->necessidadeEspecial ?? '' ?></strong></label>
                    </div>
                    <div class="row">
                        <label class="col-lg-5 form-control" for="curso">Curso : <strong><?= $a->curso ?? '' ?></strong></label>
                        <label class="col-lg-4 form-control" for="email">E-mail : <strong><?= $a->email ?? '' ?></strong></label>
                        <label class="col-lg-3 form-control" for="senha">Senha : <strong><?= $a->senha ?? '' ?></strong></label>
                    </div>
                    <div class="row">
                        <label class="col-lg-3 form-control" for="horario">Horário : <strong><?= $a->horario ?? '' ?></strong></label>
                        <label class="col-lg-3 form-control" for="dataMatricula">Data da matricula : <strong><?= date('d/m/Y', strtotime($a->dataMatricula)) ?? '' ?></strong></label>
                        <label class="col-lg-3 form-control" for="dataInicio">Data início : <strong><?= date('d/m/Y', strtotime($a->dataInicio)) ?? '' ?></strong></label>
                        <label class="col-lg-3 form-control" for="dias">Dias agendados : <strong><?= $a->dias ?? '' ?></strong></label>
                        <label hidden class="col-lg-2 form-control" for="sala">Sala : <strong><?= $a->sala ?? '' ?></strong></label>
                    </div>
                    <div class="row">
                        <label class="col-lg-5 form-control" for="responsavel">Responsável legal : <strong><?= $a->responsavel ?? '' ?></strong></label>
                        <label class="col-lg-1 form-control" for="vinculo">Vínculo : <strong><?= $a->vinculo ?? '' ?></strong></label>
                        <label class="col-lg-3 form-control" for="cpfResponsavel">CPF do responsável : <strong><?= $a->cpfResponsavel ?? '' ?></strong></label>
                        <label class="col-lg-3 form-control" for="identidadeResponsavel">RG do responsável : <strong><?= $a->identidadeResponsavel ?? '' ?></strong></label>
                    </div>
                    <div class="row">
                        <label class="col-lg-6 form-control" for="usuario">Funcionário responsável pela matricula : <strong><?= $a->usuario ?? '' ?></strong></label><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <a href="alunos.php" class="btn btn-outline-info">Voltar</a>
            <a href="decMatricula.php?decMat=<?= $a->codigo ?>" target="_blank" class="btn btn-outline-info">Declaração de matrícula</a>
            <a href="declaracao.php?dec=<?= $a->codigo ?>" target="_blank" class="btn btn-outline-info">Declaração</a>
        </div>

        <div style="width: 200px; height: 200px; border: 1px solid;">
            <?php 
                $path = preg_replace("(\.|\-)","",$a->cpf);
                echo "<img class='img-fluid' src='./uploads/fotos/{$path}/{$a->foto}'>";
            ?>
        </div>

</main>