<?php

    header('Content-Type: application/json');

    $familia = $_POST["familia"];

    include "conexao.php";

    $select = "SELECT genero.nome_cientifico, genero.id_genero FROM genero WHERE genero.cod_familia = '$familia'";

    $resultado = mysqli_query($conexao,$select);

    while($linha = mysqli_fetch_assoc($resultado)){
        $genero[] = $linha;
    }
    
    $generos["genero"] = $genero;

    echo json_encode($generos);
?>