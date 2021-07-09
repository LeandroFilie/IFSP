<?php
include "conf.php";
include "conexao.php";

cabecalho();
include "script_remover.php";


echo '
<div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
    <form method="POST" action="lista_animal.php">
        <div class="form-group">
            <select name="especie" id="especie" class="form-control">
                <option value="">::Selecione uma Espécie::</option>';
                $select = "SELECT id_especie, nome FROM especie";
                $resultado = mysqli_query($conexao,$select);

                while($linha=mysqli_fetch_assoc($resultado)){
                    echo '<option value='.$linha["id_especie"].'>'.$linha["nome"].'</option>';
                }
echo '          </select>
        </div>
        <div class="form-group">
            <div id="raca">
                <select name="raca" class="form-control" disabled>
                    <option label="::Selecione a Raça::"></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="text" name="nome" placeholder="Nome do Animal" class="form-control" />
            </div>
        </div>
        <div class="form-group">    
            <select name="cliente" id="cliente" class="form-control">
                <option label="::Selecione o dono do animal::"></option>';
                    include "conexao.php";
                    $select = "SELECT id_cliente, nome FROM cliente";
                    $resultado = mysqli_query($conexao,$select);
                    while($linha=mysqli_fetch_assoc($resultado)){
                        echo '<option value='.$linha["id_cliente"].'>'.$linha["nome"].'</option>';
                    }
            echo '
            </select>
        </div>
        <center><button type="submit" class="btn btn-dark">Pesquisar Animal</button></center>
    </form>
    
</div>
<div id="msg"></div>
<table class="table">
    <tr style="text-align:left">
        <th>Nome da Animal</th>
        <th>Espécie</th>
        <th>Raça</th>
        <th>Nome do Dono</cliente>
        <th>Ação</th>
    </tr>
';
$select = "SELECT id_animal, animal.nome as nome_animal, especie.nome as nome_especie, raca.nome as nome_raca, cliente.nome as nome_cliente FROM animal INNER JOIN raca ON animal.cod_raca = raca.id_raca INNER JOIN especie ON raca.cod_especie = especie.id_especie INNER JOIN cliente ON animal.cod_cliente = cliente.id_cliente";
if(!empty($_POST)){
    if($_POST["especie"] != ""){
        if(isset($_POST["raca"]) && $_POST["raca"]!=""){
            $raca = $_POST["raca"];
            $select .= " AND animal.cod_raca = '$raca'";
        }
        else{
            $especie = $_POST["especie"];
            $select .= " AND raca.cod_especie = '$especie'";
        }   
    }
    if($_POST["nome"]!=""){
        $nome = $_POST["nome"];
        $select .= " AND animal.nome LIKE '%$nome%'";
    
    }
    if($_POST["cliente"]!=""){
        $cliente = $_POST["cliente"];
        $select .= " AND animal.cod_cliente = '$cliente'";
    }
}

$resultado = mysqli_query($conexao,$select); 

while($linha = mysqli_fetch_assoc($resultado)){
    echo '<tr>
            <td>'.$linha["nome_animal"].'</td>
            <td>'.$linha["nome_especie"].'</td>
            <td>'.$linha["nome_raca"].'</td>
            <td>'.$linha["nome_cliente"].'</td>
            <td><button class="btn btn-danger remover_animal" value="'.$linha["id_animal"].'">Remover</button></td>
        </tr>'; 
}
echo "</table>";
echo '
<script>
$(document).ready(function(){
    $("#especie").change(function(){
        var especie = $("#especie").val();
        $.post("select_raca.php",{"especie":especie},function(racas){
            console.log(racas);
            texto = "<select name=\"raca\" id=\"raca\" class=\"form-control\"><option label=\"::Selecione a Raça::\"></option>";
            $.each(racas.raca,function(i,v){
                texto += "<option value=" +v.id_raca+ ">" +v.nome+ "</option>";
            });
            texto += "</select>";
            $("#raca").html(texto);
        });
    });
});
</script>
';

rodape();

?>