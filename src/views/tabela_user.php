<!--script src="assets/js/jquery-3.4.1.js"></script-->
<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
<script src="assets/js/jquery.dataTables.min.js"></script>
<style>
    div table thead tr th {
        background-color: rgba(0, 0, 0, .2);
    }

    [data-color="uaitec"] {
        background-color: rgba(65, 105, 225, .5);
        letter-spacing: .2rem;
    }
    [data-color="ifnmg"] {
        background-color: rgba(72, 61, 139, .5);
        letter-spacing: .2rem;
    }
    [data-color="uab"] {
        background-color: rgba(75, 0, 130, .5);
        letter-spacing: .2rem;
    }
</style>
<script>
    $(document).ready(function() {
        $('#tabela_user').DataTable({
            "scrollY": "42vh",
            "scrollCollapse": true,
            "paging": true,
            "searching": true,
            "pagingType": "simple",
            "language": {
                "emptyTable": "Sem dados disponíveis na tabela",
                "info": "Exibindo _END_ em _TOTAL_ usuário(s)",
                "infoEmpty": "Nenhum usuário encontrado para essa pesquisa",
                "infoFiltered": " ( Filtrado do total de _MAX_ usuário(s). ) ",
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

<?php if (count($users)) { ?>
    <table id="tabela_user" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nome</th>
                <th class="text-center">CPF</th>
                <th class="text-center">Email</th>
                <th class="text-center">Login</th>
                <th class="text-center">Instituição</th>
                <th class="text-center">Admin</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td class="text-center"><?= $user->codigo ?></td>
                    <td class="text-center"><?= $user->nome ?></td>
                    <td class="text-center"><?= $user->cpf ?></td>
                    <td class="text-center"><?= $user->email ?></td>
                    <td class="text-center"><?= $user->login ?></td>
                    <td class="text-center" data-color="<?php echo $user->instituicao?>"><?= strtoupper( $user->instituicao ) ?></td>
                    <td class="text-center"><?= $user->isAdmin === '1' ? 'Sim' : '---' ?></td>
                    <td class="text-center">
                    <?php if($user->codigo !== $_SESSION['user']->codigo) { ?>
                        <a href="save_user.php?update=<?= $user->codigo ?>" class="btn btn-warning rounded-circle mr-2" title="Editar">
                            <i class="icofont-edit fa-1x"></i>
                        </a>
                        <a href="?delete=<?= $user->codigo ?>" class="btn btn-danger rounded-circle" title="Excluir">
                            <i class="icofont-trash fa-1x"></i>
                        </a>
                    <?php } else{
                        echo "&ensp;&ensp;-&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;-&ensp;&ensp;";
                    } ?>    
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php } else { ?>
    <center>
        <p>Nenhum usuário encontrado.</p>
    </center>
<?php } ?>

<script type="text/javascript">
    function aqui(){
        var mensagem = "<?php echo $user->instituicao ?>";
        alert(mensagem);
    }
</script>
