<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "usbw";
    $bd = "taxonomia";

    $conexao = mysqli_connect($host,$usuario,$senha,$bd);

    if(!$conexao){
        die("Conexão com Banco de Dados falhou.");
    }
?>