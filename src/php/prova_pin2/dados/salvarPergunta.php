<?php
include '../base.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'pergunta.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'usuario.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'categoria.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'perguntaBD.php';

$codigoUsuario = (int)$_POST['usuario'];
$codigoCategoria = $_POST['categoria'];
$descricao = $_POST['descricao'];

$pergunta = new Pergunta();
$pergunta->setDescricao($descricao);

$usuario = new Usuario();
$usuario->setCodigo($codigoUsuario);
$pergunta->setUsuario($usuario);

$categoria = new Categoria();
$categoria->setCodigo($codigoCategoria);
$pergunta->setCategoria($categoria);

$perguntaBD = new PerguntaBD();

$resultado = $perguntaBD->inserirPergunta($pergunta);

header('Location: ../index.php');
   

