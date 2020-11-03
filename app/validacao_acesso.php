<?php require_once "config.php"; 

if (empty($_SESSION)) {
  session_start();
}

if(!isset($_SESSION['usuario'])){
  header('location:'. URL .  '/login');
}
