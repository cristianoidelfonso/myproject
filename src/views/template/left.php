<aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="alunos.php" title="Alunos">
                    <i class="icofont-group-students mr-2"></i>
                    Alunos
                </a>
            </li>
            <li class="nav-item">
                <a class="" href="save_aluno.php" title="Cadastrar novo aluno">
                    <i class="icofont-ebook mr-1"></i>
                    Novo Aluno
                </a>
            </li>
            
            <li class="nav-item" hidden>
                <a href="alunos_tab.php" title="Alunos">
                    <i class="icofont-group-students mr-2"></i>
                    Tab Alunos
                </a>
            </li>
            <?php if ($user->isAdmin) : ?>
                <li class="nav-item">
                    <a href="users.php" title="Usuários">
                        <i class="icofont-users mr-2"></i>
                        Usuários
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cursos.php" title="Cursos">
                        <i class="icofont-certificate-alt-1 mr-2"></i>
                        Cursos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="monthly_report.php" title="Relatório Mensal">
                        <i class="icofont-ui-calendar mr-2"></i>
                        Rel. Mensal
                    </a>
                </li>

                <li class="nav-item">
                    <a href="manager_report.php" title="Relatório Gerencial">
                        <i class="icofont-chart-histogram mr-2"></i>
                        Rel. Gerencial
                    </a>
                </li>

                <li class="nav-item">
                    <a href="matriculas.php" title="Matrículas">
                        <i class="icofont-chart-histogram mr-2"></i>
                        Matrículas
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
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
</aside>