<?php
    session_start();

    $codigo = $_GET["codigo"];

    $cadastro = simplexml_load_file("usuarios.xml");

        foreach($cadastro->children() as $dados){
            if($dados->codigo == $codigo){
                unset($dados[0]);
            }
        }

    file_put_contents("usuarios.xml", $cadastro->asXml());
    header("Location: lista_usuarios.php");

?>