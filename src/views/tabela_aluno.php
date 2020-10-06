<!--script src="assets/js/jquery-3.4.1.js"></script-->
<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
<script src="assets/js/jquery.dataTables.min.js"></script>
<!-- <script src="assets/js/dataTablesButtons.min.js"></script> -->
<style>
    div table thead tr th {
        background-color: rgba(0, 0, 0, .2);
    }

    .meulink {
        display: inline;
        background: transparent;
        text-decoration: none;
        border: none;
        cursor: pointer;
        color: #00f;
    }

    .meulink:hover {
        background-color: rgba(150, 100, 90, .4);
        border-radius: 5px;
    }
</style>

<div class="table">
    
    <!-- Table -->
    <table id='tabela_aluno' class='display dataTable'>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
                <!-- <th>Nome da mãe</th> -->
                <th>Instituição</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>

    </table>
</div>

<!-- Script -->
<script>
    $(document).ready(function() {
        // Delete a record
        // $('#tabela_aluno').on('click', 'a.update', function (e) {
        // e.preventDefault();
        // alert(e);
        // });
        $('#tabela_aluno').on('click', 'a.print', function(e) {
            e.preventDefault();
            alert(e);
        });

        $('#tabela_aluno').DataTable({
            // "scrollY": "51vh",
            "scrollY": "58vh",
            "scrollCollapse": true,
            "paging": true,
            "searching": true,
            "language": {
                "lengthMenu": 'Exibir <select>' +
                    '<option value="05">5</option>' +
                    '<option value="10">10</option>' +
                    '<option value="25">25</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">Todos</option>' +
                    '</select> usuarios',
                "decimal": ",",
                "thousands": ".",
                "emptyTable": "Sem dados disponíveis na tabela",
                "info": "Exibindo _END_ em _TOTAL_ aluno(s)",
                "infoEmpty": "Nenhum aluno encontrado para essa pesquisa",
                "infoFiltered": " ( Filtrado do total de _MAX_ aluno(s). ) ",
                "zeroRecords": "<p class='text-danger'>Esta pesquisa não retornou resultados!</p>",
                "search": "Pesquisar:",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo",
                },
            },
            "processing": true,
            "serverSide": true,
            "serverMethod": "post",
            "ajax": {
                "type": "post",
                "dataType": "json",
                "url": "ajax_file.php",
            },
            "columns": [
                {   data: "codigo",  
                    "render" : function (data){
                        return `<h5 class="text-center">${data}</h5>`;
                    }
                },
                {   
                    data: "path",
                    "render": function (data) {
                        var resultado =  data.toString().replace(",", "/");
                        var arr = resultado.split('/');

                        if(arr[1] !== ''){
                            return `<div class="foto">
                                        <img src="./uploads/fotos/${resultado}"/>
                                    </div>`;
                        }else{
                            return `<div class="foto">
                                        <img src="/assets/img/avatar-foto3x4.jpg"/>
                                    </div>`;
                            // return  `<span class="bg-light text-center">Sem Foto</span>`;
                        }
                    }
                },
                {   data: "nome" },
                {
                    data: null,
                    "render": function(data) {
                        return `<form action="page_personal.php" method="post">
                                        <input name="id" value="${data['codigo']}" hidden> 
                                        <button class="meulink" title="Abrir página pessoal">${data['email']}</button>
                                    </form>`
                    }
                },
                {   data: "cpf" },
                // {   data: "nomeMae" },
                {
                    //data: "instituicao"
                    data: null,
                    "render": function(data) {
                        return `<span>${data['instituicao']}</span>`
                    }

                },
                {
                    data: null,
                    className: "center",
                    "render": function(data) {
                        return `<div style="display: flex;">
                                <a href="save_aluno.php?update=${data['codigo']}"
                                    class="btn btn-light mr-1 update" title="Editar">
                                        <i class="icofont-edit"></i>   
                                </a>
                                <form action="print.php" method="post" target="_blank">
                                    <input type="text" name="id_print" value="${data['codigo']}" hidden>
                                    <button class="btn btn-light mr-1 update" title="Imprimir">
                                        <i class="icofont-print"></i>
                                    </button>
                                </form>
                                <form action="add_arquivo.php" method="post">
                                    <input type="text" name="id_add_arquivo" value="${data['codigo']}" hidden>
                                    <button class="btn btn-light mr-1 update" title="Adiciona arquivo">
                                        <i class="icofont-attachment"></i>
                                    </button>
                                </form>
                                <?php //if ($user->isAdmin) : ?> 
                                <a href="?delete=${data['codigo']}" 
                                    class="btn btn-light rounded-circle mr-1 update" title="Excluir">
                                    <i class="icofont-trash"></i>
                                </a>
                                <?php //endif ?>
                                </div>`
                    }
                }
            ]
        });

        $("input[type=search]").focus();
    });
</script>


 

<!--    
<script>
    $(document).ready(function () {
        $('#tabela_aluno').DataTable( {
            "scrollY":          "42vh",
            "ordering":         false,
            "scrollCollapse":   true,
            "paging":           true,
            "searching":        true,
            "pagingType":       "simple",
            "language": {
                "emptyTable":       "Sem dados disponíveis na tabela",
                "info":             "Exibindo _END_ em _TOTAL_ aluno(s)",
                "infoEmpty":        "Nenhum aluno encontrado para essa pesquisa",
                "infoFiltered":     " ( Filtrado do total de _MAX_ aluno(s). ) ",
                "zeroRecords":      "<p class='text-danger'>Esta pesquisa não retornou resultados!</p>",
                "search":           "Pesquisar:",
                "paginate": {
                    "previous":     "Anterior",
                    "next":         "Próximo",
                },
                "lengthMenu": 'Exibir <select>'+
                    '<option value="10">10</option>'+
                    '<option value="50">50</option>'+
                    '<option value="100">100</option>'+
                    '<option value="150">150</option>'+
                    '<option value="-1">Todos</option>'+
                    '</select> usuarios'
            },
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url':'../controllers/ajax_file.php'
            },
            'columns': [
                { data: 'codigo' },
                { data: 'foto' },
                { data: 'nome' },
                { data: 'cpf' },
                { data: 'email' },
                { data: 'instituicao' },
                { data: 'nomeMae' },
            ]

        });
    });
</script>


<?php if (count($alunos)) { ?>
    <table id="tabela_aluno" class="display" style="width:100%">
        <thead>
            <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Nome</th>
            <th class="text-center">CPF</th>
            <th class="text-center">Email</th>
            <th class="text-center">Nome da mãe</th>
            <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($alunos as $aluno) : ?>
                <tr>
                    <td class="text-center"><?= $aluno->codigo ?></td>
                    <td class="text-center"><img src="<?= $aluno->foto ?>"></td>
                    <td class="text-center"><?= $aluno->nome ?></td>
                    <td class="text-center"><?= $aluno->cpf ?></td>
                    <td class="text-center">
                        <a class="pessoal" title="Editar" 
                            href="save_aluno.php?update=<?= $aluno->codigo ?>"><?= $aluno->email ?>
                        </a>
                    </td>
                    <td class="text-center"><?= $aluno->nomeMae ?></td>
                    <td class="text-center"><?= $aluno->intituicao ?></td>
                    <td class="text-center">
                        <a href="save_aluno.php?update=<?= $aluno->codigo ?>" 
                            class="btn btn-warning rounded-circle mr-2" title="Editar">
                            <i class="icofont-edit"></i>
                        </a>
                        <a href="print.php?print=<?= $aluno->codigo ?>" target="_blank" 
                            class="btn btn-primary rounded-circle mr-2" title="Imprimir">
                            <i class="icofont-print"></i>
                        </a>
                        <?php if ($user->isAdmin) : ?>
                        <a href="?delete=<?= $aluno->codigo ?>"
                            class="btn btn-danger rounded-circle" title="Excluir">
                            <i class="icofont-trash"></i>
                        </a>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php } else { ?>
    <center><p>Nenhum aluno cadastrado.</p></center>
<?php } ?>
-->