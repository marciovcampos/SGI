<html>
<body>
<?php
	$conexao = mysql_connect("localhost","root","");
	mysql_select_db("sgi_bd" ,$conexao);

	$arquivo = $_POST["arquivo"];
	$usuario = "m@m.com";

	$sql = "INSERT INTO imagens(imagem, usuario) VALUES";
	$sql.="('$arquivo','$usuario')";
	$resultado= mysql_query($sql, $conexao) OR DIE(mysql_error());

	if($resultado == 1)
	{
		echo 
		"<script>   
		alert('Imagem salva com sucesso!');
		window.location.href = 'index.html';
		</script>";
	}
	?>

</body>
</html>
