<?php
    //echo 'Controller curso!!!';
    //controller para cadastrar ou atualizar um curso
    session_start();
    requireValidSession(true);
    
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        if($_SESSION['user']->isAdmin === '1'){
            echo "Usuário logado como administrador";
        }else{
            echo $requiresAdmin;
            addErrorMsg('Acesso negado!');
            header('Location: day_records.php');
            exit();
        }
    }
    
    $exception = null;
    $cursoData = [];
    
    if(count($_POST) === 0 && isset($_GET['update'])) {
        $curso = Curso::getOne(['codigo' => $_GET['update']]);
        $cursoData = $curso->getValues();
    } elseif(count($_POST) > 0) {
        try {
            $dbCurso = new Curso($_POST);
            $dbCurso->codigo = isset($_REQUEST['update']) ? $_REQUEST['update'] : null ;
            
            if($dbCurso->codigo) {
                $dbCurso->update();
                Database::backup();
                addSuccessMsg('Curso alterado com sucesso!');
                header('Location: cursos.php');
                exit();
            } else {
                $dbCurso->insert();
                Database::backup();
                addSuccessMsg('Curso cadastrado com sucesso!');
                header('Location: cursos.php');
                exit();
            }
            $_POST = [];
        } catch(Exception $e) {
            $exception = $e;
        } finally {
            $cursoData = $_POST;
        }
    }
    
    loadTemplateView('save_curso', $cursoData + ['exception' => $exception]);
