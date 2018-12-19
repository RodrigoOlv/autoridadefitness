<?php
require_once "conexaobanco.class.php";

class ClienteDAO {

	private $conexao = null;

	public function __construct(){
		$this->conexao = ConexaoBanco::getInstance();
	}

	public function __destruct(){}

	public function cadastrarCliente($cli){
		try{
			$stat = $this->conexao->prepare("insert into cliente(numid, txtnome, txtemail, numcpf, txtddd, txttelefone, txtnumcartao, txtnomecartao, nummm, numaa, numcodigo, txtbandeira) values(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stat->bindValue(1, $cli->nome);
			$stat->bindValue(2, $cli->email);
			$stat->bindValue(3, $cli->cpf);
      $stat->bindValue(4, $cli->ddd);
      $stat->bindValue(5, $cli->telefone);
			$stat->bindValue(6, $cli->numCartao);
			$stat->bindValue(7, $cli->nomeCartao);
      $stat->bindValue(8, $cli->mm);
			$stat->bindValue(9, $cli->aa);
      $stat->bindValue(10, $cli->codigoSeguranca);
      $stat->bindValue(11, $cli->bandeira);
			$stat->execute();
		}catch(PDOException $e){
			echo "Erro ao cadastrar cliente!" . $e;
		}//catch
	}//cadastrar
}//fecha classe
