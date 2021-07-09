<?php
include "conf.php";
cabecalho();
  
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
    <thead>
        <tr style="text-align:left">
            <th>Cliente</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody id="tbody_cliente">
';

    $i=0;
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
                <td>
                    <button class="btn btn-warning alterar" value="'.$linha["id_cliente"].'" data-toggle="modal" data-target="#modal">Alterar</button>
                    <button class="btn btn-danger remover" value="'.$linha["id_cliente"].'">Remover</button>
                </td>
            </tr>';
        $i++;
    }
    if($i==0){
        echo "<tr><td colspan='4'>Não há clientes cadastrados</td></tr>";
    }

        echo "</tbody>";
echo "</table>
<span id='id_cliente_oculto'></span>";

$titulo = "Alterar Cliente";
$nome_form = "alterar_cliente.php";
include "modal.php";

include "scripts_cliente.php";
rodape();

?>