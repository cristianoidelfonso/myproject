<main class="content">
    <!-- Tela que apresenta todos os usuarios -->
    <?php
        requireValidSession(true);
        // isset($message) ? "<script>$('#message').fadeOut(4500);</script>" : '';
        renderTitle('Cadastro de Usuários', 'Mantenha os dados dos usuários atualizados', 'icofont-users');
        
        include(TEMPLATE_PATH . "/messages.php");
    ?>

    <div class="message">
        <a class="btn btn-lg btn-primary" href="save_user.php">Novo Usuário</a> 
    </div>
    <div class="scroll"><?php loadView('tabela_user', ['users' => $users]); ?></div>
</main>
