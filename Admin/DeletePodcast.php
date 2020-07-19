<?php
    include_once ('../Funcao.php');
    $conn = obterConexao();

    $id = $_POST['id'];

    $podcast = obterPodcastPorID($id);

    $file = "../Images/".$podcast["link_img"];
		if (!unlink($file))
		  {
		  echo ("Error deleting $file");
		  }
		else
		  {
		  echo ("Deleted $file");
		  }

    $servico = mysqli_query($conn, "DELETE FROM podcast WHERE id = '" . $id . "';");

    header("Location: ListPodcast.php");

?>