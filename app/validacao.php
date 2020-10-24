<?php
require_once "config.php";

session_start();

//Conexão com o banco

include_once  URL . '/include/conexao.php';


$nome = $_POST['usuario'];
$senha = $_POST['senha'];

$q = "SELECT * FROM usuarios WHERE username = '$nome' AND password = '$senha';";

$resultado = mysqli_query($con, $q);

$num = mysqli_num_rows($resultado);

//Validação login

if($num == 1){

  $_SESSION['usuario'] = $nome;
  header('location:' . URL . '/public/home2.php');

}else{
  header('location:' . URL . 'login.php?login=erro');
}

?>
