<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>SGC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="jumbotron" align="center">
    <a href="index.html" style="color:#000000"><h1>SGC</h1></a>
    <p>Sistema de Gestão de Cadastros</p> 
  </div>
  <h3>Pesquisa</h3>
  <br>
  <div class="row">
  <div class="col-sm-3"><b>NOME</b></div>
  <div class="col-sm-6"><b>SOBRENOME</b></div>
  <div class="col-sm-3"><b>EMAIL</b></div> 
  </div>
  <br>
		<?php
			$conexao = mysql_connect("localhost","root","");
			mysql_select_db("sgc_bd" ,$conexao);

			$comando = "select nome, sobrenome, email from clientes";
			$consulta =mysql_query($comando, $conexao)or die(mysql_error());

			$num_linhas = mysql_num_rows($consulta);

			$str = "";

			while($row = mysql_fetch_array($consulta))
			{ 
				$str .= "<div class='row'>
						 <div class='col-sm-3'>".$row['nome']."</div>
						 <div class='col-sm-6'>".$row['sobrenome']."</div>
						 <div class='col-sm-3'>".$row['email']."</div>
						 </div>";
			}
			echo $str;
		?>

</body>
</html>
