<?php
class Cliente{

  private $idCliente;
  private $nome;
  private $email;
  private $cpf;
  private $ddd;
  private $telefone;
  private $numCartao;
  private $nomeCartao;
  private $mm;
  private $aa;
  private $codigoSeguranca;
  private $bandeira;

  public function __construct(){}
  public function __destruct(){}

  public function __get($atrib){
    return $this->$atrib;
  }

  public function __set($atrib, $valor){
    $this->$atrib = $valor;
  }

  public function __toString(){
    return nl2br("Nome: $this->nome
                  Email: $this->email
                  CPF: $this->cpf
                  DDD: $this->ddd
                  Telfone: $this->telefone
                  Número do Cartão: $this->numCartao
                  Nome do Cartão: $this->nomeCartao
                  Data: $this->mm.$this->aa
                  Código de Segurança: $this->codigoSeguranca
                  Bandeira: $this->bandeira");
  }
}
