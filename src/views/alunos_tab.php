<main class="content"><!-- Tela que apresenta todos os usuarios -->
    <?php
        if(isset($_SESSION['user'])){
            if($_SESSION['user']->isAdmin === '1'){
                //echo "Usuário logado como administrador";
            }elseif($_SESSION['user']->isAdmin === '0'){
                //echo "Usuário logado mas não é administrador";
            }else{
                echo $requiresAdmin;
                addErrorMsg('Acesso negado!');
                header('Location: day_records.php');
                exit();
            }
        }
        renderTitle('Cadastro de Alunos','Mantenha os dados dos alunos atualizados','icofont-group-students');
    ?>
    
    <div class="message">
        <a class="btn btn-lg btn-primary" href="save_aluno_tab.php" title="Cadastrar novo aluno">Novo Aluno</a>
        <?php include(TEMPLATE_PATH . "/messages.php"); ?>
        <?= isset($message) ? "<script>$('#message').fadeOut(4500);</script>" : ''; ?>
    </div>
    <!--div class="scroll"><div id="MostraPesq"></div></div-->
    <div class="scroll"><?php loadView('tabela_aluno', ['alunos' => $alunos, 'user' => $user]); ?></div>
    <!--script type="text/javascript" language="javascript" src="assets/js/dynamic-search-ajax.js"></script-->    
</main>
