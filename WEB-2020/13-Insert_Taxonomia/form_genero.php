<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php include "cabecalho.inc" ?>
    <form method="post" action="form_genero.php">
        <select name="familia" required>
            <option label="::Selecione uma família::"></option>
        <?php
            include "conexao.php";
            $select = "SELECT id_familia, nome FROM familia";
            $resultado = mysqli_query($conexao,$select);
            while($linha=mysqli_fetch_assoc($resultado)){
                echo '<option value='.$linha["id_familia"].'>'.$linha["nome"].'</option>';
            }
        ?>
        </select>
        <input type="text" name="nome_cientifico" placeholder="Nome Científico..." required/>
        <button>Cadastrar</button><hr />
    </form>
    <?php
        include "conexao.php";

        if(!empty($_POST)){
            $familia = $_POST["familia"];
            $nome = $_POST["nome_cientifico"];

            $insert = "INSERT INTO genero(
                            cod_familia,
                            nome_cientifico
                            )
                            VALUES(
                                '$familia',
                                '$nome'
                            )";
            mysqli_query($conexao,$insert) or 
                                die(mysqli_error($conexao));
            echo '<div style="width:650px;height:20px;background-color:#dcdde1;text-align:center;">
                    <b>Taxonomia - Genêro</b> cadastrado com sucesso.
                </div>';
        }
    ?>
</body>
</html>