<?php

    echo getcwd().'<br>';
    
    chdir('assets/img/uploads/fotos');

    echo getcwd().'<br>';

    $alvo = 'C:\\wamp64\\www\\uaitec\\src\\uploads\\fotos\\';
    $atalho = 'fotos';
    $result = symlink($alvo, $atalho);

    echo $alvo.'<br>';

    echo $result ? 'ok' : 'não';
