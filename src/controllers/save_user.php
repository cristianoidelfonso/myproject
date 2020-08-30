<?php
    //controller para cadastrar ou atualizar um usuario
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
    $userData = [];
    
    if(count($_POST) === 0 && isset($_GET['update'])) {
        $user = User::getOne(['codigo' => $_GET['update']]);
        $userData = $user->getValues();
        $userData['password'] = null;
    } elseif(count($_POST) > 0) {
        try {
            $dbUser = new User($_POST);
            $dbUser->isAdmin = isset($_POST['isAdmin']) ? 1 : 0;
            $dbUser->codigo = isset($_REQUEST['update']) ? $_REQUEST['update'] : null ;
            
            if($dbUser->codigo) {
                $dbUser->update();
                Database::backup();
                addSuccessMsg('Usuário alterado com sucesso!');
                header('Location: users.php');
                exit();
            } else {
                $dbUser->insert();
                Database::backup();
                addSuccessMsg('Usuário cadastrado com sucesso!');
                header('Location: users.php');
                exit();
            }
            $_POST = [];
        } catch(Exception $e) {
            $exception = $e;
        } finally {
            $userData = $_POST;
        }
    }
    
    loadTemplateView('save_user', $userData + ['exception' => $exception, 'isAdmin' => null]);
    