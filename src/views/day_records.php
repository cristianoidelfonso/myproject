<main class="content"><!-- Tela de novo cadastro ou atualização de usuario -->
    <?php
        renderTitle('Página inicial do sistema','Seja Bem Vindo!','icofont-user');
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    <div class="container">
        <label for="">Seus dados: </label><br>
        <img src="assets/img/cor_teste.png"><br>
        <label for="codigo">Código: <?= $_SESSION['user']->codigo ?></label><br>
        <label for="nome">Nome: <?= strtoupper( $_SESSION['user']->nome ) ?></label><br>
        <label for="cpf">CPF: <?= $_SESSION['user']->cpf ?></label><br>
        <label for="email">E-mail: <?= $_SESSION['user']->email ?></label><br>
        <label for="login">Login: <?= $_SESSION['user']->login ?></label><br>
        <label for="login">Instituição: <?= strtoupper( $_SESSION['user']->instituicao ) ?></label><br>
        <label for="isAdmin">Administrador: <?= $_SESSION['user']->isAdmin === '1' ? 'Sim' : 'Não' ?></label><br>
    </div>  
</main>
