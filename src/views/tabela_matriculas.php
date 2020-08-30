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
        $('#tabela_matriculas').DataTable({
            "scrollY": "42vh",
            "scrollCollapse": true,
            "paging": true,
            "searching": true,
            "pagingType": "simple",
            "language": {
                "emptyTable": "Sem dados disponíveis na tabela.",
                "info": "Exibindo _END_ em _TOTAL_ matrículas(s).",
                "infoEmpty": "Nenhuma matrícula encontrado para essa pesquisa.",
                "infoFiltered": " ( Filtrado do total de _MAX_ matrículas(s). ) ",
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
                    '</select> matrículas.'
            }
        });
    });
</script>

<?php if (count($matriculas)) { ?>
    <table id="tabela_matriculas" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">Código</th>
                <th class="">Id Aluno</th>
                <th class="text-center">Id Curso</th>
                <th class="text-center">Id Usuário</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matriculas as $matricula) : ?>
                <tr>
                    <td class="text-center"><?= $matricula->codigo ?></td>
                    <td class=""><?= $matricula->idAluno ?></td>
                    <td class="text-center"><?= $matricula->idCurso ?></td>
                    <td class="text-center"><?= $matricula->idUsuario ?></td>
                    <td class="text-center">
                        <a href="?update=<?= $matricula->codigo ?>" class="btn btn-warning rounded-circle mr-2" title="Editar">
                            <i class="icofont-edit"></i>
                        </a>
                        <a href="?delete=<?= $matricula->codigo ?>" class="btn btn-danger rounded-circle" title="Excluir">
                            <i class="icofont-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php } else { ?>
    <center>
        <p>Nenhuma matricula encontrada.</p>
    </center>
<?php } ?>