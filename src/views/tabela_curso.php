<!--script src="assets/js/jquery-3.4.1.js"></script-->
<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
<script src="assets/js/jquery.dataTables.min.js"></script>
<style>
    div table thead tr th {
        background-color: rgba(0, 0, 0, .2);
    }
</style>
<script>
    $(document).ready(function() {
        $('#tabela_curso').DataTable({
            "scrollY": "42vh",
            "scrollCollapse": true,
            "paging": true,
            "searching": true,
            "pagingType": "simple",
            "language": {
                "emptyTable": "Sem dados disponíveis na tabela",
                "info": "Exibindo _END_ em _TOTAL_ curso(s)",
                "infoEmpty": "Nenhum curso encontrado para essa pesquisa",
                "infoFiltered": " ( Filtrado do total de _MAX_ curso(s). ) ",
                "zeroRecords": "<p class='text-danger'>Esta pesquisa não retornou resultados!</p>",
                "search": "Pesquisar:",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo",
                },
                "lengthMenu": 'Exibir <select>' +
                    '<option value="5">5</option>' +
                    '<option value="10">10</option>' +
                    '<option value="15">15</option>' +
                    '<option value="20">20</option>' +
                    '<option value="-1">Todos</option>' +
                    '</select> usuarios'
            }
        });
    });
</script>

<?php if (count($cursos)) { ?>
    <table id="tabela_curso" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">Código</th>
                <th class="">Nome</th>
                <th class="text-center">Carga Horaria</th>
                <th class="text-center">Instituição</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cursos as $curso) : ?>
            <?php if(strtolower($curso->instituicao) === $_SESSION['user']->instituicao) {?>
                <tr>
                    <td class="text-center"><?= $curso->codigo ?></td>
                    <td class=""><?= $curso->nomeCurso ?></td>
                    <td class="text-center"><?= $curso->cargaHoraria ?></td>
                    <td class="text-center"><?= $curso->instituicao ?></td>
                    <td class="text-center">
                        <a href="save_curso.php?update=<?= $curso->codigo ?>" class="btn btn-warning rounded-circle mr-2" title="Editar">
                            <i class="icofont-edit"></i>
                        </a>
                        <a href="?delete=<?= $curso->codigo ?>" class="btn btn-danger rounded-circle" title="Excluir">
                            <i class="icofont-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            <?php endforeach ?>
        </tbody>
    </table>
<?php } else { ?>
    <center>
        <p>Nenhum curso encontrado.</p>
    </center>
<?php } ?>
