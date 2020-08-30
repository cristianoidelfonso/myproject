<?php

class Database {
    
   public static function getConnection() {
      $envPath = realpath(dirname(__FILE__) . '/../env.ini');
      $env = parse_ini_file($envPath);
      $conn = new mysqli($env['host'], $env['username'], $env['password'], $env['database']);

      if (!$conn) {
         echo 'Não foi possível conectar ao banco MySQL.';
         exit;
      } else {
         //echo 'Parabéns!! A conexão ao banco de dados ocorreu normalmente!.';
         //die ('Parabéns!! A conexão ao banco de dados ocorreu normalmente!.');
      }
      
      if($conn->connect_error) {
         //echo "Erro na conexão!";
         die("Erro: " . $conn->connect_error);
      }
      mysqli_set_charset( $conn, 'utf8');
      return $conn;
   }
    
   public static function getResultFromQuery($sql) {
      $conn = self::getConnection();
      $result = $conn->query($sql);
      $conn->close();
      return $result;
   }

   public static function executeSQL($sql) {
      $conn = self::getConnection();
      if(!mysqli_query($conn, $sql)) {
         throw new Exception(mysqli_error($conn));
      }
      $id = $conn->insert_id;
      $conn->close();
      return $id;
   }

   public static function backup(){
      
      $envPath = realpath(dirname(__FILE__) . '/../env.ini');
      $env = parse_ini_file($envPath);

      // $env['host'], $env['username'], $env['password'], $env['database']

      $toDay = BACKUP_PATH . "/" . date('d-m-Y-H-i-s') . ".sql";

      $dbhost = $env['host'];
      $dbuser = $env['username'];
      $dbpass = $env['password'];
      $dbname = $env['database'];

      // exec("C:\wamp64\bin\mysql\mysql5.7.26\bin\mysqldump --user=$dbuser --password='$dbpass' --host=$dbhost $dbname > " . $toDay . ".sql");
      $result = shell_exec("C:\wamp64\bin\mysql\mysql5.7.26\bin\mysqldump.exe --user=$dbuser --password=$dbpass --add-drop-database -B $dbname > $toDay");
   
      $limit = self::limitBackup();

   }

   private static function limitBackup(){
      // Quantidade de arquivos para manter no diretório
      $files_qty = 5;

      // Diretório base
      // $dir_base = dirname(__FILE__) . DIRECTORY_SEPARATOR;
      $dir_base = BACKUP_PATH . DIRECTORY_SEPARATOR;

      // Inicia iteração no diretório
      $iterator = new DirectoryIterator($dir_base);
      foreach ($iterator as $fileinfo) {
         if ($fileinfo->isFile()) {
            /*
            Guarda os dados num array.
            As chaves do array são números inteiros criados automaticamente.
            O valor de cada array guarda a data de modificação/criação, em formato timestamp, do arquivo contatenado com o nome do mesmo.
            Exemplo: "1423409607 - arquivo_test.php" (sem aspas)
            */
            $arr[] = $fileinfo->getMTime() . ' - ' . $fileinfo->getFilename();
         }
      }

      // Verifica se o carray contém mais de 3 ítens.
      if ($arr > $files_qty) {
         /*
        Reverte a ordenação do array baseado na string.
        É por isso que o timestamp é salvo concatenado ao nome do arquivo. Para facilitar nesse momento de ordenação e aplicação do array_slice()
        */
         rsort($arr);

         /*
        Aplicando a função array_slice(), a qual removerá os 3 primeiros da lista.
        A idéia é manter no array somente os nomes dos arquivos que devem ser excluídos.
        A função array_slice() é similar a função substr(), só que é usada para arrays.
        */
         $arr = array_slice($arr, $files_qty);

         /*
        Itera pelo array resultante, excluindo todos os arquivos contidos na lista.
        */
         foreach ($arr as $v) {
            // Apenas para debugar
            echo PHP_EOL . $dir_base . substr($v, 13);

            /*
            Descomente a linha abaixo para proceder.
            Cuidado onde for executar pois os arquvios são excluídos permamentemente.
            A função substr() é necessária para pular a string que contém o timestamp e os caracteres separadores ( - ). O real nome do arquivo inicia a partir do 14º caracter.
            */
            unlink( $dir_base . substr( $v, 13 ) );
         }
      }
   }
   
}