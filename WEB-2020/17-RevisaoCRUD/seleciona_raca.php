<?php

header('Content-Type: application/json');

include "conexao.php";

$select = "SELECT id_raca, raca.nome as nome_raca, especie.nome as nome_especie, raca.cod_especie as cod_especie FROM raca INNER JOIN especie ON raca.cod_especie = especie.id_especie";

if(isset($_GET["id"])){
    $id_raca = $_GET["id"];
    $select .= " WHERE id_raca='$id_raca'";
}

$select .= " ORDER BY nome_raca";

$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?>