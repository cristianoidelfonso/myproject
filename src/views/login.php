<?php
    if(isset($_SESSION['user'])){
        header('Location: day_records.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Cadastro de alunos</title>
</head>
<body>
    <form class="form-login" action="" method="post">
        <div class="login-card card">
            <div class="card-header">
                <i class="icofont-travelling mr-2"></i>
                <span class="font-weight-light">Faça</span>
                <span class="font-weight-bold mx-2"> Login</span>
                <!--span class="font-weight-light"></span-->
                <!--i class="icofont-runner-alt-1 ml-2"></i-->
            </div>
            <div class="card-body">
                <?php include(TEMPLATE_PATH . '/messages.php') ?>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email"
                        class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                        value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"
                        placeholder="Informe o e-mail" autofocus required>
                    <div class="invalid-feedback">
                        <?= $errors['email'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password"
                        class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                        placeholder="Informe a senha" required>
                    <div class="invalid-feedback">
                        <?= $errors['password'] ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-primary">Entrar</button>
            </div>
        </div>
    </form>

</body>
</html>
