<style>
    .formularios{
        padding: 5px 5px;
        /* background-color: #E0E0E0 ;*/
        font-weight: 700;
        margin: 0 10px;
	}
    .botao{
        text-align: center;
        margin: 5px 0;
    }
    .background{
        background-color: #379d5b78;
        padding: 05px 15px ;
        border-radius: .5rem;
    }
    .btn-primary, .btn-primary:hover, .btn-secondary, .btn-secondary:hover {
        color: #fff;
        background-color: #379d5b;
        border-color:#379d5b;
    }
</style>

<main class="content bg-info"><!-- Tela que apresenta todos os cursos -->
    <?php
        requireValidSession(true);
        // isset($message) ? "<script>$('#message').fadeOut(4500);</script>" : ''; 
        renderTitle('Adicionar arquivos', 'Adicione arquivos dos alnunos em formato pdf', 'icofont-attachment-alt-1');
        
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    <!-- <div class="message"><a class="btn btn-lg btn-primary" href="#">Add</a></div> -->
    <!-- <div class="message"><a class="btn btn-lg btn-primary" href="alunos.php">Voltar</a></div> -->
    <!-- <div class="scroll"><?php //loadView('tabela_curso', ['cursos' => $cursos]); ?></div> -->

    <div class="content">
        <div class="container background">
            <div class="row form-group">
                <form enctype="multipart/form-data" action="upload.php" method="post" name="cadastro-arquivo">
                    Foto de exibição:<br />
                    <input type="file" name="foto" /><br /><br />
                    <input type="submit" name="cadastrar" value="Cadastrar" />
                </form>
            </div>
        </div>
    </div>

</main>
