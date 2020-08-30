<main class="content"><!-- Tela de novo cadastro ou atualização de usuario -->
    <?php
        requireValidSession(true);
        renderTitle('Cadastro de Usuários', 'Mantenha os dados dos usuários atualizados', 'icofont-users');

        include(TEMPLATE_PATH . "/messages.php");
    ?>

    <div class="card">
        <form action="#" method="post" accept-charset="utf-8">
            <input type="hidden" name="codigo" value="<?= isset($codigo) ? $codigo : null ?>">
            <div class="card-body">
                <fieldset>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" placeholder="Informe o nome"
                                class="form-control <?= isset($errors['nome']) ? 'is-invalid' : '' ?>"
                                value="<?= $nome ?? '' ?>">
                            <div class="invalid-feedback">
                                <?= $errors['nome'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cpf">Numero do CPF</label>
                            <input type="text" id="cpf" name="cpf"
                                class="form-control <?= isset($errors['cpf']) ? 'is-invalid' : '' ?>"
                                value="<?= $cpf ?? '' ?>"
                                onkeyup="mascara('###.###.###-##',this,event,true)" maxlength="14">
                            <div class="invalid-feedback">
                                <?= $errors['cpf'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="Informe o email"
                                class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                                value="<?= $email ?? '' ?>">
                            <div class="invalid-feedback">
                                <?= $errors['email'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="login">Apelido de Login</label>
                            <input type="text" id="login" name="login"
                                class="form-control <?= isset($errors['login']) ? 'is-invalid' : '' ?>"
                                value="<?= $login ?? '' ?>">
                            <div class="invalid-feedback">
                                <?= $errors['login'] ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="password">Senha</label>
                            <input type="password" id="password" name="password" placeholder="Informe a senha"
                                class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= $errors['password'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="confirm_password">Confirmação de Senha</label>
                            <input type="password" id="confirm_password" name="confirm_password"
                                placeholder="Confirme a senha"
                                class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= $errors['confirm_password'] ?>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Selecione a instituição: </label>
                            <select id="instituicao" class="form-control" name="instituicao" required>
                                <option value=""></option>
                                <option value="uaitec" <?= (isset($instituicao) ? ($instituicao === 'uaitec' ? 'SELECTED' : '') : '') ?>>01 - UAITEC</option>
                                <option value="ifnmg" <?= (isset($instituicao) ? ($instituicao === 'ifnmg' ? 'SELECTED' : '') : '') ?>>02 - IFNMG</option>
                                <option value="uab" <?= (isset($instituicao) ? ($instituicao === 'uab' ? 'SELECTED' : '') : '') ?>>03 - UAB</option>
                            </select>
                        </div>
                        <div id="divIsAdmin" class="form-group col-md-3">
                            <label for="isAdmin">Administrador ?</label><br>
                            
                            <input type="checkbox" id="isAdmin" name="isAdmin"
                                class="<?= isset($errors['isAdmin']) ? 'is-invalid' : '' ?>"
                                <?= ($isAdmin) ? 'checked' : '' ?>>
                            <span>&ensp;Marque a caixa para <strong>SIM</strong>!</span>    
                            <div class="invalid-feedback">
                                <!--?=// $errors['isAdmin'] ?-->
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div><!-- fim do card-body -->    
            <div class="card-footer">
                <div class="buttons">
                    <button class="btn btn-primary btn-lg">Salvar</button>
                    <a href="/users.php" class="btn btn-secondary btn-lg">Cancelar</a>
                </div>
            </div><!-- fim do card-footer -->    
        </form><!-- fim do form -->
    </div><!-- fim do card -->
</main>
