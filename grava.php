<html>
<body>
<?php
	$conexao = mysql_connect("localhost","root","");
	mysql_select_db("sgi_bd" ,$conexao);

	$nome = $_POST["Nome"];
	$sobrenome = $_POST["Sobrenome"];
	$email = $_POST["Email"];
	$senha = $_POST["Senha"];
	$confirmarsenha = $_POST["ConfirmarSenha"];

	$sql = "INSERT INTO usuarios(nome, sobrenome, email, senha) VALUES";
	$sql.="('$nome','$sobrenome','$email', '$senha')";
	$resultado= mysql_query($sql, $conexao) OR DIE(mysql_error());

	if($resultado == 1)
	{
		echo 
		"<script>   
		alert('Cadastro realizado com sucesso!');
		window.location.href = 'index.html';
		</script>";
	}
	?>

</body>
</html>
