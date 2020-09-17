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

        // echo ($conn) ? 'Conexão OK!' : 'Falha na conexão';

        $aluno = Aluno::getOne(['codigo' => $id_aluno], 'codigo,nome,cpf,foto,dataNasc,sexo,nomeMae');
        $alunoData = $aluno->getValues();

        var_dump($alunoData);
        
        // Recupera os dados dos campos
        $foto = $_FILES["foto"];

        echo '<pre>';
        print_r($foto);
        echo '</pre>';
        
        // Se a foto estiver sido selecionada
        if (!empty($foto["name"])) {
            
            // Largura máxima em pixels
            $largura = 1500;
            // Altura máxima em pixels
            $altura = 1800;
            // Tamanho máximo do arquivo em bytes
            $tamanho = 10000;
            $error = array();
            // Verifica se o arquivo é uma imagem
            if(!preg_match("/^image\/(pjpeg|jpeg|jpg|png|gif|bmp)$/", $foto["type"])){
                $error[1] = "Isso não é uma imagem.";
            } 
        
            // Pega as dimensões da imagem
            $dimensoes = getimagesize($foto["tmp_name"]);
        
            // Verifica se a largura da imagem é maior que a largura permitida
            if($dimensoes[0] > $largura) {
                $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }
            // Verifica se a altura da imagem é maior que a altura permitida
            if($dimensoes[1] > $altura) {
                $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }
            
            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            // if($foto["size"] > $tamanho) {
            //         $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            // }
            // Se não houver nenhum erro
            if (count($error) == 0) {
            
                // Pega extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|pjpeg|jpeg){1}$/i", $foto["name"], $ext);
                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                
                // Caminho de onde ficará a imagem
                //mkdir(dirname(__FILE__,2).'/uploads/fotos/',0755); // Criando o diretorio /uploads/fotos/
                if (is_dir(dirname(__FILE__,2).'/uploads/fotos/')){
                    chdir(dirname(__FILE__,2).'/uploads/fotos/'); // Acessa o diretorio /uploads/fotos/
                    mkdir($alunoData['cpf'] .'/',0755); // Criando o diretorio /uploads/fotos/cpf_aluno/
                }
                
                if (is_dir($alunoData['cpf'])) {
                    chdir($alunoData['cpf']); // Acessa o diretorio /uploads/fotos/cpf_aluno/
                }

                chdir(dirname(__FILE__,3).'/public');

                $caminho_imagem = dirname(__FILE__,2).'/uploads/fotos/'.$alunoData['cpf'].'/'.$nome_imagem;
                
                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
                die;
                // Insere os dados no banco
                $stmt = $conn->prepare("INSERT INTO usuarios (id,nome,email,foto) VALUES (NULL,:NOME,:EMAIL,:NOME_IMAGEM)");

                $stmt->bindParam(":NOME",$nome);
                $stmt->bindParam(":EMAIL",$email);
                $stmt->bindParam(":NOME_IMAGEM",$nome_imagem);
                
                // Se os dados forem inseridos com sucesso
                if ($stmt->execute()){
                    echo "Você foi cadastrado com sucesso.";
                    header("Refresh: 3;url=index.php");
                }else{
                    die(print_r($stmt->errorInfo(), true));
                }
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