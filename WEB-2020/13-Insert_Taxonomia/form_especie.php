<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $(function(){
            $("#familia").change(function(){
                var familia = $("#familia").val();
                $.post("seleciona_genero.php",{"familia":familia},function(g){
                    console.log(g);
                    texto = "<select name='s_genero' id='s_genero' required><option label='::Selecione um genero::'></option>";
                    i = 0;
                    $.each(g.genero,function(i,v){
                        
                        texto += "<option value=" +v.id_genero+ ">" +v.nome_cientifico+ "</option>";
                    });
                    texto += '</select>';
                    $("#genero").html(texto);
                });
            });
        });
    </script>
</head>
<body>
    <?php include "cabecalho.inc" ?>
    <form method="POST" action="form_especie.php">
    <table>
        <tr>
            <td>
                <select name="familia" id="familia" required>
                    <option label="::Selecione uma família::"></option>
                    <?php
                        include "conexao.php";
                        $select = "SELECT id_familia, nome_cientifico FROM familia";
                        $resultado = mysqli_query($conexao,$select);
                        while($linha=mysqli_fetch_assoc($resultado)){
                            echo '<option value='.$linha["id_familia"].'>'.$linha["nome_cientifico"].'</option>';
                        }
                    ?>
                </select>
            </td>
            <td>
                <div id="genero">
                    <select name="s_genero" id="s_genero" disabled required>
                    <option label="::Selecione um Genêro::"></option> 
                    </select>
                </div>
            </td>
        </tr>
    </table>
    <input type="text" name="nome" placeholder="Nome..." required />
    <input type="text" name="nome_cientifico" placeholder =  "Nome cientifíco..." required /><br /><br />
    <button>Cadastrar</button><hr />

    <?php
        include "conexao.php";

        if(!empty($_POST)){
            $nome = $_POST["nome"];
            $nome_cientifico = $_POST["nome_cientifico"];
            $genero = $_POST["s_genero"];

            $insert = "INSERT INTO especie(
                            nome,
                            nome_cientifico,
                            cod_genero
                            )
                            VALUES(
                                '$nome',
                                '$nome_cientifico',
                                '$genero'
                            )";
            mysqli_query($conexao,$insert) or 
                                        die(mysqli_error($conexao));
            echo '<div style="width:650px;height:20px;background-color:#dcdde1;text-align:center;">
            <b>Taxonomia - Espécie</b> cadastrada com sucesso.
            </div>';
        }
    ?>
</body>
</html>