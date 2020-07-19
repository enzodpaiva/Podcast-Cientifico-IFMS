<?php
include_once 'Funcao.php';
$pod = obterPodcastPorID($_GET['id']);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
		<meta charset="utf-8">
		<meta name="author" content="Enzo Paiva">
		<meta name="copyright" content="IFMS">
		<meta name="language" content="pt-br" />
		<meta name="keywords" content="página de conteúdo educacional">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="Estilo_PI.css"/>
		<link rel="stylesheet" type="text/css" href="Episodio.css"/>
  </head>

  <body >
		<div class="container">
			<?php include 'menu.php';?>
				<div id="conteudoo">
					<div class="container">
						<div id="cinza">
							<div class="titulo">
								<?php
								echo "<h3>".$pod['titulo']."</h3>";
								echo "<p>". $pod['data'] ."</p>";
								?>
							</div>
							<div class="embed-responsive embed-responsive-16by9">
  							<iframe class="embed-responsive-item" src="<?php echo "https://www.youtube.com/embed/".$pod['youtube']; ?>" allowfullscreen></iframe>
							</div>

						<div class="informacoes">
							<h2 class="cc">Descrição</h2>
							<?php
								echo "<p>".$pod['descricao']."</p>";
							 ?>
						<br>

							<h2 class="cc"> Convidados</h2>
								<div class="container-fluid">
									<div class="row">
										<?php
										$convidados = obterConvidadoPodCast($_GET['id']);
										foreach($convidados as $con){
											echo $con['nome'];
											echo "<div><td class='col'> <img class='img-responsive' src='Images/" .$con['img_convidado']." 'width='15%'> </td></div>";
											echo "<div><td class='col'>" .$con['desc_convidado'] ."</td></div>";
											echo "<br>";
										}

										?>
									</div>
								</div>


							</div>
					</div>

							
					</div>
				</div>
					<?php include 'rodape.php';?>
			</div>
		</div>

  </body>
  
</html>
