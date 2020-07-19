<?php
	include_once ('../Funcao.php');
	include_once ('../VerificaLogin.php') ;
$id = $_POST['id'];
$sql = "SELECT * FROM convidado WHERE id = '" . $id . "';";
$conn = obterConexao();
$funcao = mysqli_query($conn, $sql);
$registro = mysqli_fetch_array($funcao);
?>

<?php
if (isset($_POST["Enviar"])) {
  $nome = $_POST["nome"];
  $desc = $_POST["descricao"];
  $instituicao = $_POST["instituicao"];
  $email = $_POST["email"];
  $area = $_POST["area"];

	$sql2 = "SELECT * FROM convidado WHERE email = '" . $email . "';";
	$result = mysqli_query($conn, $sql2);

	if ($registro = mysqli_fetch_array($result) && $registro["id"] != $id) {
		//echo 'Os dados que você está inserindo ja existem';
	} else {
		if (!empty($_FILES['imgconv']['name'])) {
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
			$quarto = mysqli_query($conn, "UPDATE convidado SET nome = '$nome', instituicao = '$instituicao', email = '$email', area = '$area', img_convidado = '$novaimagem', desc_convidado = '$desc' WHERE id = '$id'");
		}else{
			$sql = mysqli_query($conn, "UPDATE convidado SET nome = '$nome', instituicao = '$instituicao', email = '$email', area = '$area', desc_convidado = '$desc' WHERE id = '$id'");
			$quarto = mysqli_query($conn, $sql);
		}
		//echo "Função Alterada";
    header("Location: ListConvidados.php");
		exit(0);

	}
}
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
  <link rel="stylesheet" type="text/css" href="../Estilo_PI.css" />
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
        <form action="#" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $id ?>" />
          <div class="form-group ">
            <label for="nome"><b>
                <h3>Nome</h3>
              </b> </label>
            <input type="text" name="nome" class="form-control" id="nome" value="<?= $registro['nome'] ?>">
          </div>
          <div class="form-group ">
            <label for="instituicao"><b>
                <h3>Instituição</h3>
              </b> </label>
            <input type="text" name="instituicao" class="form-control" id="instituicao" value="<?= $registro['instituicao'] ?>">
          </div>
          <div class="form-group ">
            <label for="email"><b>
                <h3>E-mail</h3>
              </b> </label>
            <input type="email" name="email" class="form-control" id="email" value="<?= $registro['email'] ?>">
          </div>
          <div class="form-group ">
            <label for="area"><b>
                <h3>Area de atuação do convidado</h3>
              </b> </label>
            <input type="text" name="area" class="form-control" id="area" value="<?= $registro['area'] ?>">
          </div>
          <div class="form-group">
            <label for="imgconv">Imagem do convidado</label>
            <input type="file" name="imgconv" class="form-control-file" id="imgconv" value="<?= $registro['img_convidado'] ?>">
						<img class="img-responsive" src="../Images/<?=$registro['img_convidado']?>">
					</div>
          <div class="form-group ">
            <label for="descricao"><b>
                <h3>Descrição sobre o convidado</h3>
              </b> </label>
            <textarea type="text" name="descricao" class="form-control" id="descricaotextarea"><?= $registro['desc_convidado'] ?></textarea>
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
