<?php
    session_start();
    requireValidSession(true);
    
    $currentDate = new DateTime();
    
    $user = $_SESSION['user'];
    $selectedUserId = $user->codigo;
    
    $users = null;
    
    if($user->isAdmin) {
        $users = User::get();
        $selectedUserId = isset($_POST['user']) ? $_POST['user'] : $user->codigo;
    }
    
    $arr_meses = array(
        '01' => 'Janeiro',
        '02' => 'Fevereiro',
        '03' => 'Março',
        '04' => 'Abril',
        '05' => 'Maio',
        '06' => 'Junho',
        '07' => 'Julho',
        '08' => 'Agosto',
        '09' => 'Setembro',
        '10' => 'Outubro',
        '11' => 'Novembro',
        '12' => 'Dezembro'
       );
    
    $report = array(1, 2, 3, 4);
    
    loadTemplateView('monthly_report', [
        'users' => $users,
        'report' => $report,
        'meses' => $arr_meses,
        'sumOfWorkedTime' => 'Teste 1',
        'balance' => "Teste 2",
    ]);
    