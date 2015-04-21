<!DOCTYPE html>
<html lang="pt-br">
<head>
</head>
<body>
		<?php
			$conexao = mysql_connect("localhost","root","");
			mysql_select_db("sgi_bd" ,$conexao);

		    $usuario = $_POST["Login"];
		    $senha = $_POST["Senha"];


			$comando = 'select senha from usuarios where email ="'.$usuario.'"';
			$consulta =mysql_query($comando, $conexao)or die(mysql_error());

			

			while($row = mysql_fetch_array($consulta))
			{ 
				
		        if ($senha == $row['senha'])
		        {
		          echo header("location:index.php");
		        }
			}

			 echo 
		          	"<script>   
					alert('Usuario ou senha incorretos!');
					window.location.href = 'login.html';
					</script>";
		?>

</body>
</html>
