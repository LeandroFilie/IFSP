<?php

header('Content-Type: application/json');

include "conexao.php";

$select = "SELECT id_animal, animal.nome as nome_animal, especie.nome as nome_especie, raca.nome as nome_raca, cliente.nome as nome_cliente, animal.cod_cliente as cod_cliente, raca.cod_especie as cod_especie, animal.cod_raca as cod_raca FROM animal INNER JOIN raca ON animal.cod_raca = raca.id_raca INNER JOIN especie ON raca.cod_especie = especie.id_especie INNER JOIN cliente ON animal.cod_cliente = cliente.id_cliente";

if(isset($_GET["id"])){
    $id_animal = $_GET["id"];
    $select .= " WHERE id_animal='$id_animal'";
}

$select .= " ORDER BY nome_animal";

$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?>