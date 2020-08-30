<?php
    session_start();
    requireValidSession();

    $conn = Database::getConnection();

    ## Lendo os valores
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Linhas exibidas por página
    $columnIndex = $_POST['order'][0]['column']; // Índice da coluna
    $columnName = $_POST['columns'][$columnIndex]['data']; // Nome da coluna
    $columnSortOrder = $_POST['order'][0]['dir']; // ascendente ou descendente
    $searchValue = $_POST['search']['value']; // Valor da pesquisa

    ## Pesquisa
    $searchQuery = " ";
    if($searchValue != ''){
	   $searchQuery = " AND (nome LIKE '%".$searchValue."%' OR cpf LIKE '%".$searchValue."%' OR email LIKE '%".$searchValue."%') ";
    }

    ## Número total de registros sem filtragem
    $sel = mysqli_query($conn,"SELECT COUNT(*) AS allcount FROM aluno");
    $records = mysqli_fetch_assoc($sel);
    $totalRecords = $records['allcount'];

    ## Número total de registros com filtragem
    $sel = mysqli_query($conn,"SELECT COUNT(*) as allcount FROM aluno WHERE 1 ".$searchQuery);
    $records = mysqli_fetch_assoc($sel);
    $totalRecordwithFilter = $records['allcount'];

    ## Buscar registros
    $empQuery = "SELECT * FROM aluno WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT ".$row.",".$rowperpage;
    $empRecords = mysqli_query($conn, $empQuery);
    $data = array();

    while ($row = mysqli_fetch_assoc($empRecords)) {
        $data[] = array(
    		"codigo"=>$row['codigo'],
    		"nome"=>$row['nome'],
    		"email"=>$row['email'],
    		"cpf"=>$row['cpf'],
    		"instituicao"=>strtoupper($row['instituicao']),
    		"nomeMae"=>$row['nomeMae'],
        );
    }

    ## Resposta
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );
    
    echo json_encode($response);
    