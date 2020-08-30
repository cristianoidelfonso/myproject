<?php
    //echo 'Controller aluno!!!';
    //controller para cadastrar ou atualizar um curso
    session_start();
    requireValidSession();

    // if(isset($_SESSION['user'])){
    //     $user = $_SESSION['user'];
    //     if($_SESSION['user']->isAdmin === '1'){
    //         //echo "Usuário logado como administrador";
    //     }elseif($_SESSION['user']->isAdmin === '0'){
    //         //echo "Usuário logado mas não é administrador";
    //     }else{
    //         echo $requiresAdmin;
    //         addErrorMsg('Acesso negado!');
    //         header('Location: day_records.php');
    //         exit();
    //     }
    // }
    
    $exception = null;
    $alunoData = [];
    $idade = null;
/*
    INSERT INTO aluno 
    (codigo,cpf,identidade,certNasc,naturalidade,nome,sexo,raca,dataNasc,escolaridade,
    nomeMae,nomePai,necessidadeEspecial,email,senha,telefone,celular,trabalha,profissao,
    conhecInfor,possuiPC,logradouro,numero,bairro,cidade,estado,cep,responsavel,vinculo,
    cpfResponsavel,identidadeResponsavel,curso,dataMatricula,dataInicio,dias,horario,sala,usuario) 
    VALUES (0,'123.123.123-12','12.312.312','','Várzea da Palma - MG','Cristiano','M','Negro',
    '2000-10-20','Ensino médio completo','Maria','lourival','Não','cristiano@uaitec.com','uaitec','','',
    'Não','Estudante','Avançado','Sim','Rua Beta','1000','Centro','Várzea da Palma - MG','MG','39.260-000',
    '','','','','14/Arduino com Banco de Dados MySQL/47h','2020-01-28','2020-01-29','Segunda',
    '18:00 às 19:00 horas','Inclusão Digital 01','Cristiano Idelfonso da Silva');
*/

    if(count($_POST) === 0 && isset($_GET['update'])) {
        $aluno = Aluno::getOne(['codigo' => $_GET['update']]);
        $alunoData = $aluno->getValues();

        $idade = getIdade($alunoData['dataNasc']);
    
    } elseif(count($_POST) > 0) {
        try {
            $dbAluno = new Aluno($_POST);
            
            $dbAluno->codigo = isset($_REQUEST['update']) ? $_REQUEST['update'] : null ;
            //$dbAluno->codigo = intval($_POST['codigo']);

            if($dbAluno->codigo) {
                $dbAluno->update();
                addSuccessMsg('Cadastro alterado com sucesso!');
                header('Location: alunos.php');
                exit();
            } else {
                $idade = getIdade($dbAluno->dataNasc);
                $dbAluno->insert();
                addSuccessMsg('Aluno cadastrado com sucesso!');
                header('Location: alunos.php');
                exit();
            }
            $_POST = [];
        } catch(Exception $e) {
            $exception = $e;
        } finally {
            $alunoData = $_POST;
        }
    }
    
    loadTemplateView('save_aluno_tab', $alunoData + ['exception' => $exception, 'idade' => $idade]);
