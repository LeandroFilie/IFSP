<?php
    include "cabecalho.php";
    include "conexao.php";

    $prontuario = $_POST["prontuario"];
    $nome = $_POST["nome"];
    $email  = $_POST["email"];
    $formacao = $_POST["formacao"];

    $insert = "INSERT INTO professor(
                    prontuario,
                    nome,
                    email,
                    formacao)
                    VALUES(
                        '$prontuario',
                        '$nome',
                        '$email',
                        '$formacao'
                    )";
    mysqli_query($conexao,$insert) or 
                        die(mysqli_error($conexao));
    echo "Professor inserido com sucesso";
?>
</body>
</html>