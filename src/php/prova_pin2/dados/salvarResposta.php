

<?php
include '../base.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'pergunta.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'usuario.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'categoria.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'respostaBD.php';

$descricao = $_POST['descricao'];


$idpergunta = $_POST['pergunta'];


$idusuario = $_POST['usuario'];


$resposta = new Resposta();
$resposta->setDescricao($descricao);

$pergunta = new Pergunta();
$pergunta->setCodigo($idpergunta);
$resposta->setPergunta($pergunta);

$usuario = new Usuario();
$usuario->setCodigo($idusuario);

$resposta->setUsuario($idusuario);

$respostaBD = new RespostaBD();

$resultado = $respostaBD->inserirResposta($resposta);
   

echo '<script> location.replace("../index.php"); </script>';

