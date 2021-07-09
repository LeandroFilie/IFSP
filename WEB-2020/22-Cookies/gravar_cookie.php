<?php
    include "const_cookie.php";

    $nome = NOME_COOKIE;
    $valor = base64_encode($_POST["email"]);
    $validade = time() + 86400*2;
    $caminho = "/"; 
    $dominio = "localhost";
    $seguro = false;
    $http = true;

    if(!empty($_POST["lembrete"])) {
        setcookie($nome, $valor, $validade, $caminho, $dominio, $seguro, $http);
    }
    else {
        //apagar o cookie
        if(isset($_COOKIE[$nome])) { //se o cookie existir na máquina cliente
            setcookie($nome, "", time()-1, $caminho, $dominio, $seguro, $http);
            //tempo no passado
        }
    }
?>