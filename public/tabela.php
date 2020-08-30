<?php
    //phpinfo();
    require_once(dirname(__FILE__, 2) . '/src/config/config.php');
    $cursos = Curso::get();
?>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/icofont.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css.map">

<script src="assets/js/jquery-3.4.1.js"></script>
<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
<script src="assets/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example_cursos').DataTable( {
            "scrollY":        "50vh",
            "scrollCollapse": true,
            "paging":         true
        });
    });
</script>
<div class="container">
<?php if(count($cursos)){ ?>
    <table id="example_cursos" class="table table-striped table-bordered table-sm table-hover" cellspacing="0" width="100%">
        <thead>
            <th class="text-center">Código</th>
            <th class="text-center">Nome</th>
            <th class="text-center">Carga Horaria</th>
            <th class="text-center">Ações</th>
        </thead>
        <tbody>
            <?php foreach($cursos as $curso): ?>
                <tr>
                    <td class="text-center"><?= $curso->codigo ?></td>
                    <td class="text-center"><?= $curso->nomeCurso ?></td>
                    <td class="text-center"><?= $curso->cargaHoraria ?></td>
                    <td class="text-center">
                        <a href="save_curso.php?update=<?= $curso->codigo ?>" 
                            class="btn btn-warning rounded-circle mr-2">
                            <i class="icofont-edit"></i>
                        </a>
                        <a href="?delete=<?= $curso->codigo ?>"
                            class="btn btn-danger rounded-circle">
                            <i class="icofont-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center">Código</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Carga Horaria</th>
                <th class="text-center">Ações</th>
            </tr>
        </tfoot>
    </table>
<?php } else {?>
    <p>Nenhum curso encontrado.</p>
<?php }?>
</div>