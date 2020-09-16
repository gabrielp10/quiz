<?php

session_start();
if(!isset($_SESSION['usuario'])){
header('location:login.php');
}

//Conexão com o banco

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

//Validação login

if($num == 1){

  $_SESSION['usuario'] = $nome;
  header('location:home.php');

}else{
  header('location:login.php');
}

?>
