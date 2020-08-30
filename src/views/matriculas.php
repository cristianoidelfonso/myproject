<main class="content"><!-- Tela que apresenta todos os usuarios -->
    <?php
        requireValidSession();
        // isset($message) ? "<script>$('#message').fadeOut(4500);</script>" : ''; 
        renderTitle('Visualize os registros de matrículas','subtitle','icofont-ui-calendar');
        
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    
    <div class="scroll"><?php loadView('tabela_matriculas', ['matriculas' => $matriculas, 'user' => $user] ); ?></div>

</main>