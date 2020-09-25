<?php
    session_start();
    requireValidSession();

    //recebemos nosso parâmetro vindo do form
    $parametro = isset($_POST['id']) ? $_POST['id'] : null;
    $msg = '';

    // $aluno = Aluno::getSQL("SELECT * FROM aluno WHERE codigo = '".$parametro."'");
    $aluno = Aluno::getOne(['codigo' => $parametro]);

    // ***************************************88
    // $id = $parametro;

    // // Conexão com o banco de dados
    // $conn = new PDO("mysql:dbname=db_uaitec;host=localhost","root","") 
    //         or die("Problemas na conexão com o banco de dados.");

    // // echo $conn ? 'Conexão OK<br>' : 'Falha na conexão<br>';

    // // Selecionando fotos
    // $stmt = $conn->prepare('SELECT foto, nome, cpf FROM aluno WHERE codigo = :ID');
    // $stmt->bindParam(':ID', $id, PDO::PARAM_INT);
    // // $stmt->execute() or die(print_r($stmt->errorInfo(), true));

    // // Se executado
    // if ($stmt->execute()){

    //     // Alocando foto
    //     $foto = $stmt->fetchObject();

    //     var_dump($foto);

    //     // Se existir
    //     if ($foto != null)
    //     {
    //         // Definindo tipo do retorno
    //         header('Content-Type: '. $foto->tipo);
            
    //         // Retornando conteudo
    //         echo $foto->conteudo;
    //     }
    // }else{
    //     echo 'Não entrou no if';
    // }
    // **************************************

    loadTemplateView('page_personal', ['aluno' => $aluno, 'msg' => $msg]);
