<?php
    session_start();
    requireValidSession();

    $exception = null;
    $alunoData = [];
    $matricula = [];
    $idade = null;

    if(count($_POST) === 0 && isset($_GET['update'])) {
        $aluno = Aluno::getOne(['codigo' => $_GET['update']]);
        $alunoData = $aluno->getValues();

        $idade = getIdade($alunoData['dataNasc']);
    

    } elseif(count($_POST) > 1) {
        try {
            $dbAluno = new Aluno($_POST);
           
            $dbAluno->codigo = isset($_REQUEST['update']) ? $_REQUEST['update'] : null;

            //$dbAluno->codigo = intval($_POST['codigo']);
            $idCurso = explode("-",$dbAluno->curso);

            // $matricula = array('idAluno' => $dbAluno->codigo, 'idCurso' => $idCurso[0], 'idUsuario' => $_SESSION['user']->codigo);
            // $objMatricula = new Matricula($matricula); 
            // $objMatricula->insert();

            if($dbAluno->codigo) {
                $dbAluno->update();
                
                $matricula = array('idAluno' => $dbAluno->codigo, 'idCurso' => $idCurso[0], 'idUsuario' => $_SESSION['user']->codigo);
                $objMatricula = new Matricula($matricula); 
                $objMatricula->insert();

                Database::backup();
                addSuccessMsg('Cadastro alterado com sucesso!');
                header('Location: alunos.php');
                exit();
            } else {
                $idade = getIdade($dbAluno->dataNasc);
                $dbAluno->insert();
                
                $matricula = array('idAluno' => $dbAluno->codigo, 'idCurso' => $idCurso[0], 'idUsuario' => $_SESSION['user']->codigo);
                $objMatricula = new Matricula($matricula); 
                $objMatricula->insert();
                
                Database::backup();
                addSuccessMsg('Aluno cadastrado com sucesso!');
                header('Location: alunos.php');
                exit();
            }
            $_POST = [];
        } catch(Exception $e) {
            $exception = $e;
        } finally {
            $alunoData = $_POST;
        }
    }
   
    loadTemplateView('save_aluno', $alunoData + ['exception' => $exception, 'idade' => $idade]);
