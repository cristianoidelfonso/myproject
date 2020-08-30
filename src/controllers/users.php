<?php
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
    
    if(isset($_GET['delete'])) {
        try {
            User::deleteById($_GET['delete']);
            addSuccessMsg('Usuário excluído com sucesso.');
        } catch(Exception $e) {
            if(stripos($e->getMessage(), 'FOREIGN KEY')) {
                addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
            } else {
                $exception = $e;
            }
        }
    }
    
    $users = User::get();

    loadTemplateView('users', ['users' => $users,'exception' => $exception]);
