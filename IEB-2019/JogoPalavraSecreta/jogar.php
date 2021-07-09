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
            Está na hora de JOGAR
        </title>
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    </head>
    <body class="text-center">
        <?php
        include "cabecalho.inc";
        include "funcoes.inc";
        include "menu_jogador.inc";

        echo '<div class="login-form col-sm-6 offset-sm-3 col-md-4 offset-md-4">';
            if(empty($_POST)){
                sortear_palavra();
                inicializar_jogo();
                include "form_jogo.inc";
            }
            else{
                jogar();
            }

            
        echo '</div>';
        
        ?>
        
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src='js/validaform.min.js'></script>
    </body>

    <?php
        include "rodape.inc";
    ?>
</html>