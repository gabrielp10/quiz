<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header('location:login.php');
}

$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'quizdb');


  if(isset($_POST['Enviar'])){

    if(!empty($_POST['quizcheck'])){

      $count = count($_POST['quizcheck']);

      echo "de 2, você selecionou " .$count. "respostas";

      $resultado = 0;

      $selecionado = $_POST['quizcheck'];
      print_r($selecionado);

      $q = "select * from perguntas";
      $query = mysqli_query($con, $q);

      while($rows = mysqli_fetch_array($query)){
        print_r($rows['res_id']);

        $checked = $rows('res_id') == $selecionado ;

        if($checked){
          $resultado++;
        }


      }

    }

  }



?>
