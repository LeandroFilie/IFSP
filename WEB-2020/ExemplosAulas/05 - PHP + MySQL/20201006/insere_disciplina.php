<?php
    include "cabecalho.php";
    include "conexao.php";

    $nome = $_POST["nome"];
    $descricao  = $_POST["descricao"];
    $cod_professor = $_POST["cod_professor"];

    $insert = "INSERT INTO disciplina(
                    nome,
                    descricao,
                    cod_professor)
                    VALUES(
                        '$nome',
                        '$descricao',
                        '$cod_professor'
                    )";
    mysqli_query($conexao,$insert) or 
                        die(mysqli_error($conexao));
    echo "Disciplina inserida com sucesso";
?>
</body>
</html>