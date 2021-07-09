<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Página de Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/login.css" />
        <link rel="stylesheet" type="text/css" href= "https://fonts.googleapis.com/icon?family=Material+Icons" />
    </head>
    <body>
        <?php 
            
            if(isset($_SESSION["emailCad"])){
                if($_SESSION["emailCad"]){
                    echo '
                    <div class="text-center alert alert-dark alert-dismissible fade show" role="alert"">
                        <strong>E-mail já cadastrado.</strong> Digite um novo email.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
                    </div>';
                    $_SESSION["emailCad"] = false;
                }
            }
            
            include "funcoes.inc";
            echo'
            <div class="login-form col-sm-6 offset-sm-3 col-md-4 offset-md-4">';
                include "form_login.inc";
                include "form_usuario.inc";
            echo '</div>';
        ?>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src='js/validaform.min.js'></script>
        <script src="js/funcoes.js"></script>
    </body>
</html>
