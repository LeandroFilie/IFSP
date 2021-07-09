<?php
    session_start();

    if(empty($_SESSION)){
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<title>Ranking</title>
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>
	<body>
        <?php
            echo '<div class="text-center">';
                include "cabecalho.inc";
                include "menu_jogador.inc";
                include "funcoes.inc";
                
                if(file_exists("usuarios.xml")){
                    include "ranking.inc";
                }
                else{
                    echo '<br/><br/><br/><h2>Não há jogadores cadastrados</h2>';
                }
            echo '</div>';
            include "rodape.inc";
        ?>
        <script src = "js/funcoes.js"></script>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src='js/validaform.min.js'></script>
	</body>
</html>