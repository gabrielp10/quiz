<!DOCTYPE html>
<html>
<head>
  <title><?= $data['title'] ?></title>
  <title><?=$data['title']?></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/assets/css/estilo.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!-- Latest compiled and minified JavaScript -->
  <script src="/public/assets/js/bootstrap.min.js"></script></head>
  <script src="/public/assets/js/main.js"></script></head>

</head>

<body>

<?php include_once("./navbar.php") ?>

<div class="container"> <!-- Início container -->


  <div class="card">

    <h3 class="text-center card-header"> Bem-vindo <?php echo $_SESSION['usuario'] ?>, Selecione uma das alternativas. Boa sorte!</h3>
    <?php if (empty($data['img'])): ?>
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"><rect width="100%" height="100%" fill="#79999c"></rect></svg>
              <?php else: ?>
              <img class="card-img-top mt-2" src="<?="/public/assets/img/{$data['img']}" ?>" width="100%" height="100%" alt="Card image cap"/>
            <?php endif;?>
    <h3 class="text-center card-header font-weight-bold" <?= $data['perguntas'][0]['questionario_titulo'] ?>> </h3>

  </div><br>


  <form action="<?= $data['routeValidate'] ?>" method="post">

  <?php foreach($data['perguntas'] as $pergunta): ?>

    <div class="card">

      <h4 class="card-header"> <?php echo $pergunta['pergunta'] ?> </h4>

      <div class="card-body">
          <input type="radio" class="randomiza" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="A">
          <?php echo $pergunta['alternativa_a'] ; ?>
      </div>

      <div class="card-body">
          <input type="radio" class="randomiza" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="B">
          <?php echo $pergunta['alternativa_b'] ; ?>
      </div>

      <div class="card-body">
          <input type="radio" class="randomiza" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="C">
          <?php echo $pergunta['alternativa_c'] ; ?>
      </div>

      <div class="card-body">
          <input type="radio" class="randomiza" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="D">
          <?php echo $pergunta['alternativa_d'] ; ?>
      </div>

      <div class="card-body">
          <input type="radio" class="randomiza" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="E">
          <?php echo $pergunta['alternativa_e'] ; ?>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- Botões de submit - Logout -->

  <!-- Submit -->

  <div class="text-center pt-1">
    <input type="submit" name="Enviar" value="Enviar" href="<?= $data["routeValidate"] ?>" class="btn btn-lg btn-primary">
  </div>


</form> <br><br>



</div>





</div>

<?php include_once "footer.php" ?>


<body>
</html>
