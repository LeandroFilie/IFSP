<?php
    if(strlen($_GET["v1"]) > strlen($_GET["v2"])){
        echo '<b>X tem mais caracteres</b>';
    }
    else if(strlen($_GET["v2"]) > strlen($_GET["v1"])){
        echo '<b>Y tem mais caracteres</b>';
    }
    else{
        echo '<b>X e Y tem a mesma quantidade de caracteres</b>';
    }
?>