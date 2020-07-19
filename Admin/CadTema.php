<?php
	include_once ('../Funcao.php');
	include_once ('../VerificaLogin.php') ;
	?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html">
		<meta charset="utf-8">
		<meta name="author" content="Enzo Paiva">
		<meta name="copyright" content="IFMS">
		<meta name="keywords" content="página de conteúdo educacional">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../Estilo_PI.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
		<div class="container">
		<?php include_once ('../menu.php');?>

			<div id="conteudoo">
			<div id="xo">
			<form action="#" method="POST">
			<div class="form-group ">
				<label for="descricao"><b><h3>Informe o tema a ser cadastrado</h3></b>	</label>
				<input type="text" name="descricao" class="form-control" id="descricao">
			</div>
			<button type="submit" name="Enviar" class="btn btn-primary">Enviar</button>
			</form>
		</div>
		</div>

			<footer class="footer">
			<?php include_once ('../menu.php');?>
			</footer>
		</div>
  </body>
</html>
<?php
if(isset($_POST["Enviar"])){
  $desc = $_POST["descricao"];

  $pod = obterTema();

  if(empty($desc)){
		echo "Digite todos os dados!";
		exit;
  }

  $conn = obterConexao();

  $sql = "SELECT * FROM tema WHERE descricao = '" . $desc . "';";

  $result = mysqli_query($conn, $sql);

  if($registro = mysqli_fetch_array($result)){
		echo "Tema ja existe!";
	} else {
    $descri = mysqli_query($conn, "INSERT INTO tema VALUES (DEFAULT, '$desc')");
		header("Location: ListTemas.php");
  }

}
?>
