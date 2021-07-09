<?php

include "conf.php";


$prontuario = $_POST["prontuario"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$data_nascimento = $_POST["data_nascimento"];
$sexo = $_POST["sexo"];

$insert = "INSERT INTO aluno VALUES ('$prontuario','$nome','$email','$data_nascimento','$sexo')";

mysqli_query($conexao,$insert)
    or die("erro: ". mysqli_error($conexao));
    //or die("Erro ao inserir aluno.");

cabecalho();

echo "Aluno inserido com sucesso.";

rodape();

?>