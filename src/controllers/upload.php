<?php

    session_start();
    requireValidSession();

    $id_aluno = $_POST['id_aluno']; 
    $alunoData = [];

    // Se o usuário clicou no botão cadastrar efetua as ações
    if (isset($_POST['cadastrar'])) {
    
        // Conexão com o banco de dados
        $conn = new PDO("mysql:dbname=db_uaitec;host=localhost","root","") 
                or die("Problemas na conexão com o banco de dados.");

        $aluno = Aluno::getOne(['codigo' => $id_aluno], 'codigo,nome,cpf,foto,dataNasc,sexo,nomeMae');
        $alunoData = $aluno->getValues();
            
        // Recupera os dados dos campos
        $foto = $_FILES['foto']; 

        // Se a foto estiver sido selecionada
        if (!empty($foto['name'])) {
            
            // Largura máxima em pixels
            $largura = 1500;
            // Altura máxima em pixels
            $altura = 1800;
            // Tamanho máximo do arquivo em bytes
            $tamanho = 10000;
            $error = array();
            // Verifica se o arquivo é uma imagem
            if(!preg_match("/^image\/(pjpeg|jpeg|jpg|png|gif|bmp)$/", $foto['type'])){
                $error[1] = 'Isso não é uma imagem.';
            } 
        
            // Pega as dimensões da imagem
            $dimensoes = getimagesize($foto['tmp_name']);
        
            // Verifica se a largura da imagem é maior que a largura permitida
            if($dimensoes[0] > $largura) {
                $error[2] = 'A largura da imagem não deve ultrapassar '.$largura.' pixels';
            }
            // Verifica se a altura da imagem é maior que a altura permitida
            if($dimensoes[1] > $altura) {
                $error[3] = 'Altura da imagem não deve ultrapassar '.$altura.' pixels';
            }
            
            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            // if($foto["size"] > $tamanho) {
            //         $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            // }
            // Se não houver nenhum erro
            if (count($error) == 0) {
            
                // Pega extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|pjpeg|jpeg){1}$/i", $foto['name'], $ext);
                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." .strtolower($ext[1]);
               
                // Caminho de onde ficará a imagem
                // mkdir(dirname(__FILE__,2).'/uploads/fotos/',0777); // Criando o diretorio /uploads/fotos/
                if (is_dir(dirname(__DIR__).'/uploads/fotos/')){
                    chmod (dirname(__DIR__)."/uploads/fotos/", 0777);
                    chdir(dirname(__DIR__).'/uploads/fotos/'); // Acessa o diretorio /uploads/fotos/
                    
                    $dir_aluno = preg_replace("(\.|\-)","",$alunoData['cpf']);
                    
                    if( !file_exists($dir_aluno) ){ // Criando o diretorio /uploads/fotos/cpf_aluno/
                        mkdir($dir_aluno, 0777); // Criando o diretorio /uploads/fotos/cpf_aluno/
                    }else{
                        $linhas = scandir($dir_aluno);
                        if(sizeof($linhas) != 0){
                            foreach ($linhas as $linha) {
                                $arq = dirname(__FILE__, 2).'/uploads/fotos/'.$dir_aluno.'/'.$linha;
                                unlink($arq) . '<br>' . PHP_EOL;
                            }
                        }
                    }
                }
    
                chdir(dirname(__DIR__,2).'/public');

                // $caminho_imagem = dirname(__DIR__).'/uploads/fotos/'.preg_replace("(\.|\-)", "", $alunoData['cpf']).'/'.$nome_imagem;
                $caminho_imagem = dirname(__DIR__).'/uploads/fotos/'.$dir_aluno.'/'.$nome_imagem;

    // // Transformando foto em dados (binário)
    // $conteudo = file_get_contents($foto['tmp_name']);

    // // Preparando comando
    // $stmt = $conn->prepare("UPDATE aluno SET foto=:CONTEUDO WHERE codigo=:CODIGO AND cpf=:CPF");
    // $stmt->bindParam(':CONTEUDO', $conteudo, PDO::PARAM_LOB);
    // $stmt->bindParam(":CODIGO",$alunoData['codigo'], PDO::PARAM_INT);
    // $stmt->bindParam(":CPF",$alunoData['cpf'], PDO::PARAM_STR);

                // Insere os dados no banco
                $stmt = $conn->prepare("UPDATE aluno SET foto=:NOME_IMAGEM WHERE codigo=:CODIGO AND cpf=:CPF");

                // $stmt->bindParam(":NOME_IMAGEM",$caminho_imagem);
                $stmt->bindParam(":NOME_IMAGEM",$nome_imagem);
                $stmt->bindParam(":CODIGO",$alunoData['codigo']);
                $stmt->bindParam(":CPF",$alunoData['cpf']);
                
                // Se os dados forem inseridos com sucesso
                if ($stmt->execute()){
                    // Faz o upload da imagem para seu respectivo caminho
                    move_uploaded_file($foto['tmp_name'], $caminho_imagem);
                    echo 'Foto do aluno atualizada com sucesso';
                    header('Refresh: 3; url=/');
                }else{
                    echo 'ERROR<br>';
                    die(print_r($stmt->errorInfo(), true));
                }
            }
        
            // Se houver mensagens de erro, exibe-as
            if (count($error) != 0) {
                foreach ($error as $erro) {
                    echo $erro . '<br />';
                }
            }
        }
    }

?>
<form action="add_arquivo.php" method="post">
    <input type="hidden" name="id_add_arquivo" value="<?php echo $id_aluno?>">
    <div class="message">
        <input type="submit" name="id" value="<?php echo 'Voltar'?>">
    </div>
</form>
<!-- <div class="message"><a class="btn btn-lg btn-primary" href="add_arquivo.php?id_aluno=<?php //echo $id_aluno?>">Voltar</a></div> -->