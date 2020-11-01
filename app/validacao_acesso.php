<?php require_once "config.php"; 


if (empty($_SESSION)) {
  session_start();
}

if(!isset($_SESSION['usuario'])){
  header('location:'. URL .  '/login');
}

//Conexão com o banco

include_once  APP . '/include/conexao.php';
//mysqli_select_db($con, 'quizdb');

?>
