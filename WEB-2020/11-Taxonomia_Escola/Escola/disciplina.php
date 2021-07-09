<?php
    include "conexao.php";
    
    $select = "SELECT disciplina.nome, disciplina.descricao, professor.nome as professor FROM disciplina INNER JOIN professor ON disciplina.cod_prof = professor.prontuario";
    $resultado = mysqli_query($conexao, $select);
    
    echo'<table border="1" cellspacing="0">
            <tr>
                <th colspan="3">Disciplina</th>
            </tr>
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Professor</th>
            </tr>';

    while($linha=mysqli_fetch_assoc($resultado)){
        echo '<tr>
                <td>'.$linha["nome"].'</td>
                <td>'.$linha["descricao"].'</td>
                <td>'.$linha["professor"].'</td>
            </tr>';
    }
    echo "</table>";
?>