<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Gênero</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="acessibilidade.js"></script>
</head>
<body>
    <?php include "cabecalho.inc" ?>
    <h1>Lista Gênero</h1>
    <main>
        <b>Filtrar por:</b>
        <form method="POST" action="genero.php">
            <select name="familia">
                <option value="">::Selecione uma família::</option>
                <?php
                    include "conexao.php";
                    $select = "SELECT id_familia, nome FROM familia";
                    $resultado = mysqli_query($conexao,$select);

                    while($linha=mysqli_fetch_assoc($resultado)){
                        echo '<option value='.$linha["id_familia"].'>'.$linha["nome"].'</option>';
                    }
                ?>
            </select>
            <input type="text" name="nome" placeholder="Nome científico..." />
            <button>Pesquisar</button><hr /><br /><br />
            
        <table border="1" cellspacing="0">
            <tr><th colspan="2" style="text-align:left">GENERO</th></tr>
            <tr>
                <th>Nome Cientifico</th>
                <th>Familia</th>
            </tr>
            <?php
                include "conexao.php";

                $select = "SELECT genero.nome_cientifico, familia.nome FROM genero INNER JOIN familia ON genero.cod_familia = familia.id_familia";
                
                if(!empty($_POST)){
                    $select .= " WHERE (1=1)";
                    if($_POST["familia"] != ""){
                        $familia = $_POST["familia"];
                        $select .= " AND cod_familia = '$familia'";
                    }
                    if($_POST["nome"] != ""){
                        $nome = $_POST["nome"];
                        $select .= " AND genero.nome_cientifico like '%$nome%'";
                    }
                }

                $resultado = mysqli_query($conexao,$select);

                while($linha = mysqli_fetch_assoc($resultado)){
                    echo '<tr>
                            <td style="font-style:italic;">'.$linha["nome_cientifico"].'</td>
                            <td>'.$linha["nome"].'</td>
                        </tr>';
                }

            ?>
        </form>
        </table>
    </main>
</body>
</html>