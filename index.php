<?php
	include_once "Funcao.php";
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
		<link rel="stylesheet" type="text/css" href="Estilo_PI.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
		<div class="container">
			<?php include 'menu.php';?>
			<div id="conteudoo">
				<div class="flex-container">
					<?php
					if(isset($_GET['pesquisar'])){
						$pods = obterResultadoPesquisa($_GET['pesquisar']);
						foreach ($pods as $pod) {
							echo "<div  id='yy'><a href='Episodio.php?id=". $pod['id']. "'><img id='Apresentation' src='Images/".$pod['link_img'] ."' alt='Example.jpeg'></a></div>";
						}
					}
					else{
						$pods = obterPodCast();
						foreach ($pods as $pod) {
							echo "<div  id='yy'><a href='Episodio.php?id=". $pod['id']. "'><img id='Apresentation' src='Images/".$pod['link_img'] ."' alt='Example.jpeg'></a></div>";
						}
					}

					 ?>


				</div>
			</div>
			<footer class="footer">
				<?php include 'rodape.php';?>
			</footer>
		</div>
  </body>
</html>
