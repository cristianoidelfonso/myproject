<?php

    session_start();
    requireValidSession();

    $id_aluno = $_POST['id_aluno']; 
    $alunoData = [];

    // Se o usuário clicou no botão cadastrar efetua as ações
    if (isset($_POST['cadastrar'])) {

        $aluno = Aluno::getOne(['codigo' => $id_aluno], 'codigo,nome,cpf,foto,dataNasc,sexo,nomeMae');
        $alunoData = $aluno->getValues();
        
        // Recupera os dados dos campos
        $foto = $_FILES["foto"];

        // echo '<pre>';
        // print_r($foto);
        // echo '</pre>';
        
        // Se a foto estiver sido selecionada
        if (!empty($foto["name"])) {
            
            // Largura máxima em pixels
            $largura = 150;
            // Altura máxima em pixels
            $altura = 180;
            // Tamanho máximo do arquivo em bytes
            $tamanho = 1000;

            $error = array();

            // Verifica se o arquivo é uma imagem
            if(!preg_match("/^image\/(jpg|pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
                $error[1] = "Isso não é uma imagem.";
            } 
        
            // Pega as dimensões da imagem
            $dimensoes = getimagesize($foto["tmp_name"]);
        
            // Verifica se a largura da imagem é maior que a largura permitida
            // if($dimensoes[0] > $largura) {
            //     $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            // }

            // Verifica se a altura da imagem é maior que a altura permitida
            // if($dimensoes[1] > $altura) {
            //     $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            // }
            
            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            // if($foto["size"] > $tamanho) {
            //         $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            // }

            // Se não houver nenhum erro
            if (count($error) == 0) {
            
                // Pega extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
                
                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                echo $nome_imagem . '<br>';
                
                // Caminho de onde ficará a imagem
                $caminho_imagem = "fotos/" . $nome_imagem;
                echo $caminho_imagem . '<br>';

                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
            
                // Insere os dados no banco
                //$sql = mysql_query("INSERT INTO usuarios VALUES ('', '".$nome."', '".$email."', '".$nome_imagem."')");
            
                // Se os dados forem inseridos com sucesso
                // if ($sql){
                //     echo "Você foi cadastrado com sucesso.";
                // }
            }
        
            // Se houver mensagens de erro, exibe-as
            if (count($error) != 0) {
                foreach ($error as $erro) {
                    echo $erro . "<br />";
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