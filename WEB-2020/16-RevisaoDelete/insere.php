<?php
    include "conexao.php";

    $identifica = $_POST["identifica"];
    // 1 -> especie
    // 2 -> raca
    // 3 -> cliente
    // 4 -> animal
    
    if($identifica == 1){ //especie
        $nome = $_POST["nome"];
        
        $insert = "INSERT INTO especie(
            nome
            )
            VALUES(
                '$nome'
            )";

        echo "Espécie Cadastrada com Sucesso.";
    }
    else if($identifica == 2){ //raça
        $nome = $_POST["nome"];
        $especie = $_POST["especie"];

        $insert = "INSERT INTO raca(
            nome,
            cod_especie
            )
            VALUES(
                '$nome',
                '$especie'
            )";
        echo "Raça Cadastrada com Sucesso.";
    }
    else if($identifica == 3){ //cliente
        $nome =  $_POST["nome"];
        $cpf =  $_POST["cpf"];
        $telefone = $_POST["tel"];

        $insert = "INSERT INTO cliente(
            nome,
            cpf,
            telefone
            )
            VALUES(
                '$nome',
                '$cpf',
                '$telefone'
            )";
        
        echo "Cliente Cadastrado com Sucesso.";
    }
    else if($identifica == 4){ //animal
        $raca =  $_POST["raca"];
        $nome =  $_POST["nome"];
        $cliente =  $_POST["cliente"];

        $insert = "INSERT INTO animal(
            cod_raca,
            nome,
            cod_cliente
            )
            VALUES(
                '$raca',
                '$nome',
                '$cliente'
            )";

        echo "Animal Cadastrado com Sucesso.";
    }

    mysqli_query($conexao,$insert) or 
                                    die(mysqli_error($conexao));

    $identifica = 0;

?>