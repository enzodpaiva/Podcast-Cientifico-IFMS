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
                <div>
                <fieldset>
			<legend>
				<h2>Temas de Podcast</h2>
			</legend>
			<table class="table table-bordered  ">
            <caption><a class="btn btn-primary glyphicon glyphicon-plus" href="CadPodTema.php" role="button"> Cadastrar Novo</a></caption>
				<tr>
					<th>
						Podcast
					</th>
                    <th>
						Tema
					</th>
					<th>
						Deletar
					</th>
					<th>
						Atualizar
					</th>

                </tr>
            </div>
                <?php
                    $pods = obterTema_Podcast();
					foreach ($pods as $pod) {
                        echo "<tr>";
                        echo "<td>" . $pod["titulo"] . "</td>";
                        echo "<td>" . $pod["descricao"] . "</td>";
                        echo "<td> <form action='DeletePodTema.php' method='post'>
				             <input type='hidden' name='id' value=" .$pod['id_podcast_tema'].">
							<button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> remover</button></form>
							</td>";
							echo "<td> <form action='UpdatePodTema.php' method='post'>
				             <input type='hidden' name='id' value=" .$pod['id_podcast_tema'].">
							 <button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span> atualizar</button></form>
							</td>";
						echo "</tr>";
                    }
				?>
			</table>
			</fieldset>
                </div>
			</div>
			<footer class="footer">
			<?php include_once ('../rodape.php');?>
			</footer>
		</div>
  </body>
  </body>
</html>
