<?php require_once "../app/config.php"; 
require_once APP . "/validacao_acesso.php"; 
use App\Controller;
?>

<!DOCTYPE html>
<html>
<head>
  <title><?= $data['title'] ?></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/assets/css/estilo.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="/public/assets/js/bootstrap.min.js"></script></head>

</head>

<body>

  <?php include_once("./navbar.php") ?>




  <section class="jumbotron text-center">
      <div class="container">
        <h1>Bem vindo ao Quiz, <?php echo $_SESSION['usuario']; ?></h1>
        <p class="lead text-muted">Selecione um quiz para iniciar .</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Resultados Anteriores</a>
          <a href="#" class="btn btn-secondary my-2">Ranking Geral</a>
        </p>
      </div>
  </section><br>

  <div class="container"> <!-- Início container -->

      <div class="row">

        <?php foreach($data['quizzes'] as $quiz): ?>

          <!-- Inicio Card-->
          <div class="card  hvr-reveal col-md-4 col-sm-5 col-lg-3 mb-2">
            <!-- Imagem -->
            <div class="view overlay">
            <?php if (empty($quiz['img'])): ?>
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"><rect width="100%" height="100%" fill="#79999c"></rect></svg>
              <?php else: ?>
              <img class="card-img-top mt-1" src="<?="/public/assets/img/{$quiz['img']}" ?>" width="100%" height="100%" alt="Card image cap"/>
              <?php endif;?>
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <!-- Conteúdo -->
            <div class="card-body">

              <!-- Título -->
              <h5 class="card-title"><?= $quiz['nome'] ?></h5>
              <hr>
              <!-- Texto -->
              <p class="card-text"><?= $quiz['descricao'] ?></p>
              

            </div>

            <div class="row justify-content-end">
                <a class="btn btn-indigo btn-rounded btn-md btn-outline-secondary mb-1 mr-1" href="<?= "$data[routeQuiz]/$quiz[id]" ?>">Iniciar</a>
            </div>
          </div>
          <!-- Fim Card -->

        <?php endforeach ?>        

      </div>

          
    <!--Logout-->
    <div class="d-flex justify-content-center mb-1">
      <a href="<?= $data['routeLogout'] ?>" class="btn btn-warning btn-lg mb-3 "> Logout </a>
     </div>
    </div>
    
  </div>                

  <?php include_once "footer.php" ?>
</body>
</html>
