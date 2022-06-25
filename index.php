<?php 
  session_start();
  $_SESSION['pageTitle'] = 'Home';
  include './shared/header.php';
  require_once "./shared/conn.php"; //sempre pra startar
  header('Content-Type: text/html; charset=utf-8');
  $dbh = DBConnection::get();
  $stmt = $dbh->prepare("SELECT * FROM produto");
  $stmt->execute();
  $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo '
    <section>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://source.unsplash.com/1400x300/?wine " class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>As melhores safras</h5>
              <p>Temos os melhores vinhos do mundo.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1400x300/?red wine " class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Aproveite!!!</h5>
              <p>Aqui você encontra todos os melhores vinhos do mundo</p>
            </div>  
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1400x300/?rose wine " class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Promoções especiais</h5>
              <p>Os melhores preços que você vai encontrar</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <section>
      <div class="containe m-4">
        <div class="row">
          <div class="col-sm-12 text-dark text-center my-3">
            <h1>Produtos</h1>
          </div>
        </div>
        <div class="row">';

        if (!empty($dados)){
          foreach ($dados as $registro) {
            echo '<div class="col-3">';
              echo '<div class="card border-warning" style="width: 18rem;">';
                echo '<img src="'.$registro['img'].'" class="card-img-top" style="max-width:300px; max-height:300px">';
                echo '<div class="card-body">';
                  echo '<h5 class="card-title text-warning">Promoção </h5>';
                  echo '<p class="card-text ">'.$registro['nome'].'</p>';
                  echo '<a href="tela2.html" class="btn btn-outline-warning">Detalhes</a>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
          }
        }
        else{
          echo "<tr><td colspan='5'><p style='text-align-last: center;'>Ops... Parece que não temos nenhum produto disponivel ainda.</p></td></tr>";
        }
        echo '</div>
      </div>
    </section>';

include './shared/footer.php' ?>