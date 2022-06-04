<?php
class Connect{
  public function getConnect(){
    try{

      $con = new PDO("mysql:host=mysql;dbname=aluno","root", "aluno");
      echo "Conexão ok!";
    }catch(Exception $e){
      echo $e->getMessage();
    }
  }
}
$testConnect = new Connect();
$testConnect->getConnect();