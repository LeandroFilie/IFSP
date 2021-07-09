<?php

    include "conexao.php";

    $nome = $_POST["nome"];
    $id_especie = $_POST["id_especie"];

    $update = "UPDATE especie SET nome='$nome'
                                WHERE
                                id_especie='$id_especie'";
    
    mysqli_query($conexao,$update)
        or die("Erro: " . mysqli_error($conexao));

    echo "1";

?>