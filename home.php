<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('location:login.php');
}

$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'quizdb');

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script></head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

</head>

<body>
<div class="container">

  <br> <h1 class="text-center text-primary"> Linux Quiz </h1> <br>
  <h2 class="text-center text-success"> Bem-vindo ao Quiz, <?php echo $_SESSION['usuario']; ?> </h2>


  <div class="card">

    <h3 class="text-center card-header"> Bem-vindo <?php echo $_SESSION['usuario'] ?>, Selecione uma das alternativas. Boa sorte!</h3>

  </div><br>

  <form action="check.php" method="post">

  <?php

  for($i=1; $i <3; $i++){
  $q = "select * from perguntas where pid = $i";
  $query = mysqli_query($con, $q);

  while($rows = mysqli_fetch_array($query) ){
    ?>

    <div class="card">
      <h4 class="card-header"> <?php echo $rows['pergunta'] ?> </h4>


      <?php

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
  <div class="text-center">
   <input type="submit" name="Enviar" value="Enviar" class="btn btn-lg btn-primary">
 </div>
</form> <br><br>
</div>


  <div>
    <a href="logout.php" class="btn btn-warning "> Logout </a>
  </div>

  <div>
      <h5 class="text-center"> Quiz Linux - Gabriel Tito e Antônio Felix - 2020  </h5>
  </div>


</div>


<body>
</html>
