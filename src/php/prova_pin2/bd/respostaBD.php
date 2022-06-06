<?php

include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'conexao.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'usuarioBD.php';
include_once DIR_BASE.'bd'.DIRECTORY_SEPARATOR.'perguntaBD.php';
include_once DIR_BASE.'classes'.DIRECTORY_SEPARATOR.'resposta.php';

class RespostaBD{
  private $conn;
    
  function __construct(){
      $conexao = new Conexao();
      $this->conn = $conexao->getConexao();
  }
  public function pesquisarTodasRespostasPorPergunta($id)
    {
        $comandoSQL = "SELECT * FROM resposta where idpergunta=$id";
        $resultado = $this->conn->query($comandoSQL);
       
        $respostas = [];
        foreach ($resultado as $umRegistro) {
            $resposta = new Resposta();
            $resposta->setCodigo($umRegistro['id']);
            $resposta->setDescricao($umRegistro['descricao']);
            $resposta->setData($umRegistro['data']);
            $respostas[] = $resposta;
        }
      
        return $respostas;
    }

    public function inserirResposta(Resposta $resposta){
      $comandoSQL = "INSERT INTO resposta (descricao,  idpergunta, idusuario) VALUES (?, ?, ?)";
      $idPerginta = $resposta->getPergunta()->getCodigo();
      $idUsuario = $resposta->getPergunta()->getCodigo();
      $st = $this->conn->prepare($comandoSQL);
      $resultado = $st->execute(array(
        $resposta->getDescricao(),
        $idPerginta,
        $idUsuario
      ));
    
      
      return $resultado;
          
  }

  public function pesquisarRespostaPorId($id)
  {
      $comandoSQL = "SELECT * FROM resposta where id=$id";
      $umRegistro = $this->conn->query($comandoSQL)->fetch();


      $resposta = new Resposta();
      $resposta->setCodigo($umRegistro['id']);
      $resposta->setDescricao($umRegistro['descricao']);
      $resposta->setData($umRegistro['data']);
     
      $perguntaBD = new PerguntaBD();
      $pergunta = $perguntaBD->pesquisarPerguntaPorId($umRegistro['idpergunta']);
      $resposta->setPergunta($pergunta);
    
      return $resposta;
  }
  public function removerResposta($id){
    try {
        
       
        $this->conn->beginTransaction();
        
        $comandoSQL = "delete from  resposta where id=?";
        $st = $this->conn->prepare($comandoSQL);
        $resultado = $st->execute(array(
            $id
        ));
        
        
        $this->conn->commit();
    } catch (Exception $e) {
        $this->conn->rollBack();
    }
    
    return $resultado;
}

}