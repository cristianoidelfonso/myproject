<main class="content"><!-- Tela que apresenta todos os cursos -->
    <?php
        requireValidSession(true);
        // isset($message) ? "<script>$('#message').fadeOut(4500);</script>" : ''; 
        renderTitle('Adicionar arquivos', 'Adicione arquivos dos alnunos em formato pdf', 'icofont-attachment-alt-1');
        
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    
    <div class="message">
        <a class="btn btn-lg btn-primary" href="#">Add</a>
    </div>
    
    </br>
    
    <div class="message">
        <a class="btn btn-lg btn-primary" href="alunos.php">Voltar</a>
    </div>

    <div class="scroll">
    
    <?php //loadView('tabela_curso', ['cursos' => $cursos]); ?></div>

</main>
