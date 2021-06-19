
<?php include_once("./navbar.php") ?>

<div class="container">
  <div class="card">
    <h3 class="text-center card-header"> Bem-vindo <?=$_SESSION['usuario'] ?>, Selecione uma das alternativas. Boa sorte!</h3>
    <?php if (empty($data['img'])) : ?>
      <svg class="bd-placeholder-img card-img-top" width="100%" height="225">
        <rect width="100%" height="100%" fill="#79999c"></rect>
      </svg>
    <?php else : ?>
      <img class="card-img-top mt-2" src="<?= "/public/assets/img/{$data['img']}" ?>" width="100%" height="100%" alt="Card image cap" />
    <?php endif;?>
    <h3 class="text-center card-header font-weight-bold" <?= $data['perguntas'][0]['questionario_titulo'] ?>> </h3>
  </div>

  <form action="<?= $data['routeValidate'] ?>" method="post">
    <?php foreach ($data['perguntas'] as $pergunta) : ?>

      <div class="card">
        <h4 class="card-header text-center"> <?=$pergunta['pergunta'] ?> </h4>

        <div class="card-body">
          <input type="radio" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="A">
          <?=$pergunta['alternativa_a'];?>
        </div>

        <div class="card-body">
          <input type="radio" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="B">
          <?=$pergunta['alternativa_b'];?>
        </div>

        <div class="card-body">
          <input type="radio" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="C">
          <?=$pergunta['alternativa_c'];?>
        </div>

        <div class="card-body">
          <input type="radio" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="D">
          <?=$pergunta['alternativa_d'];?>
        </div>

        <div class="card-body">
          <input type="radio" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="E">
          <?=$pergunta['alternativa_e'];?>
        </div>
      </div>
    <?php endforeach;?>

    <div class="text-center pt-3 pb-3">
      <input type="submit" name="Enviar" value="Enviar" href="<?= $data["routeValidate"] ?>" class="btn btn-lg btn-primary">
    </div>
  </form>
</div>

<?php include_once "footer.php" ?>