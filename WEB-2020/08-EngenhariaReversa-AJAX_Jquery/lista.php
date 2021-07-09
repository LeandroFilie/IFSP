<?php
    session_start();
    $fruta = $_GET["fruta"];

    if(!empty($_SESSION)){
        if(!in_array($fruta, $_SESSION["lista_frutas"])){
            echo '<p style="color:green">Fruta cadastrada com sucesso</p><hr />';
            $_SESSION["lista_frutas"][] = $_GET["fruta"];
        }
        else{
           echo '<p style="color:red">Fruta já cadastrada<hr />';
        }
    }
    else{
        $_SESSION["lista_frutas"][] = $_GET["fruta"];
        echo '<p style="color:green">Fruta cadastrada com sucesso<hr />';
    }
    echo "<ul>";
        foreach($_SESSION["lista_frutas"] as $lista){
            echo "<li>$lista</li>";
        }
    echo "</ul>";
?>