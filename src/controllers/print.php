<?php
    session_start();
    requireValidSession();
    
    // $id = isset($_GET['print']) ? $_GET['print'] : 'null';

    $id_post = isset($_POST['id_print']) ? $_POST['id_print'] : 'null';

    // var_dump($_POST);
    // echo "<hr>";
    // var_dump($id_post);
    
    // echo "<hr>";
    // echo "Desmembrando a super global \$_POST" . "<br>";
    // $array_post = array();
    
    // foreach ($_POST as $a) {
    //     array_push($array_post, $a);
    // }
    
    // echo "<pre>";
    // print_r($array_post);
    // echo "<pre>";
    
    // echo "<hr>";
    
    // echo "<pre>";
    // print_r($_POST);
    // echo "<pre>";

    // die;
    
    if ($id_post) {
        // echo "<h1>Pesquisar o id {$id}</h1>";
        // $sql = "SELECT * FROM aluno WHERE codigo = {$id}";
        $sql = "SELECT * FROM aluno WHERE codigo = {$id_post}";
        $aluno = Aluno::getSQL($sql);

        // var_dump($aluno);
        // die;

    }else{
        echo '<strong>Não</strong> existe $id a pesquisar';
    }
    

    //referenciar o DomPDF com namespace
    use Dompdf\Dompdf;

    // include autoloader
    require_once(DOMPDF_PATH . "/autoload.inc.php");    

	//Criando a Instancia
	$dompdf = new DOMPDF();

    // $html = "Nada não"; 
    // Carrega seu HTML
    // $dompdf->loadHtmlFile($string);
	// $dompdf->loadHtml('<h1 style="text-align: center;">Exemplo - Gerar PDF</h1>'. $html .'.');

    ob_start();
    require_once (VIEW_PATH . '/ficha_matricula.php');
    loadView('ficha_matricula');
    $dompdf -> loadHTML(ob_get_clean());

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'Portrait');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"ficha_matricula.pdf", 
		array(
           "Attachment" => false //Para realizar o download somente alterar para true
		)
   );
