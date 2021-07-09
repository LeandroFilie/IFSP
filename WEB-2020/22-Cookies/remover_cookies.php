<?php
    $i = 1;
    foreach ($_POST["nomes_cookies"] as $nome){
        if(!setcookie($nome, "", time()-1, "/", "localhost", false, true)){
            $i = 0;
        }
    }
    echo $i;    
?>