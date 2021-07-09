<?php
    session_start();

    if(empty($_SESSION)){
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
		<meta charset="utf-8">
        <title>
            Página inicial - Administrador
        </title>
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    </head>
    <body class="text-center">
        <?php
        include "cabecalho.inc";
        include "menu.inc";
        include "mensagem1.inc";
        include "rodape.inc";
        ?>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src='js/validaform.min.js'></script>
    </body>
</html>