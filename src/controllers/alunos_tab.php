<?php
    session_start();
    requireValidSession();
    
    $exception = null;
    
    if(isset($_GET['delete'])) {
        try {
            Aluno::deleteById($_GET['delete']);
            addSuccessMsg('Aluno excluído com sucesso.');
        } catch(Exception $e) {
            if(stripos($e->getMessage(), 'FOREIGN KEY')) {
                addErrorMsg('Não é possível excluir o aluno');
            } else {
                $exception = $e;
            }
        }
    }
    
    //$alunos = Aluno::get();
    $sql ="SELECT * FROM aluno ORDER BY nome";
    $alunos = Aluno::getSQL($sql);
    
    loadTemplateView('alunos_tab', ['alunos' => $alunos,'exception' => $exception]);
