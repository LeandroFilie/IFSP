<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <b>Filtrar por:</b>
    <form method="POST" action="familia.php">
        <input type="text" name="nome" placeholder="Nome ou nome científico..." />
        <button>Pesquisar</button><br /><br />
    <table border="1" cellspacing="0">
        <tr><th colspan="2" style="text-align:left">FAMILIA</th></tr>
        <tr>
            <td>Nome</td>
            <td>Nome Cientifico</td>
        </tr>
        <?php
            include "conexao.php";

            $select = "SELECT * FROM familia";

            if(!empty($_POST)){
                $select .= " WHERE(1=1)";
                if($_POST["nome"] != ""){
                    $nome = $_POST["nome"];
                    $select .= " AND nome like '%$nome%' OR nome_cientifico like '%$nome%' ";
                }
            }

            $resultado = mysqli_query($conexao,$select);

            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<tr>
                        <td>'.$linha["nome"].'</td>
                        <td style="font-style:italic;">'.$linha["nome_cientifico"].'</td>
                    </tr>';
            }

        ?>
    </form>
    </table>
</body>
</html>