<!DOCTYPE html>
<?php
	include_once "Funcao.php";
 ?>
<html lang="pt-br">
	<head>
		<meta http-equiv="content-type" content="text/html">
		<meta charset="UTF-8"/>
		<meta name="author" content="Enzo Paiva">
		<meta name="copyright" content="IFMS">
		<meta name="keywords" content="página de conteúdo educacional">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="Estilo_PI.css"/>
		<link rel="stylesheet" type="text/css" href="Categorias.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body background="corno.jpg">
		<div class="container">
			<?php include 'menu.php';?>
			<div id="content-main">
				<div id="content">
					<div id="select" class="flex-container">
						<form action=Categorias.php method="get">
							<select class="form-control" name="tema">
								<option value="0">Selecione o tema...</option>
								<?php
								$temas = obterTema();
								foreach ($temas as $tema) {
									echo "<option value=" . $tema['id'] . ">" . $tema['descricao'] . "</option>";
								}

								?>
							</select>
							<select class="form-control" name="convidado">
								<option value="0">Selecione o participante...</option>
								<?php
								$convidados = obterConvidados();

								foreach ($convidados as $convidado) {
									echo "<option value=" . $convidado['id'] . ">" . $convidado['nome'] . "</option>";
								}
								?>
							</select>
							<input type="submit" name="submit" class="btn btn-primary" value="Submit">
						</form>

					</div>
				</div>
				<div id="content2" class="flex-container">
					
				<?php

				if( isset($_GET['convidado'])|| isset($_GET['tema']) ){
					$pods = obterResultado($_GET['convidado'], $_GET['tema']);
					foreach ($pods as $pod) {
						echo "<div  id='yy'><a href='Episodio.php?id=". $pod['id']. "'><img id='Apresentation' src='Images/".$pod['link_img'] ."' alt='Example.jpeg'></a></div>";
					}
				}else{
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
		<script	type="text/javascript" src="Selection.js"></script>
  </body>
</html>
