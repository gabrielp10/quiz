<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('location:login.php');
}

//Conexão com o banco

include_once  __DIR__ . '/../include/conexao.php';

mysqli_select_db($con, 'quizdb');

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="assets/js/bootstrap.min.js"></script></head>

</head>

<body>

<?php include_once "navbar.php" ?>

<div class="container"> <!-- Início container -->


  <div class="card">

    <h3 class="text-center card-header"> Bem-vindo <?php echo $_SESSION['usuario'] ?>, Selecione uma das alternativas. Boa sorte!</h3>

  </div><br>

  <form action="check.php" method="post">

  <?php

  //Looping perguntas

  $q = "SELECT
          q.nome AS questionario_titulo,
          qt.descricao AS pergunta,
          qt.id AS id_questao,
          qt.alternativa_a,
          qt.alternativa_b,
          qt.alternativa_c,
          qt.alternativa_d,
          qt.alternativa_e
        FROM questionarios q
        INNER JOIN questoes qt ON qt.fk_questionarios = q.id";
  $query = mysqli_query($con, $q);

  while($rows = mysqli_fetch_array($query) ){
    ?>

    <div class="card">
      <h4 class="card-header"> <?php echo $rows['pergunta'] ?> </h4>

          <div class="card-body">
              <input type="radio" name="quizcheck[<?= $rows['id_questao'] ?>]" value="A">
              <?php echo $rows['alternativa_a'] ; ?>
          </div>

          <div class="card-body">
              <input type="radio" name="quizcheck[<?= $rows['id_questao'] ?>]" value="B">
              <?php echo $rows['alternativa_b'] ; ?>
          </div>

          <div class="card-body">
              <input type="radio" name="quizcheck[<?= $rows['id_questao'] ?>]" value="C">
              <?php echo $rows['alternativa_c'] ; ?>
          </div>

          <div class="card-body">
              <input type="radio" name="quizcheck[<?= $rows['id_questao'] ?>]" value="D">
              <?php echo $rows['alternativa_d'] ; ?>
          </div>

          <div class="card-body">
              <input type="radio" name="quizcheck[<?= $rows['id_questao'] ?>]" value="E">
              <?php echo $rows['alternativa_e'] ; ?>
          </div>
<?php
  }
?>

  <!-- Botões de submit - Logout -->

  <!-- Submit -->

  <div class="text-center">
    <input type="submit" name="Enviar" value="Enviar" class="btn btn-lg btn-primary">
  </div>

</form> <br><br>

</div>

  <!-- Logout -->
  <div class="d-flex justify-content-center mt-3">
    <a href="../logout.php" class="btn btn-warning btn-lg mb-3 "> Logout </a>
  </div>

  <!-- Footer -->


  <div>
      <h5 class="text-center"> Quiz Linux - Gabriel Tito e Antônio Felix - 2020  </h5>
  </div>


</div>


<body>
</html>
