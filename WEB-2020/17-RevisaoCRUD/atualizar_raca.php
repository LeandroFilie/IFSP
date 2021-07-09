<?php

    include "conexao.php";

    $nome = $_POST["nome"];
    $cod_especie = $_POST["cod_especie"];
    $id_raca = $_POST["id_raca"];

    $update = "UPDATE raca SET nome='$nome',
                                cod_especie='$cod_especie'
                                WHERE
                                id_raca='$id_raca'";
    
    mysqli_query($conexao,$update)
        or die("Erro: " . mysqli_error($conexao));

    echo "1";

?>