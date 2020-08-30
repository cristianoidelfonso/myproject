<?php $nomeCoordenador = "Gleydson Rodrigues Campos"; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/print.png" type="image/x-icon">
    <title>Declaração de matrícula</title>
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/print.css">
</head>

<body>
    <header class="row header">
        <div class="col-3 img">
            <img src="assets/img/logo-oficial.png" alt="">
        </div> <!-- 25% -->
        <div class="col-8">
            <h4 style="margin-bottom: 0rem;"><u>CVT/UAITEC - Universidade Aberta e Intergrada de Minas Gerais<u></h4>
            <span>Rua: Dr. Antônio Gomes Pinto Coelho, nº: 1.414 - Centro</span><br>
            <span>Polo Várzea da Palma - MG</span> / Tel:<span>(38) 3731-1219</span><br>
            <span>E-mail:varzeadapalma@uaitec.mg.gov.br</span><br>
        </div>
        <div class="col-1" hidden>

        </div> <!-- 25% -->
    </header>

    <main class="content">

        <p class="dec">Declaração de matrícula</p>

        <p>Declaro, para os devidos fins, junto a ________________________________________________, que
            <strong><?= $aluno[0]->nome ?></strong>,
            portador do CPF: <strong><?= $aluno[0]->cpf ?></strong>,
            residente e domiciliado na <strong><?= $aluno[0]->logradouro ?></strong>,
            nº <strong><?= $aluno[0]->numero ?></strong>,
            bairro <strong><?= $aluno[0]->bairro ?></strong>, <strong><?= $aluno[0]->cidade ?></strong>/<strong><?= $aluno[0]->estado ?></strong>, encontra-se devidamente
            matriculado nesta instituição de ensino, sob o numero de USUÁRIO: <strong><?= $aluno[0]->codigo ?></strong>,
            e está realizando o curso <strong><?= $aluno[0]->curso ?></strong>,
            nos dias <strong><?= $aluno[0]->dias ?></strong>,
            no horário de <strong><?= $aluno[0]->horario ?></strong>.</p>

        <p>Por ser verdade, dato e assino o presente instrumento em duas vias de igual teor e forma.</p>

        <div>
            <p>Várzea da Palma, <?= translateDate(); ?></p>
            <div class="assinatura">
                <hr>
                <strong><?= $nomeCoordenador ?? "Nome do coordenador" ?></strong><br>
                <p>Coordenador do Polo de Apoio Presencial UAITECLAB de Várzea da Palma</p>
            </div>
        </div>
    </main>

</body>

</html>