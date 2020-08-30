<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">

    <!-- lotodicas-->
    <link href="assets/css/components.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/modal.css" rel="stylesheet">
    <link href="assets/css/normalize.css" rel="stylesheet">
    <link href="assets/css/simulador.css" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="assets/img/icon-save-close-64.png">

    <title>Cadastro de Alunos</title>

</head>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Start Bootstrap </div>
            <div class="list-group list-group-flush">
                <a href="alunos.php" class="list-group-item list-group-item-action bg-light">Alunos</a>
                <a href="alunos_tab.php" class="list-group-item list-group-item-action bg-light">Tab Alunos</a>
                <?php if ($user->isAdmin) : ?>
                    <a href="users.php" class="list-group-item list-group-item-action bg-light">Usuários</a>
                    <a href="cursos.php" class="list-group-item list-group-item-action bg-light">Cursos</a>
                    <a href="monthly_report.php" class="list-group-item list-group-item-action bg-light">Relatório Mensal</a>
                    <a href="manager_report.php" class="list-group-item list-group-item-action bg-light">Relatório Gerencial</a>
                <?php endif ?>
            </div>
            <?php if ($user->isAdmin) : ?>
                <div class="sidebar-widgets" hidden>
                    <div class="sidebar-widget">
                        <i class="icon icofont-hour-glass text-primary"></i>
                        <div class="info">
                            <span class="main text-primary" <?= 'Teste' ?>>
                                <?= 'Teste' ?>
                            </span>
                            <span class="label text-muted">Informações aqui</span>
                        </div>
                    </div>
                    <div class="division my-3"></div>
                    <div class="sidebar-widget">
                        <i class="icon icofont-ui-alarm text-danger"></i>
                        <div class="info">
                            <span class="main text-danger" <?= 'Teste' ?>>
                                <?= 'Teste' ?>
                            </span>
                            <span class="label text-muted">Informações aqui</span>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom fixed-top">
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
                    <i class="icofont-navigation-menu" id="menu-toggle" title="Esconder/Mostrar menu lateral"></i>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION['user']->nome ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="logout.php"><i class="icofont-logout mr-2"></i>Sair</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">

                <?php loadView('day_records'); ?>

            </div>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="assets/js/jquery-3.4.1.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>
