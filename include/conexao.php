<?php

$user = 'root';
$password = '12@Teste';
$database = 'quizdb';

$con = mysqli_connect('localhost', $user, $password, $database);

if ($con) {
  echo "Conexao realizada";
}
else{
  die("Sem conexao");
}

