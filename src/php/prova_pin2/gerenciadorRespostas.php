<?PHP 

require_once 'base.php';

require_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'respostaBD.php';

$id = $_GET['id'];
$pBD = new PerguntaBD();

$pergunta = $pBD->pesquisarPerguntaPorId($id);
$data =  $pergunta->getData();
$descricao = $pergunta->getDescricao();
$categoria = $pergunta->getCategoria()->getDescricao();
$usuario = $pergunta->getUsuario();

$rBD = new RespostaBD();

$listaRespostas = $rBD->pesquisarTodasRespostasPorPergunta($id);
?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<style>
/* Tooltip container */
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
}

/* Tooltip text */
.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;
 
    /* Position the tooltip text - see examples below! */
    position: absolute;
    z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>
	
	<title>Prova 1</title>
	

	 
</head>

<body>

  <h1 style="color: black">Gerencia Respostas </h1>
	
    <div>
      <div  style="width: 100px; float: left;"><b>Perguta:</b></div>
      <p><?php echo $descricao ?></p>
    </div>
    <div>
			<spam style="width: 100px; float: left;"><b>Data: </b></spam>
			<p><?php echo $data ?></p>
		</div>
		<div>
		
			<div  style="width: 100px; float: left;" ><b>Categoria</b></div>
			<p><?php echo $categoria; ?></p>
		</div>
		<div>
		
			<div  style="width: 100px; float: left;"><b>Usuário</b></div>
			<p><?php echo $usuario->getNome(); ?></p>
		</div>
		
	<table class="table table-striped table-bordered" id="listagemPerguntas">
	  <thead>
	    <tr>
	      <th scope="col">Data</th>
	      <th scope="col">Usuario</th>
	      <th scope="col">Resposta</th>
	      <th scope="col">Detalhes</th>
	    </tr>
	  </thead>
	  <tbody>
    <?php
	    	 
				 $aux = 1;
				 foreach ($listaRespostas as $umRegistro) {
						 $codigo = $umRegistro->getCodigo();
				 
						 $dataResposta = $umRegistro->getData();
						 $dataObj = new DateTime($dataResposta);
						 $dataForm = $dataObj->format("d/m/Y");
						 
						 $descricao = $umRegistro->getDescricao();
					
	    	 ?>

			<tr>
				<td>
          <?php 
          echo $dataForm;
          ?>
        </td>
				<td>
          <?php 
          echo $usuario->getNome();
          ?>
        </td>
				<td>
          <?php 
          echo $descricao;
          ?>
        </td>
			
				<td>
				
					<a href="visualizarResposta.php?id=<?php echo $codigo; ?>" > 
						<span class="glyphicon glyphicon-eye-open" data-toggle="tooltip"  title="Abrir Detalhes"></span>
					</a>
					<a href="dados/removerResposta.php?id=<?php echo $codigo; ?>" > <span class="glyphicon glyphicon-remove"  data-toggle="tooltip"  title="Remover"></span></a>
					
				</td>
			</tr>

			<?php 
					
				}
			 ?>

	      
	  </tbody>
	  
	</table>

	<a class="btn btn-info" href="formInserirResposta.php?id=<?php echo $id; ?>">Nova Resposta</a>
	
	
	
	
	
</body>
</html>