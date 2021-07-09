<?php
    header('Content-Type: application/json');

    $funcionario[0]["nome"] = "Ana";
    $funcionario[0]["sobrenome"] = "Silva";
    $funcionario[1]["nome"] = "Maria";
    $funcionario[1]["sobrenome"] = "Ribeiro";
    $funcionario[2]["nome"] = "José";
    $funcionario[2]["sobrenome"] = "Sanches";

    $funcionarios["funcionario"] = $funcionario;

    echo json_encode($funcionarios);

?>