<?php require_once "../app/config.php"; ?>
<?php require_once APP . "/validacao_acesso.php"; ?>

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



<div class="container">
  <div class="row">
    <div clas="col-md-4">
      <a class="btn btn-primary text-white">Criar novo quiz</a>
      <a class="btn btn-warning text-white">Editar Quiz</a>
      <a class="btn btn-danger text-white">Excluir Quiz</a>
    </div>
  
  </div>

</div>