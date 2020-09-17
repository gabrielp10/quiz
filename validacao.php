<?php

session_start();

//Conexão com o banco

include_once  __DIR__ . '/include/conexao.php';

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
