<?php
    include_once ('../Funcao.php');
    $conn = obterConexao();

    $id = $_POST['id'];
		$convidado = obterConvidadoPorID($id);



		$file = "../Images/".$convidado["img_convidado"];
		if (!unlink($file))
		  {
		  echo ("Error deleting $file");
		  }
		else
		  {
		  echo ("Deleted $file");
		  }

    $servico = mysqli_query($conn, "DELETE FROM convidado WHERE id = '" . $id . "';");



  header("Location: ListConvidados.php");

?>
