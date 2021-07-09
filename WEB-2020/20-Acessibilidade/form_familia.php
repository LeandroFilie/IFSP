<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Família</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="acessibilidade.js"></script>
</head>
<body>
    <?php include "cabecalho.inc" ?>
    <h1>Cadastrar Família</h1>
    <main>
        <form method="post" action="form_familia.php">
            <input type="text" name="nome" placeholder="Nome..." required/>
            <input type="text" name="nome_cientifico" placeholder="Nome Científico..." required/>
            <button>Cadastrar</button>
        </form>
        <hr />
        <?php
            include "conexao.php";
            if(!empty($_POST)){
                $nome = $_POST["nome"];
                $nome_cientifico  = $_POST["nome_cientifico"];

                $insert = "INSERT INTO familia(
                                nome,
                                nome_cientifico
                                )
                                VALUES(
                                    '$nome',
                                    '$nome_cientifico'
                                )";
                mysqli_query($conexao,$insert) or 
                                    die(mysqli_error($conexao));
                echo '<div style="width:650px;height:20px;background-color:#dcdde1;text-align:center;">
                        <b>Taxonomia - Familia</b> cadastrada com sucesso.
                    </div>';
            }
        ?>
    </main>
</body>
</html>