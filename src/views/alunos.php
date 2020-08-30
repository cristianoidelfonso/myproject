<main class="content"><!-- Tela que apresenta todos os usuarios -->
    <?php
        requireValidSession();
        // isset($message) ? "<script>$('#message').fadeOut(4500);</script>" : ''; 
        renderTitle('Cadastro de Alunos','Mantenha os dados dos alunos atualizados','icofont-group-students');
        
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    
    <div class="scroll"><?php loadView('tabela_aluno', ['alunos' => $alunos, 'user' => $user] ); ?></div>

</main>
