<?php require_once "../app/config.php"; ?>
<?php require_once APP . "/validacao_acesso.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title><?= $data['title'] ?></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="/public/assets//js/bootstrap.min.js"></script></head>

</head>

<body>

<?php include_once("./navbar.php") ?>

<div class="container"> <!-- Início container -->


  <div class="card">

    <h3 class="text-center card-header"> Bem-vindo <?php echo $_SESSION['usuario'] ?>, Selecione uma das alternativas. Boa sorte!</h3>
    <h3 class="text-center card-header font-weight-bold"><?= $data['perguntas'][0]['questionario_titulo'] ?></h3>

  </div><br>

  <form action="<?= $data['routeValidate'] ?>" method="post">

  <?php foreach($data['perguntas'] as $pergunta): ?>

    <div class="card">

      <h4 class="card-header"> <?php echo $pergunta['pergunta'] ?> </h4>

      <div class="card-body">
          <input type="radio" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="A">
          <?php echo $pergunta['alternativa_a'] ; ?>
      </div>

      <div class="card-body">
          <input type="radio" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="B">
          <?php echo $pergunta['alternativa_b'] ; ?>
      </div>

      <div class="card-body">
          <input type="radio" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="C">
          <?php echo $pergunta['alternativa_c'] ; ?>
      </div>

      <div class="card-body">
          <input type="radio" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="D">
          <?php echo $pergunta['alternativa_d'] ; ?>
      </div>

      <div class="card-body">
          <input type="radio" name="quizcheck[<?= $pergunta['id_questao'] ?>]" value="E">
          <?php echo $pergunta['alternativa_e'] ; ?>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- Botões de submit - Logout -->

  <!-- Submit -->

  <div class="text-center">
    <input type="submit" name="Enviar" value="Enviar" class="btn btn-lg btn-primary">
  </div>

    <!-- Logout -->
    <div class="d-flex justify-content-center mt-3">
    <a href="<?= $data['routeLogout'] ?>" class="btn btn-warning btn-lg mb-3 "> Logout </a>
  </div>

</form> <br><br>



</div>





</div>

<?php include_once "footer.php" ?>


<body>
</html>
