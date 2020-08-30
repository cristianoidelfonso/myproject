<?php

// função para validar a sessão, recebe por padrão o parametro $requiresAdmin = false

function requireValidSession($requiresAdmin = false) {
    // salva os dados do usuario da sessão 
    $user = $_SESSION['user'];
    // se $user não existir, redireciona para pagina de login e para a execução da aplicação
    if(!isset($user)) {
        header('Location: login.php');
        exit();
        // senão, se $user existir, mas não for admin, mostra mensagem de 'acesso negado', 
        // redireciona para a pagina principal e para a execução da aplicação 
    } elseif($requiresAdmin && !$user->isAdmin) { // !1 = 0, !0 = 1
        addErrorMsg('Acesso negado! Você não é administrador');
        header('Location: day_records.php');
        exit();

    } elseif($requiresAdmin && $user->isAdmin) {
        //addErrorMsg('Acesso liberado! Você é administrador');
        //header('Location: day_records.php');
        //exit();
    } 
}