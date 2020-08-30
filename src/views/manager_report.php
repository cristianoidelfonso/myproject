<main class="content">
    <?php
        requireValidSession(true);
        renderTitle('Manager Report','Subtítulo aqui','icofont-chart-histogram');
        include(TEMPLATE_PATH . "/messages.php");
        isset($message) ? "<script>$('#message').fadeOut(4500);</script>" : '';
    ?>

    <div class="summary-boxes">
        <div class="summary-box">
            <i class="icon icofont-users"></i>
            <p class="title">Adicionar um titulo</p>
            <h3 class="value"><?= 'Adicionar valor aqui' ?></h3>
        </div>
        <div class="summary-box">
            <i class="icon icofont-patient-bed"></i>
            <p class="title">Adicionar um titulo</p>
            <h3 class="value"><?=  'Adicionar valor aqui' ?></h3>
        </div>
        <div class="summary-box">
            <i class="icon icofont-sand-clock"></i>
            <p class="title">Adicionar um titulo</p>
            <h3 class="value"><?= 'Adicionar valor aqui' ?></h3>
        </div>
    </div>

    <?php if($users > 0): ?>
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Texto aqui</h4>
                <p class="card-category mb-0">Texto qualquer aqui</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <th>Nome</th>
                    </thead>
                    <tbody>
                        <?php foreach($users as $name): ?>
                            <tr>
                                <td><?= $name->nome ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>
</main>
