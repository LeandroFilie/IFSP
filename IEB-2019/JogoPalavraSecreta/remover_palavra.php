<?php
    session_start();

    $codigo = $_GET["codigo"];

    $cadastro = simplexml_load_file("palavra.xml");

        foreach($cadastro->children() as $palavra){
            if($palavra->codigo == $codigo){
                unset($palavra[0]);
            }
        }

    file_put_contents("palavra.xml", $cadastro->asXml());
    header("Location: lista_palavras.php");

?>