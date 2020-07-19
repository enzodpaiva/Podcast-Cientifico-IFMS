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
			<form action="#" method="POST" enctype="multipart/form-data">
			<div class="form-group ">
				<label for="titulo"><b><h3>Informe o titulo do programa</h3></b>	</label>
				<input type="text" name="titulo" class="form-control" id="titulo" required>
            </div>
            <div class="form-group ">
				<label for="descricao"><b><h3>Informe a descrição do programa</h3></b>	</label>
				<textarea  type="text" name="descricao" class="form-control" id="descricao" required></textarea>
            </div>
            <div class="form-group ">
				<label for="data"><b><h3>Informe a data que o programa está sendo postado</h3></b>	</label>
				<input type="date" name="data" class="form-control" id="data" required>
            </div>
            <div class="form-group ">
				<label for="youtube"><b><h3>Informe o link do podcast hospedado no youtube</h3></b>	</label>
				<input type="text" name="youtube" class="form-control" id="youtube" required>
            </div>
            <div class="form-group">
                <label for="linkimg">Insira imagem de capa do video</label>
                <input type="file" name="linkimg" class="form-control-file" id="linkimg" required>
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
  $titulo = $_POST["titulo"];
  $desc = $_POST["descricao"];
  $data = $_POST["data"];
  $youtube = $_POST["youtube"];

  $conn = obterConexao();
  $sql = "SELECT * FROM podcast WHERE youtube = '" . $youtube . "';";
  $result = mysqli_query($conn, $sql);

  if($registro = mysqli_fetch_array($result)){
    echo "Programa ja existe!";
    exit;
  } else {
    $pod = obterPodcast();
    $diretorio = "Images/";
    $target_file = $diretorio . basename($_FILES["linkimg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $novaimagem = md5(uniqid()) . '-' . time() . '.'.$imageFileType;
    $check = getimagesize($_FILES["linkimg"]["tmp_name"]);
    // Check if image file is a actual image or fake image
    if($check !== false) {
     //   echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      //  echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($novaimagem)) {
    //echo "Arquivo já existe";
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["linkimg"]["size"] > 50000000) {
       // echo "Arquivo selecionado é muito grande, selecione outro.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        //echo "Formato de imagem não suportado, selecione um formato que seja JPG, JPEG, PNG ou GIF .";
        $uploadOk = 0;
    }

        // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Sua imagem não foi aceita, selecione outra.";

    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["linkimg"]["tmp_name"], '../Images/'.$novaimagem)) {
           // echo "A imagem ". basename( $_FILES["linkimg"]["name"]). " foi enviado com sucesso.";
        } else {
            //echo "Sua imagem não foi aceita, selecione outra.";
        }
    }
    $podd = mysqli_query($conn, "INSERT INTO podcast VALUES (DEFAULT, '$youtube',  '$desc', '$titulo', '$data', '$novaimagem')");
    header("Location: ListPodcast.php");
  }
}
?>
