<?php
    include "conexao.php";
    
    $select = "SELECT turma.id_ad, aluno.nome as aluno, disciplina.nome as disciplina FROM turma INNER JOIN aluno ON turma.cod_aluno = aluno.prontuario INNER JOIN disciplina ON turma.cod_disciplina = disciplina.id_disciplina";
    $resultado = mysqli_query($conexao, $select);
    
    echo'<table border="1" cellspacing="0">
            <tr>
                <th colspan="3">Disciplina</th>
            </tr>
            <tr>
                <th>Turma</th>
                <th>Aluno</th>
                <th>Disciplina</th>
            </tr>';

    while($linha=mysqli_fetch_assoc($resultado)){
        echo '<tr>
                <td>'.$linha["id_ad"].'</td>
                <td>'.$linha["aluno"].'</td>
                <td>'.$linha["disciplina"].'</td>
            </tr>';
    }
    echo "</table>";
?>