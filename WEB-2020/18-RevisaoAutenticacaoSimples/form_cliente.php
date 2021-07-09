<?php
include "conf.php";

cabecalho();
?>
<div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-6 py-4" id="form">
    <div class="container">
        <center><span class="h3">Cadastrar Cliente</span></center>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Cliente">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="tel" name="tel" placeholder="Telefone">
                </div>
            </div>
        <center><button type="submit" id="enviar" class="btn btn-dark">Cadastrar</button></center>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#enviar").click(function(){
            var nome = $("#nome").val();
            var cpf = $("#cpf").val();
            var tel = $("#tel").val();
            $.post("insere.php",{"nome":nome,"identifica":3,"cpf":cpf,"tel":tel},function(msg){
                $("#form").html("<h3>"+msg+"</h3>");
            });
        });
    });
</script>

<?php
rodape();

?>