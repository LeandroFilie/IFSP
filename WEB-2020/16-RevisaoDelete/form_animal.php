<?php
include "conf.php";

cabecalho();

echo '
<div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-6 py-4" id="form">
    <div class="container">
        <center><span class="h3">Cadastrar Animal</span></center>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="nome" id="nome" placeholder="Nome do Animal" class="form-control" required= "required"/>
                </div>
            </div>
            <div class="form-group">    
                <select name="especie" id="especie" class="form-control" required>
                    <option label="::Selecione a Espécie::"></option>';
                        include "conexao.php";
                        $select = "SELECT id_especie, nome FROM especie";
                        $resultado = mysqli_query($conexao,$select);
                        while($linha=mysqli_fetch_assoc($resultado)){
                            echo '<option value='.$linha["id_especie"].'>'.$linha["nome"].'</option>';
                        }
                echo '
                </select>
            </div>
            <div class="form-group">
                <div id="raca">
                    <select name="raca" class="form-control" disabled>
                        <option label="::Selecione a Raça::"></option>
                    </select>
                </div>
            </div>
            <div class="form-group">    
                <select name="cliente" id="cliente" class="form-control" required>
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
        <center><button type="submit" id="enviar" class="btn btn-dark">Cadastrar</button></center>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#especie").change(function(){
            var especie = $("#especie").val();
            $.post("select_raca.php",{"especie":especie},function(racas){
                console.log(racas);
                texto = "<select name=\"raca\" id=\"cod_raca\" class=\"form-control\" required><option label=\"::Selecione a Raça::\"></option>";
                $.each(racas.raca,function(i,v){
                    texto += "<option value=" +v.id_raca+ ">" +v.nome+ "</option>";
                });
                texto += "</select>";
                $("#raca").html(texto);
            });
        });
        $("#enviar").click(function(){
            var nome = $("#nome").val();
            var raca = $("#cod_raca").val();
            var cliente = $("#cliente").val();
            $.post("insere.php",{"nome":nome,"identifica":4,"raca":raca,"cliente":cliente},function(msg){
                $("#form").html("<h3>"+msg+"</h3>");
            });
        });
    });
</script>
';

rodape();

?>