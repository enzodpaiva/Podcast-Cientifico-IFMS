<?php
include_once ('../Funcao.php');
	include_once ('../VerificaLogin.php') ;
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
  <form method="post" action="" id="formcad" name="formcad" >
  <div class="form-group">
<label>Selecione seu Podcast</label>
<select class="form-control" name="podcast">
<?php
$podcast = obterPodcast();
foreach ($podcast as $pod) {
  echo "<option value=" . $pod['id'] . ">" . $pod['titulo'] . " // Data: " . $pod['data'] . "</option>";
}
?>
</select><br /><br />
<label>Selecione Convidado</label>
<select class="form-control" name="convidado">
<?php
$convidado = obterConvidados();
foreach ($convidado as $conv) {
  echo "<option value=" . $conv['id'] . ">" . $conv['nome'] . " // Email: " .$conv['email']  . "</option>";
}
?>
</select><br /><br />
<input type="submit" class="btn btn-primary mb-2 center-block btn-lg" name="Enviar" value="Enviar"/><br /><br />
</div>
  </form>
  </div>
  </div>
  </div>
  </html>
  <?php
  if(isset($_POST["Enviar"])){
  	$podcast = $_POST["podcast"];
    $tema = $_POST["convidado"];
    $conn = obterConexao();
    if(empty($podcast) || empty($tema)){
  		echo "Digite todos os dados!";
  		exit;
    }else{
      $result = mysqli_query($conn, "INSERT INTO podcast_convidado VALUES (DEFAULT, $podcast, $tema)");
      header("Location: ListPodConv.php");
    }

    //verficacao se ja existe cadastrado no banco


    }
  ?>
