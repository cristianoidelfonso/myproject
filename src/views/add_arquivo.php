<main class="content bg-info"><!-- Tela que apresenta todos os cursos -->
    <?php
        requireValidSession(true);
        // isset($message) ? "<script>$('#message').fadeOut(4500);</script>" : ''; 
        renderTitle('Adicionar arquivos', 'Adicione arquivos dos alnunos em formato pdf', 'icofont-attachment-alt-1');
        
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    <div class="message"><a class="btn btn-lg btn-primary" href="#">Add</a></div>
    <div class="message"><a class="btn btn-lg btn-primary" href="alunos.php">Voltar</a></div>
    <div class="scroll"><?php //loadView('tabela_curso', ['cursos' => $cursos]); ?></div>

    <div class="content bg-danger">

       <form action="upload.php" method="post" enctype="multipart/form-data">
            Selecione o arquivo: <input type="file" name="arquivo" />
            <input type="submit" value="Enviar"/>
        </form>
    
    </div>

</main>
