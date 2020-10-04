<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('location:login.php?login=erro2');
}

//Conexão com o banco

include_once  __DIR__ . '/include/conexao.php';

mysqli_select_db($con, 'quizdb');

?>
