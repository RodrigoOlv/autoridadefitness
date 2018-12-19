<?php
class Contato{

  private $id;
  private $nome;
  private $email;
  private $mensagem;

  public function __construct(){}
  public function __destruct(){}

  public function __get($atrib){
    return $this->$atrib;
  }

  public function __set($atrib, $valor){
    $this->$atrib = $valor;
  }

  public function __toString(){
    return nl2br("Nome: $this->nome,
                  Email: $this->email,
                  Mensagem: $this->mensagem");
  }
}
