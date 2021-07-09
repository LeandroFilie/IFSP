<?php
    session_start();
    include "funcoes.inc";
    $vefiEMAIL = true;
    $_SESSION["emailCad"] = false;
    
    if(!file_exists("usuarios.xml")){
        gravar_dados_usuario();
    }
    else{
        $usuario = simplexml_load_file("usuarios.xml");
        foreach ($usuario->children() as $dados){ 
            $vefiEMAIL = verifica_email();
        }

        if($vefiEMAIL){
            gravar_dados_usuario();
        }
        else{
            header("location:index.php");
            $_SESSION["emailCad"] = true; 
        }
    }

?>