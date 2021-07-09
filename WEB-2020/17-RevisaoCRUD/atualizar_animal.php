<?php

    include "conexao.php";

    $nome = $_POST["nome"];
    $cliente = $_POST["cliente"];
    $raca = $_POST["raca"];
    $id_animal = $_POST["id_animal"];

    $update = "UPDATE animal SET nome='$nome',
                                cod_cliente='$cliente',
                                cod_raca='$raca'
                                WHERE
                                id_animal='$id_animal'";

    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));

    echo "1";

?>