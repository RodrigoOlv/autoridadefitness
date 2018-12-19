<?php
class Validacao{

  public static function validarNome($v){
    $exp = "/^[A-zÁ-ù ]{2,50}$/";
    return preg_match($exp, $v);
  }

  public static function validarEmail($v){
    return filter_var($v, FILTER_VALIDATE_EMAIL);
  }

  public static function validarCPF($cpf){
    // Verifica se um número foi informado
  	if(empty($cpf)) {
  		return false;
  	}

  	// Elimina possivel mascara
  	$cpf = preg_replace("/[^0-9]/", "", $cpf);
  	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

  	// Verifica se o numero de digitos informados é igual a 11
  	if (strlen($cpf) != 11) {
  		return false;
  	}
  	// Verifica se nenhuma das sequências invalidas abaixo foi digitada. Caso afirmativo, retorna falso
  	else if ($cpf == '00000000000' ||
  		$cpf == '11111111111' ||
  		$cpf == '22222222222' ||
  		$cpf == '33333333333' ||
  		$cpf == '44444444444' ||
  		$cpf == '55555555555' ||
  		$cpf == '66666666666' ||
  		$cpf == '77777777777' ||
  		$cpf == '88888888888' ||
  		$cpf == '99999999999') {
  		return false;
  	 // Calcula os digitos verificadores para verificar se o CPF é válido
  	 } else {

  		for ($t = 9; $t < 11; $t++) {

  			for ($d = 0, $c = 0; $c < $t; $c++) {
  				$d += $cpf{$c} * (($t + 1) - $c);
  			}
  			$d = ((10 * $d) % 11) % 10;
  			if ($cpf{$c} != $d) {
  				return false;
  			}
  		}

  		return $cpf;
  	}
  }//validar cpf

  public static function validarDDD($v){
    $exp = "/^([\d]{2}|[(][\d]{2}[)])$/";
    return preg_match($exp, $v);
  }

  public static function validarTelefone($v){
    $exp = "/^([\d]{8,9}|[\d]{1}[- ]{1}[\d]{4}[- ]{1}[\d]{4})$/";
    return preg_match($exp, $v);
  }

  public static function validarNumCartao($v){
    $exp = "/^[\d]{14,16}$/";
    return preg_match($exp, $v);
  }
}
