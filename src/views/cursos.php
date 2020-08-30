<main class="content"><!-- Tela que apresenta todos os cursos -->
    <?php
        requireValidSession(true);
        // isset($message) ? "<script>$('#message').fadeOut(4500);</script>" : ''; 
        renderTitle('Cadastro de Curso', 'Mantenha os dados dos cursos atualizados', 'icofont-certificate-alt-1');
        
        include(TEMPLATE_PATH . "/messages.php");
    ?>

    <div class="message">
        <a class="btn btn-lg btn-primary" href="save_curso.php">Novo Curso</a>
    </div>
    <div class="scroll"><?php loadView('tabela_curso', ['cursos' => $cursos]); ?></div>
</main>