<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>SGI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="table">
    <div>
      <div class="td col-sm-4"><a href="login.html"><img class="img-responsive" src="img/logo.jpg" width="200" height="200"></a></div>
      <div class="td col-sm-5"><br><br><center><h2>Sistema de Gestão de Imagens</h2><center></div>
    </div>
  </div>
</div>

<div class="container">
  <br>
  <br>
  <h2>Upload</h2>
  <br>
  <form class="form-horizontal" role="form"  method="post" action="http://localhost/SGI/gravaimg.php">

    <div class="form-group">
      <div class="col-sm-4"><input type="file" class="form-control" name="arquivo" id="arquivo"></div>
      <div class="td" align="left"><button type="submit" class="btn btn-success pull-none">Salvar</button></div>
    </div> 
  </form>
    <h2>Lista de Imagens</h2>
</div>

    <?php
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("sgi_bd" ,$conexao);

      $comando = "select imagem from imagens";
      $consulta =mysql_query($comando, $conexao)or die(mysql_error());

      $num_linhas = mysql_num_rows($consulta);

      $str = "";

      while($row = mysql_fetch_array($consulta))
      { 
        $str .= "<div class='row'><img src='fotos/".$row['imagem']->fotos."' alt='Foto de exibição' /><br /></div>";
      }
      echo $str;
    ?>

</body>
</html>