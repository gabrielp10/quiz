<?php include_once("./navbar.php");

$message = getMessage('acesso_questionario');
if (!is_null($message)) :
?>
  <div class="alert alert-<?= $message['type'] ?>">
    <?= $message['text'] ?>
  </div>
<?php endif; ?>

<section class="jumbotron text-center">
  <div class="container">
    <h1>Bem vindo ao Quiz, <?= $_SESSION['usuario']; ?></h1>
    <p class="lead text-muted">Selecione um quiz para iniciar .</p>
    <p>
      <a href="<?= $data['routeScore'] ?>" class="btn btn-primary my-2">Resultados Anteriores</a>
      <a href="<?= $data['routeRanking'] ?>" class="btn btn-secondary my-2">Ranking Geral</a>
    </p>
  </div>
</section><br>

<div class="container">
  <?php foreach ($data['categorias'] as $key => $categoria) : ?>
    <h3><?= $data['categorias'][$key]['Nome'] ?></h3>
    <hr class="my-4">
    <div class="row">
    <div class="card-deck">
      <?php $i = 0; foreach ($data['quizzes'][$key] as $quiz) : ?>
        <div class="card  hvr-reveal col-md-4 col-sm-4 col-lg-4 mb-2 ml-2">
          <div class="view overlay">
            <?php if (empty($data['quizzes'][$key][$i]['img'])) : ?>
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225">
                <rect width="100%" height="100%" fill="#79999c"></rect>
              </svg>
            <?php else : ?>
              <a href="<?= "$data[routeDashQuiz]/" . $data['quizzes'][$key][$i]['id'] ?>"><img class="card-img-top mt-2" src="<?= "/public/assets/img/{$data['quizzes'][$key][$i]['img']}" ?>" width="100%" height="100%" alt="Card image cap" /></a>
            <?php endif; ?>
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= $data['quizzes'][$key][$i]['nome'] ?></h5>
            <hr>
            <p class="card-text"><?= $data['quizzes'][$key][$i]['descricao'] ?></p>
            <a href="<?= "$data[routeDashQuiz]/$quiz[id]"?>">Detalhes</a>
          </div>
          <div class="row justify-content-end ">
            <?php
            if ($data['idQuestionarioAberto'] == $quiz['id']) :
            ?>
              <a class="btn btn-indigo btn-rounded btn-md btn-success col m-2" href="<?= "$data[routeQuiz]/$quiz[id]" ?>">Continuar</a>
            <?php
            else :
            ?>
              <a class="btn btn-indigo btn-rounded btn-md btn-outline-secondary col m-2" href="<?= "$data[routeQuiz]/$quiz[id]" ?>">Iniciar</a>
            <?php endif ?>
          </div>
        </div>
      <?php $i++; endforeach ?>
    </div>
  </div>
  <?php endforeach ?>
</div>

<?php include_once "footer.php" ?>