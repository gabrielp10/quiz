<?php

session_start();
header('location:login.php');

// Conexão com o banco

$con = mysqli_connect('localhost', 'root');
if($con){
  echo "Conexao realizada";
}else{
  echo "Sem conexao";
}

mysqli_select_db($con, 'sessao');

$nome = $_POST['usuario'];
$senha = $_POST['senha'];

$q = "select * from cadastro where name = '$nome' && password = '$senha' ";

$resultado = mysqli_query($con, $q);

$num = mysqli_num_rows($resultado);

// Check dos dados de cadastro

if($num == 1){
  echo" Dados duplicados";
}

else{
  $qy = "insert into cadastro (name, password) values ('$nome' , '$senha') ";
  mysqli_query($con, $qy);
}

 ?>
