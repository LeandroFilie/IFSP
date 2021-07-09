<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
    <form method="POST" action="professor.php">
        <input type="text" name="dados" placeholder="Nome professor, formacao ou prontuário..." style="width:300px" /><br /><br />
        <button>Pesquisar</button>
        <hr />
    </div>
    <table border="1" cellspacing="0">
        <tr>
            <th colspan="3">Professor</th>
        </tr>
        <tr>
            <th>Prontuario</th>
            <th>Nome</th>
            <th>Formacao</th>
        </tr>
        <?php
            include "conexao.php";
            
            $select = "SELECT * FROM professor";

            if(!empty($_POST)){
                $select .= " WHERE (1=1)";
                if($_POST["dados"]!=""){
                    $dados = $_POST["dados"];
                    $select .= " AND nome like '%$dados%' OR prontuario = '$dados' OR formacao like '%$dados%'";
                }
            }
            
            $resultado = mysqli_query($conexao, $select);

            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<tr>
                        <td>'.$linha["prontuario"].'</td>
                        <td>'.$linha["nome"].'</td>
                        <td>'.$linha["formacao"].'</td>
                    </tr>';
            }
            echo "</table>";
        ?>
    </table>
    </form>
</body>
</html>