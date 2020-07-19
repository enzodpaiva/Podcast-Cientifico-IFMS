<?php
    include_once ('../Funcao.php');
    $conn = obterConexao();

    $id = $_POST['id'];
    $sql = "DELETE FROM podcast_convidado WHERE id_podcast_conv = '" . $id . "';";

    $servico = mysqli_query($conn, $sql);

    header("Location: ListPodTema.php");

?>
