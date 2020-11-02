<?php require_once "../app/config.php"; ?>
<?php require_once APP . "/validacao_acesso.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title><?= $data['title'] ?></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="/public/assets/js/bootstrap.min.js"></script></head>

</head>

<body>

  <?php include_once("./navbar.php") ?>


<div class="container"> <!-- Início container -->


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

  <div class="album py-5 bg-light">
      <div class="container">

        <div class="row">

        <?php foreach($data['quizzes'] as $quiz): ?>

          <div class="col-md-4">
            <h5><?= $quiz['nome'] ?></h5>
            <div class="card mb-4 shadow-sm">
            <?php if (empty($quiz['img'])): ?>
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225"><rect width="100%" height="100%" fill="#79999c"></rect></svg>
            <?php else: ?>
              <img src="<?= "/public/assets/img/{$quiz['img']}" ?>" class="bd-placeholder-img card-img-top" width="100%" height="225"/>
            <?php endif; ?>
              <div class="card-body">
                <p class="card-text"><?= $quiz['descricao'] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <a type="button" href="<?= "$data[routeQuiz]/$quiz[id]" ?>" class="btn btn-sm btn-outline-secondary">Iniciar</a>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach ?>

        </div>

      </div>
    </div>
</div>

</body>
</html>
