<?php
    session_start();
    requireValidSession(true);
    
    //recebemos nosso parâmetro vindo do form
    $parametro = isset($_POST['pesquisaCliente']) ? $_POST['pesquisaCliente'] : null;
                 
    //requerimos a classe de conexão
    require_once(MODEL_PATH . '/Conexao.php');
    try {
        $pdo = new Conexao();
        $sql =  "SELECT * FROM aluno WHERE nome LIKE '$parametro%' ORDER BY nome ASC";
        $alunos = Aluno::getSQL($sql);
        //$resultado = $pdo->select( $sql);
        $pdo->desconectar();

        loadView('tabela_aluno', ['alunos' => $alunos, 'user' =>$user]);
                    
    }catch (PDOException $e){
            echo $e->getMessage();
    }   
