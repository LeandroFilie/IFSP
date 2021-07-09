<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Espécie</title>
    <style>input,select{margin:2px;};</style>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="acessibilidade.js"></script>
    <script>
        $(function(){
            $("#familia").change(function(){
                var familia = $("#familia").val();
                $.post("seleciona_genero.php",{"familia":familia},function(g){
                    console.log(g);
                    texto = "<select name='s_genero' id='s_genero'><option value=''>::Selecione um genero::</option>";
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
    <h1>Lista Espécie</h1>
    <main>
        <b>Filtrar por:</b>
        <form method="POST" action="listar_especie.php">
        <table>
            <tr>
                <td>
                    <select name="familia" id="familia">
                        <option value="">::Selecione uma família::</option>
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
                        <select name="s_genero" id="s_genero" disabled>
                            <option value="">::Selecione um genero::</option>       
                        </select>
                    </div>
                </td>
            </tr>
        </table>
        <input type="text" name="nome_cientifico" placeholder =  "Nome cientifíco..." /><br /><br />
        <button>Pesquisar</button><hr /><br /><br />
        
        <table border="1" cellspacing="0">
            <tr><th colspan="4" style="text-align:left">ESPECIE</th></tr>
            <tr>
                <th>Nome</th>
                <th>Nome Cientifico</th>
                <th>Genero</th>
                <th>Familia</th>
            </tr>
            <?php
                include "conexao.php";

                $select = "SELECT especie.nome, especie.nome_cientifico as nome_cientifico_especie, genero.nome_cientifico as nome_cientifico_genero, familia.nome_cientifico as nome_cientifico_familia FROM genero INNER JOIN familia ON genero.cod_familia = familia.id_familia INNER JOIN especie ON especie.cod_genero=genero.id_genero";
                
                if(!empty($_POST)){     
                    if($_POST["familia"]!=""){   
                        if(isset($_POST["s_genero"]) && $_POST["s_genero"]!=""){
                            $s_genero = $_POST["s_genero"];
            
                            $select .= " AND genero.id_genero = '$s_genero'";
                        }else{
                            $familia = $_POST["familia"];
            
                            $select .= " AND familia.id_familia = '$familia'";       

                        }         
                    }
                    if($_POST["nome_cientifico"]!=""){
                        $nome_cientifico = $_POST["nome_cientifico"];
                        
                        $select .= " WHERE especie.nome_cientifico like '%$nome_cientifico%'";
                    } 
                }
                
                $resultado = mysqli_query($conexao,$select); 
                
                while($linha = mysqli_fetch_assoc($resultado)){
                    echo '<tr>
                            <td>'.$linha["nome"].'</td>
                            <td style="font-style:italic;">'.$linha["nome_cientifico_especie"].'</td>
                            <td style="font-style:italic;">'.$linha["nome_cientifico_genero"].'</td>
                            <td style="font-style:italic;">'.$linha["nome_cientifico_familia"].'</td>
                        </tr>'; 
                }
            ?>
        </form>
        </table>
    </main>
</body>
</html>



