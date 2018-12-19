<?php
  include 'view/header.html';
?>
<div class="bg-warning">
  <div id="carouselIndex" class="carousel slide" data-ride="carousel" width="100%" height="100%">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row container-fluid d-flex flex-row">
        <div class="col-md-6 p-2 d-flex align-items-center">
          <img src="res/img/carousel1.png" alt="imagem1" width="100%">
        </div>
        <div class="col-md-6 p-2 d-flex align-items-center" width="50%" height="50%">
          <div>
            <h1 class="text-light font-weight-light text-center">O corpo que você sempre quis</h1>
            <h2 class="text-light font-weight-light text-center"><u>com o treino que você quiser.</u></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row container-fluid d-flex flex-row">
        <div class="col-md-6 p-2 d-flex align-items-center">
          <!-- <video width="70%" height="70%" controls class="mx-auto d-block responsive-item-embed">
            <source src="res/raw/estrategiaaf.mp4" type="video/mp4">
            <source src="res/raw/estrategiaaf.mp4" type="video/mp4">
            Erro ao carregar o vídeo
          </video> -->
          <img src="res/img/carousel2.png" alt="imagem2" width="100%">
        </div>
        <div class="col-md-6 p-2 d-flex align-items-center" width="50%" height="50%">
          <div>
            <h1 class="text-light font-weight-light text-center">Conheça a <strong>Autoridade Fitness</strong></h1>
            <h2 class="text-light font-weight-light text-center"><u>e mude de vida.</u></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<figure id="container">
  <img src="res/img/index1.jpg" alt="index" width="100%">
  <div class="container d-flex-reverse">
    <figcaption>Tenha acesso a todos os programas por apenas <strong>R$39,90</strong> por mês ao ano</figcaption>
    <a href="cadastro-cliente.php">
      <button type="submit" id="acesso" class="btn btn-warning shadow-lg">Garantir acesso total</button>
    </a>
  </div>
</figure>
<?php
  include 'view/footer.html';
?>
