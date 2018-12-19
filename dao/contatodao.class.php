<?php
require_once 'conexaobanco.class.php';

class ContatoDAO{
  private $conexao = null;

	public function __construct(){
		$this->conexao = ConexaoBanco::getInstance();
	}

	public function __destruct(){}

	public function cadastrarContato($con){
		try{
			$stat = $this->conexao->prepare("insert into contato(idmsg, txtnome, txtemail, txtmensagem) values(null, ?, ?, ?)");
			$stat->bindValue(1, $con->nome);
			$stat->bindValue(2, $con->email);
			$stat->bindValue(3, $con->mensagem);
			$stat->execute();
		}catch(PDOException $e){
			echo "Erro ao enviar sua mensagem!" . $e;
		}//catch
	}//cadastrar
}
