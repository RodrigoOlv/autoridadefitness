<?php
class Padronizacao{

  public static function padronizarMaiMin($v){
    return ucwords(strtolower($v));
  }

  public static function padronizarMin($v){
    return strtolower($v);
  }

  public static function padronizarMai($v){
    return mb_strtoupper($v);
  }

  public static function padronizarTelefone($telefone){
    if (strlen($telefone) == 9 && substr($telefone, 4, 1) == " ") {
      $meio = substr($telefone, 0, 4);
      $fim = substr($telefone, 5, 4);
      return "$meio-$fim";
    }elseif(strlen($telefone) == 9){
      $inicio = substr($telefone, 0, 1);
      $meio = substr($telefone, 1, 4);
      $fim = substr($telefone, 5, 4);
      return "$inicio $meio-$fim";
    }elseif (strlen($telefone) == 8) {
      $meio = substr($telefone, 0, 4);
      $fim = substr($telefone, 4, 4);
      return "$meio-$fim";
    }elseif (strlen($telefone) == 11) {
      $inicio = substr($telefone, 0, 1);
      $meio = substr($telefone, -9, 4);
      $fim = substr($telefone, -4, 4);
      return "$inicio $meio-$fim";
    }//elseif
  }//function

  public static function paradronizarDDD($dd){
    if(strlen($dd) == 2) return "($dd)";
  }

  public static function padronizarCPF($cpf){
    if(strlen($cpf) == 11){
      $a = substr($cpf, 0, 3);
      $b = substr($cpf, 3, 3);
      $c = substr($cpf, 6, 3);
      $d = substr($cpf, 9, 2);
      return "$a.$b.$c-$d";
    }//if
  }//function

  public static function padronizarNumCartao($num, $bandeira){
    if($bandeira == "MasterCard"
      || $bandeira == "Visa"
      || $bandeira == "Discover"
      || $bandeira == "JCB"
      || $bandeira == "Elo"){
      $a = substr($num, 0, 4);
      $b = substr($num, 4, 4);
      $c = substr($num, 8, 4);
      $d = substr($num, 12, 4);
      return "$a $b $c $d";
    }elseif($bandeira == "American Express"){
      $a = substr($num, 0, 4);
      $b = substr($num, 4, 6);
      $c = substr($num, 10, 5);
      return "$a $b $c";
    }elseif($bandeira == "Diners Club"){
      $a = substr($num, 0, 4);
      $b = substr($num, 4, 6);
      $c = substr($num, 10, 4);
      return "$a $b $c";
    }elseif($bandeira == "enRoute"){
      $a = substr($num, 0, 4);
      $b = substr($num, 4, 7);
      $c = substr($num, 11, 4);
      return "$a $b $c";
    }elseif($bandeira == "Voyager"){
      $a = substr($num, 0, 5);
      $b = substr($num, 5, 4);
      $c = substr($num, 9, 5);
      $d = substr($num, 14, 1);
      return "$a $b $c $d";
    }//elseif
  }//function
}//class
