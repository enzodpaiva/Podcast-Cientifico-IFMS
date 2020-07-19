<?php
    include_once ('../Funcao.php');
    $conn = obterConexao();

    $id = $_POST['id'];

    $sql = "DELETE FROM podcast_tema WHERE id_podcast_tema = '" . $id . "';";
    // var_dump($sql);
    // exit(0);

    $servico = mysqli_query($conn, $sql);

    header("Location: ListPodTema.php");

?>
