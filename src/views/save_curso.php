<main class="content"><!-- Tela de novo cadastro ou atualização de curso -->
    <?php
        requireValidSession(true);
        renderTitle('Cadastro de Curso', 'Mantenha os dados dos cursos atualizados', 'icofont-certificate-alt-1');

        include(TEMPLATE_PATH . "/messages.php");
    ?>
    <div class="card">
        <form action="#" method="post" accept-charset="utf-8">
            <input type="hidden" name="codigo" value="<?= $codigo ?? null ?>">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="codigo">Código</label>
                        <input type="text" id="codigo" name="codigo" placeholder=""
                            class="form-control <?= isset($errors['codigo']) ? 'is-invalid' : '' ?>"
                            value="<?= $codigo ?? '' ?>" readonly>
                        <div class="invalid-feedback">
                            <?= $errors['codigo'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nomeCurso">Nome do curso</label>
                        <input type="text" id="nomeCurso" name="nomeCurso" placeholder="Informe o nome do curso"
                            class="form-control <?= isset($errors['nomeCurso']) ? 'is-invalid' : '' ?>"
                            value="<?= $nomeCurso ?? '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['nomeCurso'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nomeCurso">Instituição</label>
                        <input type="text" id="instituicao" name="instituicao" placeholder="Informe o nome da intituição"
                            class="form-control <?= isset($errors['instituicao']) ? 'is-invalid' : '' ?>"
                            value="<?= $instituicao ?? '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['instituicao'] ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cargaHoraria">Carga horária</label>
                        <input type="text" id="cargaHoraria" name="cargaHoraria"
                            class="form-control <?= isset($errors['cargaHoraria']) ? 'is-invalid' : '' ?>"
                            value="<?= $cargaHoraria ?? '' ?>">
                        <div class="invalid-feedback">
                            <?= $errors['cargaHoraria'] ?>
                        </div>
                    </div>
                </div>
            </div><!-- fim do card-body -->
            <div class="card-footer">
                <div class="buttons">
                    <button class="btn btn-primary btn-lg">Salvar</button>
                    <a href="/cursos.php"
                        class="btn btn-secondary btn-lg">Cancelar</a>
                </div>
            </div><!-- fim do card-footer -->
        </form><!-- fim do form -->
    </div><!-- fim do card -->
</main>
