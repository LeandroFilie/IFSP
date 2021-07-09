<?php

    include "conexao.php";

    $nome = $_POST["nome"];
    $id_cliente = $_POST["id_cliente"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];

    $update = "UPDATE cliente SET nome='$nome',
                                cpf = '$cpf',
                                telefone = '$telefone'
                                WHERE
                                id_cliente='$id_cliente'";
    
    mysqli_query($conexao,$update)
        or die("Erro: " . mysqli_error($conexao));

    echo "1";

?>