<?php
    include "conexao.php";

    $select = "SELECT * FROM aluno ORDER BY nome";

    $resultado = mysqli_query($conexao,$select);

    while($linha = mysqli_fetch_assoc($resultado)){
        echo "Prontuario Aluno: ".$linha["prontuario"]."<br />";
        echo "Nome Aluno: ".$linha["nome"]."<br />";
        echo "Email Aluno: ".$linha["email"]."<br />";
        echo "Data de Nascimento Aluno: ".$linha["data_nascimento"]."<br />";
        echo "Sexo Aluno: ".$linha["sexo"]."<br />";
        echo "<hr />";
    }
?>