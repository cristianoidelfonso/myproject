<?php
    session_start();
    requireValidSession(true); // original

    $users = User::get();

    loadTemplateView('manager_report',['nomes' => ['Cristiano','Idelfonso','Silva'], 'users' => $users, '']);
    