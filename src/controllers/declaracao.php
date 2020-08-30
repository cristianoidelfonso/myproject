<?php 

    session_start();
    requireValidSession();
   
    $id = isset($_GET['dec']) ? $_GET['dec'] : 'null';
    
    if ($id) {
        $aluno = Aluno::getSQL("SELECT * FROM aluno WHERE codigo = {$id}");
    }else{
        echo "<strong>Não</strong> existe código a pesquisar";
        exit;
    }
    
    //referenciar o DomPDF com namespace
    use Dompdf\Dompdf;

    // include autoloader
    require_once(DOMPDF_PATH . "/autoload.inc.php");    

	//Criando a Instancia
	$dompdf = new DOMPDF();

    ob_start();
    require_once (VIEW_PATH . '/declaracao.php');
    loadView('declaracao');
    $dompdf -> loadHTML(ob_get_clean());

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'Portrait');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"declaracao.pdf", 
		array(
           "Attachment" => false //Para realizar o download somente alterar para true
		)
   );
