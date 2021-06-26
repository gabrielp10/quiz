
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
    <?php $nQuestao = 0;
      foreach ($data['perguntas'] as $key => $pergunta) : 
      $nQuestao += 1?>
        <div id="shuffle<?=$nQuestao?>" class="card">
        <h4 class="card-header text-center"> <?=$pergunta['pergunta'] ?> </h4>
          <?php $i = 0; foreach($pergunta as $alternativa) :?>
            <div class="card-body">
              <input type="radio" name="quizcheck[<?= '' ?>]" value="  ">
              <?=$data['alternativas'][$key][$i]['alternativa'];?>
            </div>
          <?php $i++;  endforeach ; ?>
            <script>
              shuffle(<?=$nQuestao?>);
            </script>
        </div>
    <?php endforeach;?>
    <div class="text-center pt-3 pb-3">
      <input type="submit" name="Enviar" value="Enviar" href="<?= $data["routeValidate"] ?>" class="btn btn-lg btn-primary">
    </div>
  </form>
</div>

<?php include_once "footer.php" ?>