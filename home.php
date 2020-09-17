<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('location:login.php');
}
//Conexão com o banco
$con = mysqli_connect('localhost', 'root');

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
<div class="container"> <!-- Início container -->

  <br> <h1 class="text-center text-primary"> Linux Quiz </h1> <br>
  <h2 class="text-center text-success"> Bem-vindo ao Quiz, <?php echo $_SESSION['usuario']; ?> </h2>


  <div class="card">

    <h3 class="text-center card-header"> Bem-vindo <?php echo $_SESSION['usuario'] ?>, Selecione uma das alternativas. Boa sorte!</h3>

  </div><br>

  <form action="check.php" method="post">

  <?php

  //Looping perguntas

  for($i=1; $i <3; $i++){
  $q = "select * from perguntas where pid = $i";
  $query = mysqli_query($con, $q);

  while($rows = mysqli_fetch_array($query) ){
    ?>

    <div class="card">
      <h4 class="card-header"> <?php echo $rows['pergunta'] ?> </h4>


      <?php

      //Looping respostas

        $q = "select * from respostas where res_id = $i";
        $query = mysqli_query($con, $q);

        while($rows = mysqli_fetch_array($query) ){
          ?>

          <div class="card-body">

              <input type="radio" name="quizcheck[<?php echo $rows['res_id']; ?> ]" value="<?php echo $rows['rid'];  ?>">
              <?php echo $rows['resposta'] ; ?>
          </div>

<?php
  }
  }
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
  <div>
    <a href="logout.php" class="btn btn-warning "> Logout </a>
  </div>

  <!-- Footer -->

  <div>
      <h5 class="text-center"> Quiz Linux - Gabriel Tito e Antônio Felix - 2020  </h5>
  </div>


</div>


<body>
</html>
