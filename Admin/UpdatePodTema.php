<?php
include_once ('../Funcao.php');
	include_once ('../VerificaLogin.php') ;
$id = $_POST['id'];
$registro = obterTema_PodcastbyId($id);
$conn= obterConexao();
$novotema = obterTemaNaoCadastrados($id);

//$registro = mysqli_fetch_array($funcao);
//var_dump($registro);
?>

<?php
if(isset($_POST["Enviar"])){
  $desc = $_POST["tema"];
    $quarto = mysqli_query($conn, "UPDATE podcast_tema SET tema_id = '$desc' WHERE id_podcast_tema = '$id'");
    //echo "Função Alterada";
    header("Location: ListPodTema.php");
  }

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
    <link rel="stylesheet" type="text/css" href="../Estilo_PI.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container">
        <?php include_once('../menu.php'); ?>
        <legend>
            Selecione novo Tema
        </legend>
        <div id="conteudoo">
        <div id="xo">
			<form  method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="form-group ">
          <select name="tema" class="form-control">
            <?php foreach ($novotema as $tema) :
                $essequarto = $registro['tema_id'] == $tema['id'];
                $selecao = $essequarto ? "selected='selected'" : "";
                ?>
                <option value="<?= $tema['id'] ?>" <?= $selecao ?>><?=  $tema['descricao'] ?>
                </option>
            <?php endforeach ?>
        </select>
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
