<?php 
    
    session_start();
    requireValidSession();

    $parametro = isset($_POST['cpf']) ? $_POST['cpf']  : null;

    $conn = Database::getConnection();
    $sql = "SELECT * FROM aluno WHERE cpf = '".$parametro."'";
    
    $result = $conn->query($sql);

    $row = $result->fetch_array(MYSQLI_ASSOC);
        
    // $result->close();

    #Se o retorno for maior do que zero, diz que já existe um.
    if(mysqli_num_rows($result) > 0){ 
        $retorno = array('x' => TRUE, 'cpf' => $parametro, 'msg' => 'CPF JÁ CADASTRADO!', 'row' => $row); 
    }else{ 
        $retorno = array('x' => FALSE, 'cpf' => $parametro, 'msg' => 'CPF NÃO CADASTRADO!');
    }

    echo json_encode($retorno);
        