<?php
	require_once 'base.php';
	require_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'respostaBD.php';
  
	$id = $_GET['id'];
	$respBD = new RespostaBD();
  $resposta = $respBD->pesquisarRespostaPorId($id);
  $perguntaDescricao = $resposta->getPergunta()->getDescricao();
	$data =  $resposta->getData();
	$descricao = $resposta->getDescricao();

	$usuario = $resposta->getPergunta()->getUsuario();
    	


?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<title></title>
	
</head>
<body>
  
	<h1 style="color: black">Pergunta: </h1>
  <div>
			<p><?php 
      echo $perguntaDescricao 
      ?></p>
		</div>
	<h1 style="color: black">Dados da Resposta </h1>
	
	<div>
			<spam style="width: 100px; float: left;"><b>Data: </b></spam>
			<p><?php 
      echo $data 
      ?></p>
		</div>
		<div>
		
			<div  style="width: 100px; float: left;"><b>Descrição</b></div>
			<p><?php 
      echo $descricao 
      ?></p>
		</div>
		
		<div>
		
			<div  style="width: 100px; float: left;"><b>Usuário</b></div>
			<p>
        <?php 
        echo $usuario->getNome(); 
        ?>
      </p>
		</div>
		
			

	<a onclick="window.history.back()" class="btn btn-info">Voltar</a>
</body>
</html>