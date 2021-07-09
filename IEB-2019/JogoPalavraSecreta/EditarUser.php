<?php
    session_start();

    if(empty($_SESSION)){
        header("location:index.php");
    }
    
    include "funcoes.inc";
    
    gravar_dados_usuario();

    header("Location: lista_usuarios.php");
?>