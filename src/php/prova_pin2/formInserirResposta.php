<?php
include_once 'base.php';
require_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'perguntaBD.php';
require_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'usuarioBD.php';


$codigo = $_GET['id'];


$perguntaBD= new PerguntaBD();
$pergunta = $perguntaBD->pesquisarPerguntaPorId($codigo);



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Nova Resposta</title>
<link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<form class="form-horizontal" method="POST"	action="dados/salvarResposta.php">
		<br>
		<h1 align="center">Cadastro de Resposta</h1>
		<br>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-5">
				 <label for="pergunta">Pergunta:</label>			
				 
				 <select class="form-control" name="pergunta" id="pergunta">

				<?php

				    echo "<option value='{$pergunta->getCodigo()}'>".$pergunta->getDescricao()."</option>";

				?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-5">
				 <label for="usuario">Usuario:</label>			
				 
				 <select class="form-control" name="usuario" id="usuario">

				<?php

				    echo "<option value='{$pergunta->getUsuario()->getCodigo()}'>".$pergunta->getUsuario()->getNome()."</option>";

				?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-7">
			<label for="descricao">Descrição:</label>			
				<textarea class="form-control" rows="5"  name="descricao" id="descricao"></textarea>
			</div>
		</div>
	

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" value="Salvar" class="btn btn-primary">
				<button name="cancelar" onClick="JavaScript: window.history.back();"
					type="button" class="btn btn-primary">Cancelar</button>
			</div>
		</div>
	</form>
	
</body>
</html>