<?php
include '../base.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'respostaBD.php';

$codigo = $_GET['id'];

$resoostaBD = new RespostaBD();
$resoostaBD->removerResposta($codigo);

header('location: ../index.php');

