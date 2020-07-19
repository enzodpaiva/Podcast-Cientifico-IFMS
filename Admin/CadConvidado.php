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
			<form action="#" method="POST"  enctype="multipart/form-data">
			<div class="form-group ">
				<label for="nome"><b><h3>Nome</h3></b>	</label>
				<input type="text" name="nome" class="form-control" id="nome" required>
            </div>
            <div class="form-group ">
				<label for="instituicao"><b><h3>Instituição</h3></b>	</label>
				<input type="text" name="instituicao" class="form-control" id="instituicao" required>
            </div>
            <div class="form-group ">
				<label for="email"><b><h3>E-mail</h3></b>	</label>
				<input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group ">
				<label for="area"><b><h3>Area de atuação do convidado</h3></b>	</label>
				<input type="text" name="area" class="form-control" id="area" required>
            </div>
            <div class="form-group">
                <label for="imgconv">Imagem do convidado</label>
                <input type="file" name="imgconv" class="form-control-file" id="imgconv" required>
            </div>
            <div class="form-group ">
				<label for="descricao"><b><h3>Descrição sobre o convidado</h3></b>	</label>
				<textarea  type="text" name="descricao" class="form-control" id="descricao"></textarea>
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
  $nome = $_POST["nome"];
  $desc = $_POST["descricao"];
  $instituicao = $_POST["instituicao"];
  $email = $_POST["email"];
  $area = $_POST["area"];

  $conn = obterConexao();
  $sql = "SELECT * FROM convidado WHERE email = '" . $email . "';";
  $result = mysqli_query($conn, $sql);
  if($registro = mysqli_fetch_array($result)){
		echo "Convidado ja existe!";
	} else {
    $pod = obterConvidados();
    $diretorio = "Images/";
    $target_file = $diretorio . basename($_FILES["imgconv"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $novaimagem = md5(uniqid()) . '-' . time() . '.'.$imageFileType;
    $check = getimagesize($_FILES["imgconv"]["tmp_name"]);
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
    if ($_FILES["imgconv"]["size"] > 50000000) {
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
        if (move_uploaded_file($_FILES["imgconv"]["tmp_name"], '../Images/'.$novaimagem)) {
           // echo "A imagem ". basename( $_FILES["linkimg"]["name"]). " foi enviado com sucesso.";
        } else {
            //echo "Sua imagem não foi aceita, selecione outra.";
        }
    }
  }
    $podd = mysqli_query($conn, "INSERT INTO convidado VALUES (DEFAULT, '$nome',  '$instituicao', '$email', '$area', '$novaimagem', '$desc')");
    header("Location: ListConvidados.php");
  }
?>
