<!DOCTYPE html>
<html lang=pt-br>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
    <form method="POST" action="disciplina.php">
        <input type="text" name="dados" placeholder="Nome disciplina ou descrição..." style="width:300px" /><br /><br />
        <select name="prof">
            <option value="">::Professor::</option>
            <?php 
                include "conexao.php";
                $select = "SELECT nome, prontuario FROM professor";
                $resultado = mysqli_query($conexao, $select);
                while($linha=mysqli_fetch_assoc($resultado)){
                    echo '<option value='.$linha["prontuario"].'>'.$linha["nome"].'</option>';
                }
            ?>
        </select>
        <button>Pesquisar</button>
        <hr />
    </div>
    <table border="1" cellspacing="0">
        <tr>
            <th colspan="3">Disciplina</th>
        </tr>
        <tr>
            <th>Nome</th>
            <th>Descricao</th>
            <th>Professor</th>
        </tr>
        <?php
            include "conexao.php";

            $select = "SELECT disciplina.nome, disciplina.descricao, professor.nome as professor FROM disciplina INNER JOIN professor ON disciplina.cod_prof = professor.prontuario";

            if(!empty($_POST)){
                $select .= " WHERE (1=1)";
                if(!empty($_POST["dados"])){
                    $dados = $_POST["dados"];
                    $select .= " AND disciplina.nome like '%$dados%' OR disciplina.descricao like '%$dados%'";
                }
                if($_POST["prof"]!=""){
                    $prof = $_POST["prof"];
                    $select .= " AND professor.prontuario = '$prof'";
                }
            }

            $resultado = mysqli_query($conexao, $select);

            while($linha=mysqli_fetch_assoc($resultado)){
                echo '<tr>
                        <td>'.$linha["nome"].'</td>
                        <td>'.$linha["descricao"].'</td>
                        <td>'.$linha["professor"].'</td>
                    </tr>';
            }
        ?>
    </table>
    </form>
</body>
</html>





