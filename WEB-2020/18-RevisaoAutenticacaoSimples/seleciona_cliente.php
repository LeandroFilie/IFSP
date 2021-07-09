<?php

header('Content-Type: application/json');

include "conexao.php";

$select = "SELECT * FROM cliente";

if(isset($_GET["id"])){
    $id_cliente= $_GET["id"];
    $select .= " WHERE id_cliente='$id_cliente'";
}

$select .= " ORDER BY nome";

$resultado = mysqli_query($conexao,$select)
    or die(mysqli_error($conexao));

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?>