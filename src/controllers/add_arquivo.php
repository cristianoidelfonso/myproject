<?php
    session_start();
    requireValidSession(true);
    
    // $exception = null;
    
    // if(isset($_GET['delete'])) {
    //     try {
    //         Curso::deleteById($_GET['delete']);
    //         addSuccessMsg('Curso excluído com sucesso.');
    //     } catch(Exception $e) {
    //         if(stripos($e->getMessage(), 'FOREIGN KEY')) {
    //             addErrorMsg('Não é possível excluir o curso informado.');
    //         } else {
    //             $exception = $e;
    //         }
    //     }
    // }
    
    // $cursos = Curso::get();

    loadTemplateView('add_arquivo', ['arquivo1' => 'Nada no arquivo 1','exception' => $exception]);