<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('location:login.php');
}

//Conexão com o banco

include_once  __DIR__ . '/include/conexao.php';

mysqli_select_db($con, 'quizdb');


  if(isset($_POST['Enviar'])){

    if(!empty($_POST['quizcheck'])){

      $count = count($_POST['quizcheck']);

      echo "de 2, você selecionou " .$count. "respostas";

      $resultado = 0;
      $i = 1;

      $selecionado = $_POST['quizcheck'];
      print_r($selecionado);

      $q = "select * from perguntas";
      $query = mysqli_query($con, $q);

      while($rows = mysqli_fetch_array($query) ){
        print_r($rows['res_id']);

        $checked = $rows['res_id'] == $selecionado[$i] ;

        if($checked){
          $resultado++;
        }

        $i++;

      }

      echo "<br> Seus pontos totais: " .$resultado;

    }

  }

  $nome = $_SESSION['usuario'];
  $resultadofinal = "insert into user(usuario, pergtotal, respostascorretas) values ('$nome', '2', '$resultado')";
  $queryresult = mysqli_query($con,$resultadofinal);



?>
