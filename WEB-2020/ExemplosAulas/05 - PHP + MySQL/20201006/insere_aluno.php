<?php
    include "cabecalho.php";
    include "conexao.php";

    $prontuario = $_POST["prontuario"];
    $nome = $_POST["nome"];
    $email  = $_POST["email"];
    $sexo = $_POST["sexo"];
    $data_nascimento = $_POST["data_nascimento"];
    $disciplina = $_POST["disciplina"];
    
    $insert1 = "INSERT INTO aluno(
                    prontuario,
                    nome,
                    email,
                    sexo,
                    data_nascimento
                    )
                    VALUES(
                        '$prontuario',
                        '$nome',
                        '$email',
                        '$sexo',
                        '$data_nascimento'
                    )";
    mysqli_query($conexao,$insert1) or 
                        die(mysqli_error($conexao));

    for($i = 0; $i < sizeof($disciplina); $i++) {
        $insert2 = "INSERT INTO disciplina_aluno(
                        id_aluno,
                        cod_disciplina
                        )
                        VALUES(
                            '$prontuario',
                            '$disciplina[$i]'
                        )";
                        mysqli_query($conexao,$insert2) or 
                        die(mysqli_error($conexao));
                        }
    echo "Aluno inserido com sucesso";
?>
</body>
</html>


