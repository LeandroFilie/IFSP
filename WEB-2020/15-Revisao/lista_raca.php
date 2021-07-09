<?php
include "conf.php";
include "conexao.php";
cabecalho();

echo '
<div class="col-xs-10 offset-xs-1 col-sm-6 offset-sm-3 col-md-4 offset-md-4 py-4">
    <form method="POST" action="lista_raca.php">
        <div class="form-group">
            <select name="especie" class="form-control">
                <option value="">::Selecione uma Espécie::</option>';
                $select = "SELECT id_especie, nome FROM especie";
                $resultado = mysqli_query($conexao,$select);

                while($linha=mysqli_fetch_assoc($resultado)){
                    echo '<option value='.$linha["id_especie"].'>'.$linha["nome"].'</option>';
                }
echo'       </select>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="text" name="nome" placeholder="Nome da Raça" class="form-control" />
            </div>
        </div>
        <center><button type="submit" class="btn btn-dark">Pesquisar Raça</button></center>
    </form>
</div>

    <table class="table">
    <tr style="text-align:left">
        <th>Raça</th>
        <th>Espécie</th>
    </tr>
';

$select = "SELECT raca.nome as nome_raca, especie.nome as nome_especie FROM raca INNER JOIN especie ON raca.cod_especie = especie.id_especie";
                        
if(!empty($_POST)){
    $select .= " WHERE (1=1)";
    if($_POST["especie"] != ""){
        $especie = $_POST["especie"];
        $select .= " AND cod_especie = '$especie'";
    }
    if($_POST["nome"] != ""){
        $nome = $_POST["nome"];
        $select .= " AND raca.nome like '%$nome%'";
    }
}

$resultado = mysqli_query($conexao,$select);

while($linha = mysqli_fetch_assoc($resultado)){
    echo '<tr>
            <td>'.$linha["nome_raca"].'</td>
            <td>'.$linha["nome_especie"].'</td>
        </tr>';
}
echo "</table>";
rodape();

?>