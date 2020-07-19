<?php
	include_once ('../Funcao.php');
	include_once ('../VerificaLogin.php') ;
$id = $_POST['id'];
$sql = "SELECT * FROM tema WHERE id = '" . $id . "';";
$conn = obterConexao();
$funcao = mysqli_query($conn, $sql);
$registro = mysqli_fetch_array($funcao);
?>
<html>
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
  <legend>
    <h2>Editar</h2> 
  </legend>
  <div id="conteudoo">
  
        <div id="xo">
			<form  method="POST">          
			<div class="form-group ">
            <input type="hidden" name="id" value="<?=$id?>" />
				<label for="descricao"><b><h3>Informe o tema a ser cadastrado</h3></b>	</label>
				<input type="text" name="descricao" class="form-control" id="descricao" value="<?=$registro['descricao']?>">
			</div>
			<button type="submit" name="Enviar" class="btn btn-primary">Enviar</button>
			</form>
		</div>
    </div>
		<footer class="footer">
		<?php include_once ('../rodape.php');?>
		</footer>
	</div>
</body>
</html>
<?php
if(isset($_POST["Enviar"])){
  $desc = $_POST["descricao"];
    $sql2= "SELECT * FROM tema WHERE descricao = '" . $desc . "';";
	$result = mysqli_query($conn, $sql2);

  if($registro = mysqli_fetch_array($result) && $registro["id"] != $id){
		echo 'Os dados que você está inserindo ja existem';
	}else{
		$quarto = mysqli_query($conn, "UPDATE tema SET descricao = '$desc' WHERE id = '$id'");
		echo "Função Alterada";
		header("Location: ListTemas.php");
	}
}
?>
