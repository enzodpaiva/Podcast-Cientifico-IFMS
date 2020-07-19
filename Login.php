<?php
    include_once ('Funcao.php');
?>
<?php
if (isset($_POST["enviar"])) {
    $login = $_POST["usuario"];
    $senha = $_POST["senha"];

    if (empty($login) || empty($senha)) {
        echo "Digite um login e uma senha!";
        exit;
    }
    $conn = obterConexao();
    $result = mysqli_query($conn, "SELECT * FROM adm WHERE usuario = '$login' and senha='$senha'");

    if ($registro = mysqli_fetch_array($result)) {
        session_start();
        $_SESSION["usuario"]["logado"] = true;
        $_SESSION["usuario"]["login"] = $registro["usuario"];
        $_SESSION["usuario"]["senha"] = $registro["senha"];
        header("location: Admin/ListPodcast.php");
        
    } else {
        echo "Login e/ou senha incorreto(s)!";
    }

    mysqli_close($conn);
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div class="container">
    <form method="post" action="#">
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" class="form-control" >
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control">
        </div>
        <button type="submit" name="enviar" class="btn btn-primary">Entrar</button>
    </form>
    </div>
</body>

</html>

