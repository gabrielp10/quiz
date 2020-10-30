<?php require_once "config.php"; 
session_start();
if(!isset($_SESSION['usuario'])){
  header('location:'. URL .  '/public/login.php');
}

//Conexão com o banco

include_once  APP . '/include/conexao.php';
//mysqli_select_db($con, 'quizdb');

?>
