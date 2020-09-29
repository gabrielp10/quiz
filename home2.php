<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('location:login.php');
}

//Conexão com o banco

include_once  __DIR__ . '/include/conexao.php';

mysqli_select_db($con, 'quizdb');

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="js/bootstrap.min.js"></script></head>

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
          <div class="col-md-4">
            <h5> Python - Básico </h5>
            <div class="card mb-4 shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225"><rect width="100%" height="100%" fill="#79999c"></rect></svg>
              <div class="card-body">
                <p class="card-text">Python básico para iniciantes.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <a type="button" href="home.php" class="btn btn-sm btn-outline-secondary">Iniciar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <h5> Linux - Básico </h5>
            <div class="card mb-4 shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225"><rect width="100%" height="100%" fill="#79999c"></rect></svg>
              <div class="card-body">
                <p class="card-text">Comandos Linux para iniciantes.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <a type="button" href="home.php" class="btn btn-sm btn-outline-secondary">Iniciar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <h5> PHP - Básico </h5>
            <div class="card mb-4 shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225"><rect width="100%" height="100%" fill="#79999c"></rect></svg>
              <div class="card-body">
                <p class="card-text">PHP básico para iniciantes.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <a type="button" href="home.php" class="btn btn-sm btn-outline-secondary">Iniciar</a>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>






</div>


<body>
</html>
