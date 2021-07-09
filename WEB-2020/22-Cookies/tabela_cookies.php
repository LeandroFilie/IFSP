<?php
    $conteudo = "<table id='tabela_cookies' border='1px' cellspacing='0' style='text-align:center'>";
    $conteudo .= "<tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Quer deletar?</th>
                    </tr>";
    foreach($_COOKIE as $nome => $valor) {
        $i = 0;
        if($nome != "PHPSESSID"){
            $conteudo .= "<tr id='$nome'>
                    <td>$nome</td>
                    <td>".base64_decode($valor)."</td>
                    <td><input name='excluirCookie' type='checkbox' value='$nome' /></td>
                    </tr>";
            $i++;
        } 
    }
    if($i == 0){
        $conteudo .="<tr><td colspan='3'>Não há Cookies salvos</tr></td>";
    }
    $conteudo .=  "</table>";
    /* if($i != 0){
        $conteudo .= "<br/><button type='button' id='remover'>Remover</button><br />";
    } */

    echo $conteudo;
?>