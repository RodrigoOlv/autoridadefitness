<?php include 'view/header.html' ?>
<div class="bg-warning">
  <div class="container">
    <h1 class="h2 text-light font-weight-light pt-5">Fale conosco</h1>
    <form name="faleconosco" method="post" action="" class="pt-3 pb-5">
      <div class="form-group">
        <input type="text" name="txtnome" placeholder="Seu nome" class="form-control">
      </div>
      <div class="form-group">
        <input type="text" name="txtemail" placeholder="Seu e-mail" class="form-control">
      </div>
      <div class="form-group">
        <textarea name="txtmensagem" class="form-control" rows="5" placeholder="Sua mensagem"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" name="enviar" value="Enviar" class="btn btn-dark">
        <input type="submit" name="voltar" value="Voltar" class="btn btn-dark">
      </div>
    </form>
  </div>
</div>
<?php
  if(isset($_POST['enviar'])){

    include_once 'model/contato.class.php';
    include_once 'dao/contatodao.class.php';
    require_once 'util/padronizacao.class.php';
    require_once 'util/validacao.class.php';
    require_once 'util/helper.class.php';

    $qtdErros = 0;

    if (!Validacao::validarNome($_POST['txtnome'])) {
      Helper::alert("Nome inválido");
      $qtdErros++;
    }elseif (!Validacao::validarEmail($_POST['txtemail'])) {
      Helper::alert("E-mail inválido");
    }

    if ($qtdErros == 0) {

      $con = new Contato();

      $con->nome = Padronizacao::padronizarMaiMin($_POST['txtnome']);
      $con->email = Padronizacao::padronizarMin($_POST['txtemail']);
      $con->mensagem = $_POST['txtmensagem'];

      $conDAO = new ContatoDAO();

      $conDAO->cadastrarContato($con);

      Helper::alert("Mensagem enviada com sucesso");
      // var_dump($conDAO->cadastrarContato($con));
    }//zero erros
  }//post

  if (isset($_POST['voltar'])) {
    header("location: index.php");
  }

  include 'view/footer.html';
 ?>
