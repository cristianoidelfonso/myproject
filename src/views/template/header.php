<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="assets/img/icon-save-close-64.png" type="image/x-icon">
    
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">
    <script src="assets/js/mascara.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <title>Cadastro de Alunos</title>
    <!-- JQuery 3.3.1 -->
    <script type="text/javascript" src="assets/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" language="javascript">
        window.history.forward(0);
    </script>
</head>
<body>
    <header class="header">
        <a href="index.php">
            <div class="logo">
                <i class="icofont-travelling mr-2"></i>
                <span class="font-weight-light">D2TI </span>
                <span class="font-weight-bold mx-2">VZP</span>
                <!--span class="font-weight-light">Out</span-->
                <!--i class="icofont-runner-alt-1 ml-2"></i-->
            </div>
        </a>
        <div class="menu-toggle mx-3">
            <i class="icofont-navigation-menu" title="Esconder/Mostrar menu lateral"></i>
        </div>
        <div class="spacer"></div>
        <div class="dropdown">
            <div class="dropdown-button">
                <img class="avatar" 
                    src="<?= "http://www.gravatar.com/avatar.php?gravatar_id="
                    . md5(strtolower(trim($_SESSION['user']->email))) ?>" alt="user">
                <span class="ml-3">
                    <?= $_SESSION['user']->nome ?>
                </span>
                <i class="icofont-simple-down mx-2"></i>
            </div>
            <div class="dropdown-content">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="logout.php">
                            <i class="icofont-logout mr-2"></i>
                            Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    