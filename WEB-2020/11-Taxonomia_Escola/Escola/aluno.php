<?php
    include "conexao.php";
    
    $select = "SELECT * FROM aluno";
    $resultado = mysqli_query($conexao, $select);
    
    echo'<table border="1" cellspacing="0">
            <tr>
                <th colspan="5">Aluno</th>
            </tr>
            <tr>
                <th>Prontuario</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data de Nascimento</th>
                <th>Sexo</th>
            </tr>';

    while($linha=mysqli_fetch_assoc($resultado)){
        echo '<tr>
                <td>'.$linha["prontuario"].'</td>
                <td>'.$linha["nome"].'</td>
                <td>'.$linha["email"].'</td>
                <td>'.$linha["data_nasc"].'</td>
                <td>'.$linha["sexo"].'</td>
            </tr>';
    }
    echo "</table>";
?>