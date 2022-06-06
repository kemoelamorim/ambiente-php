<?php

class Conexao
{
    private $conn;
    
    function __construct()
    {
		
        $this->conn = new PDO('mysql:host=mysql;dbname=prova_pin2','root','aluno');
		
    }
    
    function getConexao(){
        return $this->conn;
    }
}