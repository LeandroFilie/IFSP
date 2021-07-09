<?php
include "conf.php";
include "conexao.php";

cabecalho();

echo '
<div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
    <form method="POST" action="lista_especie.php">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                </div>
                <input type="text" name="nome" placeholder="Nome da Espécie" class="form-control" />
            </div>
        </div>
        <center><button type="submit" class="btn btn-dark">Pesquisar Espécie</button></center>
    </form>
</div>
<div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
    <table class="table">
    <tr><th style="text-align:left">ESPÉCIE</th></tr>
';

$select = "SELECT * FROM especie";

if(!empty($_POST)){
    $select .= " WHERE(1=1)";
    if($_POST["nome"] != ""){
        $nome = $_POST["nome"];
        $select .= " AND nome like '%$nome%'";
    }
}

$resultado = mysqli_query($conexao,$select);

while($linha = mysqli_fetch_assoc($resultado)){
    echo '<tr>
            <td>'.$linha["nome"].'</td>
        </tr>';
}

echo '</table>
</div>';

rodape();

?>