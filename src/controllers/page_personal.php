<?php
    session_start();
    requireValidSession();

    //recebemos nosso parâmetro vindo do form
    $parametro = isset($_POST['id']) ? $_POST['id'] : null;
    $msg = '';

    $aluno = Aluno::getSQL("SELECT * FROM aluno WHERE codigo = '".$parametro."'");

    loadTemplateView('page_personal', ['aluno' => $aluno, 'msg' => $msg]);
