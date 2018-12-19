<?php
  session_start();
  ob_start();

  include 'view/header.html';

  $aa = date('y');
?>

<div class="bg-warning">
  <div class="container">

    <div class="row container-fluid d-flex flex-row pb-5 pl-5">
      <div class="col-md-6 p-2 d-flex">
      </div>
      <div class="col-md-6 p-2 d-flex">
      </div>
    </div>

    <h1 class="h2 text-center text-light font-weight-light pt-5 pb-5">Cadastre-se para ter acesso a <strong>todos</strong> os programas da plataforma</h1>

    <form name="cadcliente" method="post" action="" class="pb-5">
      <div class="form-group">
        <input type="text" name="txtnome" placeholder="Seu Nome" class="form-control">
      </div>
      <div class="form-group">
        <input type="text" name="txtemail" placeholder="Seu email" class="form-control">
      </div>
      <div class="row">
        <div class="form-group col-md-5">
          <input type="number" name="numcpf" placeholder="CPF" class="form-control">
        </div>
        <div class="form-group col-md-1">
        </div>
        <div class="form-group col-md-2">
          <input type="number" name="numddd" placeholder="DDD" class="form-control">
        </div>
        <div class="form-group col-md-4">
          <input type="number" name="numtelefone" placeholder="Telefone" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <input type="number" name="numnumerocartao" placeholder="Número do cartão" class="form-control">
      </div>
      <div class="form-group">
        <input type="text" name="txtnomecartao" placeholder="Nome no cartão" class="form-control">
      </div>
      <div class="row">
        <div class="form-group col-md-2">
          <select name="selmm" class="form-control">
            <option value="MM">MM</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <select name="selaa" class="form-control">
            <option value="AA">AA</option>
            <option value="<?php echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
            <option value="<?php $aa++; echo $aa ?>"><?php echo $aa ?></option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <input type="number" name="numcodigoseguranca" placeholder="Código de segurança" class="form-control">
        </div>
        <div class="form-group col-md-4">
          <select name="selcartao" class="form-control">
            <option value="MasterCard">MasterCard</option>
            <option value="Visa">Visa</option>
            <option value="American Express">American Express</option>
            <option value="Diners Club">Diners Club</option>
            <option value="Discover">Discover</option>
            <option value="enRoute">enRoute</option>
            <option value="JCB">JCB</option>
            <option value="Voyager">Voyager</option>
            <option value="Elo">Elo</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-dark">
        <input type="submit" name="voltar" value="Voltar" class="btn btn-dark">
      </div>
    </form>
  </div>
</div>

<?php
  if(isset($_POST['cadastrar'])){

    include 'model/cliente.class.php';
    include 'dao/clientedao.class.php';
    require_once 'util/helper.class.php';
    require_once 'util/padronizacao.class.php';
    require_once 'util/validacao.class.php';

    $qtdErros = 0;

    if(!Validacao::validarNome($_POST['txtnome'])){
      Helper::alert("Nome inválido!");
      $qtdErros++;
    }elseif(!Validacao::validarEmail($_POST['txtemail'])) {
      Helper::alert("Email inválido!");
      $qtdErros++;
    }elseif (!Validacao::validarCPF($_POST['numcpf'])) {
      Helper::alert("CPF inválido!");
      $qtdErros++;
    }elseif (!Validacao::validarDDD($_POST['numddd'])) {
      Helper::alert("DDD inválido!");
      $qtdErros++;
    }elseif (!Validacao::validarTelefone($_POST['numtelefone'])) {
      Helper::alert("Telefone inválido!");
      $qtdErros++;
    }elseif (!Validacao::validarNumCartao($_POST['numnumerocartao'])) {
      Helper::alert("Número inválido!");
      $qtdErros++;
    }elseif (!Validacao::validarNome($_POST['txtnomecartao'])) {
      Helper::alert("Nome do cartão inválido!");
      $qtdErros++;
    }

    if($qtdErros == 0){

      $cli = new Cliente();

      $cli->nome = Padronizacao::padronizarMaiMin($_POST['txtnome']);
      $cli->email = Padronizacao::padronizarMin($_POST['txtemail']);
      $cli->cpf = padronizacao::padronizarCPF($_POST['numcpf']);
      $cli->ddd = padronizacao::paradronizarDDD($_POST['numddd']);
      $cli->telefone = Padronizacao::padronizarTelefone($_POST['numtelefone']);
      $cli->numCartao = Padronizacao::padronizarNumCartao($_POST['numnumerocartao'], $_POST['selcartao']);
      $cli->nomeCartao = Padronizacao::padronizarMaiMin($_POST['txtnomecartao']);
      $cli->mm = Padronizacao::padronizarMai($_POST['selmm']);
      $cli->aa = Padronizacao::padronizarMai($_POST['selaa']);
      $cli->codigoSeguranca = $_POST['numcodigoseguranca'];
      $cli->bandeira = $_POST['selcartao'];

      // var_dump($cli);

      $cliDAO = new ClienteDAO();

      $cliDAO->cadastrarCliente($cli);

      Helper::alert('Cadastro realizado com sucesso');
    }//zero erros
  }//post

  if(isset($_POST['voltar'])) header("location: index.php");

  include 'view/footer.html'
?>
