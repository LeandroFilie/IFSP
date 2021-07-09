<?php
include "conf.php";
cabecalho();
include "script_remover_aluno.php";

$select = "SELECT * FROM aluno ORDER BY nome";
$r = mysqli_query($conexao,$select)
    or die("Erro: " . mysqli_error($conexao));    

echo "
    <h3>Alunos</h3>
    <div id='msg'></div>
    <table>
        <tr>
            <th>Prontuário</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data Nascimento</th>
            <th>Sexo</th>
            <th>Ação</th>
        </tr>";

        while($l = mysqli_fetch_assoc($r)){
            echo "<tr>
                    <td>".$l["prontuario"]."</td>
                    <td>".$l["nome"]."</td>
                    <td>".$l["email"]."</td>
                    <td>".$l["data_nascimento"]."</td>
                    <td>".$l["sexo"]."</td>
                    <td>
                        <button class='btn btn-danger remover' value='".$l["prontuario"]."'>Remover</button>                       
                    </td>
                  </tr>";
        }
echo "</table>";
//variaveis $t e $c serão utilizadas no script_remover.php

rodape();

?>

