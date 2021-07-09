<?php
    session_start();

    if(empty($_SESSION)){
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" lang="pt-br">
        <title>
            Cadastro Palavras
        </title>
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    </head>
    <body class="text-center">
        <header>
            <img class="img-fluid" src="images/logo.png">
        </header>
        <?php
            include "menu.inc";
            include "funcoes.inc";
            if(empty($_POST)){
                include "form_palavra.inc";
            }
            else{
                if(!file_exists("palavra.xml")){
                    gravar_dados_palavra();
                }
                else {
                    if (verifica_palavra()) {
                        gravar_dados_palavra();
                    }
                    else {
                        echo "<br/><br/><br/><h2>Palavra já cadastrada!</h2>";
                    }
                }
            }
            
     
            include "rodape.inc";
       ?>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src='js/validaform.min.js'></script>
        <script src='js/funcoes.js'></script>
    </body>
</html>
