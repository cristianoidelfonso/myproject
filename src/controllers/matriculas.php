<?php

    session_start();
    requireValidSession();

    $exception = null;
    
    if(isset($_GET['delete'])) {
        try {
            Matricula::deleteById($_GET['delete']);
            addSuccessMsg('Matrícula excluído com sucesso.');
        } catch(Exception $e) {
            if(stripos($e->getMessage(), 'FOREIGN KEY')) {
                addErrorMsg('Não é possível excluir o aluno');
            } else {
                $exception = $e;
            }
        }
    }
    
    $matriculas = Matricula::get();

    loadTemplateView('matriculas', ['matriculas' => $matriculas,'exception' => $exception]);

?>