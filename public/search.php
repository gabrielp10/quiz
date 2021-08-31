<style>
  .linkpesquisa {
    color: black;
    text-decoration: none; 
    font-family: Tahoma, sans-serif;
    font-weight: bold;
    font-size: 20px;
  }

  .linkpesquisa:hover {
    color:black; 
    text-decoration:none; 
    cursor:pointer;  
}
</style>
<?php

$connect = new PDO("mysql:host=localhost;dbname=quizdb", "root", "toor");

if (isset($_POST["nome"])) {
	$busca = $_POST["nome"];
	$query = "SELECT q.nome AS questionario, q.descricao, q.img, q.id, s.nome AS subcategoria, c.nome as categoria FROM questionarios q INNER JOIN subcategorias s ON s.id = q.fk_subcategorias INNER JOIN categorias c ON c.id = s.fk_categorias WHERE q.nome LIKE '%".$busca."%' ORDER BY questionario LIMIT 5";
}

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$rowCount = $statement->rowCount();

if ($rowCount > 0) {
	$data = '<div class="table-responsive">
		<table class="table table-borderless rounded table-hover">

	';
	foreach($result as $row) {
		$data .= "
			<tr class='clickable-row' data-href='dash-quiz/$row[id]'>
          <td title='$row[descricao]'> 
            <a class='linkpesquisa' href='dash-quiz/$row[id]'>
            <img class='rounded-circle' src='/public/assets/img/quizzes/$row[img]' width='75px' height='70px'>
            $row[questionario] - $row[subcategoria] - $row[categoria]
            </a>
          </td>
			</tr>
		";
	}
	$data .= '</table></div>';
}
else {
	$data = "<tr align=\"center\"><td>Nenhum questionário localizado.</td></tr>";
}

echo $data;

?>

<script>
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>