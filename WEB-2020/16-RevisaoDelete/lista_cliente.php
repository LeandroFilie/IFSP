<?php
include "conf.php";
include "conexao.php";


cabecalho();
include "script_remover.php";

echo '
<div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
    <form method="POST" action="lista_cliente.php">
        <div class="form-group">
            <div class="input-group">
                <input type="text" name="nome" placeholder="Nome do Cliente" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="text" name="cpf" placeholder="CPF do Cliente" class="form-control" />
            </div>
        </div>
        <center><button type="submit" class="btn btn-dark">Pesquisar Cliente</button></center>
    </form>
</div>
<div id="msg"></div>
<table class="table">
<tr style="text-align:left">
    <th>Cliente</th>
    <th>CPF</th>
    <th>Telefone</th>
    <th>Ação</th>
</tr>
';

$select = "SELECT * FROM cliente";

if(!empty($_POST)){
    $select .= " WHERE(1=1)";
    if($_POST["nome"] != ""){
        $nome = $_POST["nome"];
        $select .= " AND nome like '%$nome%'";
    }
    if($_POST["cpf"] != ""){
        $cpf = $_POST["cpf"];
        $select .= " AND cpf = '$cpf'";
    }
}

$resultado = mysqli_query($conexao,$select);

while($linha = mysqli_fetch_assoc($resultado)){
    echo '<tr>
            <td>'.$linha["nome"].'</td>
            <td>'.$linha["cpf"].'</td>
            <td>'.$linha["telefone"].'</td>
            <td><button class="btn btn-danger remover_cliente" value="'.$linha["id_cliente"].'">Remover</button></td>
                                  
            </td>
        </tr>';
}

echo '</table>';



rodape();

?>