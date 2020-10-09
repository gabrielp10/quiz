<?php

session_start();

include_once  __DIR__ . '/include/conexao.php';

//header('location:login.php');


$nome = $_POST['usuario'];
$senha = $_POST['senha'];

$q = "SELECT * FROM usuarios WHERE username = '$nome';";

$resultado = mysqli_query($con, $q);

$num = mysqli_num_rows($resultado);

// Check dos dados de cadastro

if($num == 1){
  echo "Usuário $nome já existente";
}

else{
  $qy = "INSERT INTO usuarios (username, password) VALUES ('$nome' , '$senha');";
  mysqli_query($con, $qy);
}

 ?>
