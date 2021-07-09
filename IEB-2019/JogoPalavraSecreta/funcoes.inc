<?php
    function gravar_dados_palavra(){
        $codigo = $_POST["codigo"];
        $nome = $_POST["palavra"];
        $dica = $_POST["dica"];
        $dica_esp = $_POST["dica_esp"];
        $dica_esp2 = $_POST["dica_esp2"];
        $alterar_palavra = $_POST["alterar_palavra"];

        //verificar se o arquivo já existe
        if(!file_exists("palavra.xml")){
            //arquivo não existe
            $xml = 
"<?xml version = \"1.0\" encoding = \"utf-8\"?>
<cadastro>
    <palavra>
        <codigo>$codigo</codigo>
        <nome>$nome</nome>
        <dica>$dica</dica>
        <dica_esp>$dica_esp</dica_esp>
        <dica_esp2>$dica_esp2</dica_esp2>
    </palavra>
</cadastro>
";
            echo '<article><br/><br/><br/><h2>Palavra cadastrada com sucesso!!</h2></article>';
            atualizar_codigo("palavra");
            file_put_contents("palavra.xml", $xml);
        }
        else{
            //arquivo já existe
            $cadastro = simplexml_load_file("palavra.xml");
                if($alterar_palavra==0){
                    $palavra = $cadastro->addChild("palavra");
                    $palavra->addChild('codigo', $codigo);
                    $palavra->addChild('nome', $nome);
                    $palavra->addChild('dica', $dica);
                    $palavra->addChild('dica_esp', $dica_esp);
                    $palavra->addChild('dica_esp2', $dica_esp2);
                    echo '<article><br/><br/><br/><h2>Palavra cadastrada com sucesso!!</h2></article>';
                    atualizar_codigo("palavra");
                }
                if($alterar_palavra==1){
                    foreach ($cadastro->children() as $palavra) {
                        if ($palavra->codigo == $codigo) {
                            $palavra->nome = $nome;
                            $palavra->dica = $dica;
                            $palavra->dica_esp = $dica_esp;
                            $palavra->dica_esp2 = $dica_esp2;
                            echo '<article><br/><br/><br/><h2>Palavra alterada com sucesso!!</h2></article>';
                        }
                    }
                }
                file_put_contents("palavra.xml", $cadastro->asXML());
        }   
       
    }

    function verifica_palavra() {
        $cadastro = simplexml_load_file("palavra.xml");
        $nome = $_POST["palavra"];
        $alterar_palavra=$_POST["alterar_palavra"];
        if($alterar_palavra==0) {
            foreach($cadastro->children() as $palavra){
                if ($nome==$palavra->nome) {
                    return false;
                }
            }
        }
            return true;
    }

    function exibe_palavra(){
        $cadastro = simplexml_load_file("palavra.xml");

            foreach($cadastro->children() as $palavra){
                echo '<tr class="text-capitalize">';
                    echo "<td>". $palavra->codigo ."</td>";
                    echo '<td>'. $palavra->nome .'</td>';
                    echo "<td>". $palavra->dica ."</td>";
                    echo "<td>". $palavra->dica_esp ."</td>";
                    echo "<td>". $palavra->dica_esp2 ."</td>";
                    echo "<td><a href=\"cadastro_palavras.php?codigo=$palavra->codigo\"><i class=\"material-icons\">edit</i></a></td>";
                    echo "<td><a href=\"remover_palavra.php?codigo=$palavra->codigo\" onclick=\"return modifica()\"><i class=\"material-icons\">delete</i></a></td>
                </tr>";
            }
    }

    function obter_codigo($tipo){
        //verificar se o arquivo xml já existe
        if(!file_exists("sequencia_codigos.xml")){
            //arquivo não existe, vamos cria-lo 
            $xml = 
"<?xml version=\"1.0\" encoding=\"utf-8\" ?>
<codigos>
    <palavra>1</palavra>
    <usuario>1</usuario>
</codigos>
";
            file_put_contents("sequencia_codigos.xml", $xml);
            return 1;
        }
        else{
            //o arquivo já existe e possui os valores dos contadores
            //ler arquivo xml

            $codigos = simplexml_load_file("sequencia_codigos.xml");

            if($tipo == "palavra"){
                return $codigos->palavra;
            }
            if($tipo == "usuario"){
                return $codigos->usuario;
            }
        }
    }

    function atualizar_codigo($tipo){
        //ler o arquivo sequencia_codigos.xml
        $codigos = simplexml_load_file("sequencia_codigos.xml");

        if($tipo == "palavra"){
            $codigos->palavra++;
        }
        if($tipo == "usuario"){
            $codigos->usuario++;
        }

        file_put_contents("sequencia_codigos.xml", $codigos->asXML());
    }

    function gravar_dados_usuario(){
        $codigo = $_POST["codigo"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $modo = $_POST["modo"];
        $pontuacao = 0;
        $ganhou = 0;
        $perdeu = 0;
        $trofeus = 0;
       
       if($modo == 1){
           $xml = simplexml_load_file("usuarios.xml");
           foreach($xml->children() as $dados){
               if($dados->codigo == $codigo){
                   $dados->nome = $nome;
                   $dados->email = $email;
                   $dados->senha = $senha;
               }
           }
           file_put_contents("usuarios.xml", $xml->asXML());
       }

       else{

           if(!file_exists("usuarios.xml")){
               $usuario = 
'<?xml version="1.0" encoding="UTF-8" ?>
<usuarios>
    <dados>
        <codigo>'.$codigo.'</codigo>
        <nome>'.$nome.'</nome>
        <email>'.$email.'</email>
        <senha>'.$senha.'</senha>
        <pontuacao>'.$pontuacao.'</pontuacao>
        <ganhou>'.$ganhou.'</ganhou>
        <perdeu>'.$perdeu.'</perdeu>
        <trofeus>'.$trofeus.'</trofeus>
    </dados>
</usuarios>';
				atualizar_codigo("usuario");
                file_put_contents("usuarios.xml", $usuario);
           }
           else{
               $usuario = simplexml_load_file("usuarios.xml");
            
                $dados = $usuario->addChild("dados");
                $dados->addChild('codigo', $codigo);
                $dados->addChild('nome', $nome);
                $dados->addChild('email', $email);
                $dados->addChild('senha', $senha);
                $dados->addChild('pontuacao', $pontuacao);
                $dados->addChild('ganhou', $ganhou);
                $dados->addChild('perdeu', $perdeu);
                $dados->addChild('trofeus', $trofeus);
                atualizar_codigo("usuario");
                header("location:index.php");

                file_put_contents("usuarios.xml", $usuario->asXML());
           }
           header("location:index.php");
       }

       $_SESSION["emailCad"] = false;
    
    }

    function verifica_email() {
        $usuario = simplexml_load_file("usuarios.xml");
        $email = $_POST["email"];
        foreach($usuario->children() as $dados){
            if ($email==$dados->email) {
                return false;
            }
        }
        return true;
    }

    function exibe_usuarios(){
        $usuarios = simplexml_load_file("usuarios.xml");
        foreach($usuarios->children() as $dados){
            echo '<tr>';
                echo "<td>". $dados->codigo ."</td>";
                echo "<td>". $dados->nome ."</td>";
                echo "<td>". $dados->email ."</td>";
                echo "<td>". $dados->pontuacao ."</td>";
                echo "<td>". $dados->ganhou ."</td>";
                echo "<td>". $dados->perdeu ."</td>";
                echo "<td>". $dados->trofeus ."</td>";
                echo "<td><a href=\"#\"><span onclick=\"enviarDadosModal($dados->codigo, '$dados->nome', '$dados->email')\"><i class=\"material-icons\">edit</i></span></td>";
                echo "<td><a href=\"remover_usuario.php?codigo=$dados->codigo\" onclick=\"return modifica()\"><i class=\"material-icons\">delete</i></a></td>
            </tr>";
            }
        

        
    }

    function exibePerfil(){
        $jogador = $_SESSION["email"];
        
        $usuarios = simplexml_load_file("usuarios.xml");
        
        foreach($usuarios->children() as $dados){
            if($jogador == $dados->email){
                $jogos = $dados->ganhou + $dados->perdeu;
                echo "
                    <tr>
                        <td>Código</td>
                        <td class=\"text-center\">$dados->codigo</td>
                        <td rowspan=\"8\"><img src=\"images/user.png\" class=\"imagem_usuario\"/></td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td class=\"text-center\">$dados->nome</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td class=\"text-center\">$dados->email</td>
                    </tr>
                    <tr>
                        <td>Jogos Jogados</td>
                        <td class=\"text-center\">$jogos</td>
                    </tr>
                    <tr>
                        <td>Pontuação</td>
                        <td class=\"text-center\">$dados->pontuacao</td>
                    </tr>
                    <tr>
                        <td>Jogos Ganhos</td>
                        <td class=\"text-center\">$dados->ganhou</td>
                    </tr>
                    <tr>
                        <td>Jogos Perdidos</td>
                        <td class=\"text-center\">$dados->perdeu</td>
                    </tr>
                    <tr>
                        <td>Troféus</td>";
                        if($dados->ganhou >= 20){
                            echo '<td class="text-center">
                                <img src="images/trofeu_intermediario.png" width="25px" height="49px"/>
                                <img src="images/trofeu_avancado.png" width="26px" height="46px"/>
                                <img src="images/trofeu_iniciante.png" width="25px" height="49px"/></td>';
                                $dados->trofeus = 3;
                        }
                        else if($dados->ganhou >= 10){
                            echo '<td class="text-center"><img src="images/trofeu_intermediario.png" width="25px" height="49px"/>
                               <img src="images/trofeu_iniciante.png" width="25px" height="45px"/></td>';
                               $dados->trofeus = 2;
                        }
                        else if($dados->ganhou >= 5){
                            echo '<td class="text-center"><img src="images/trofeu_iniciante.png" width="25px" height="47px"/></td>';
                            $dados->trofeus = 1;
                        }
                        else{
                            echo '<td class="text-center">Não há troféus</td>';
                        }
                        
                    echo '</tr>';
                
            }
        }
    }

    function sortear_palavra(){
        $encontrou = false;
        $codigo = simplexml_load_file("sequencia_codigos.xml");
        $max = (int) $codigo->palavra;
        if(!file_exists("palavra.xml")){
            echo '<br/><br/><br/><h2>Não há palavras cadastradas</h2>';
        }
        else{
            while(!$encontrou){
                $aleatorio = rand(1, $max);
                $plv = simplexml_load_file("palavra.xml");
                foreach($plv->children() as $palavra){
                    if($palavra->codigo == $aleatorio){
                        $_SESSION["palavra"] = strtoupper((string)$palavra->nome);
                        $_SESSION["dica"] = (string)$palavra->dica;
                        $_SESSION["dica_esp"] = (string)$palavra->dica_esp;
                        $_SESSION["dica_esp2"] = (string)$palavra->dica_esp2;
                        $encontrou = true;
                        break;
                    }
                }
            }
        }
    }

    function inicializar_jogo(){
        $_SESSION["pontuacao"] = 100;
        $_SESSION["dica_solicitada"] = 0;
        $_SESSION["palavra_jogador"] = " ";
        $_SESSION["fim_jogo"] = 0;
        $palavra = strtoupper($_SESSION["palavra"]);
        $_SESSION["errou"] = false;
        unset($_SESSION["letras_jogador"]);
        include "dica.inc";
        
        for($i=0; $i < strlen($palavra); $i++){
            $_SESSION["palavra_jogador"][$i] = " ";
            echo '<input type="text" value = "" name="letra'.$i.'" size="1" readonly="readonly" class="palavra" />';
        }
    }

    function jogar(){
        $palavra = $_SESSION["palavra"];
        $estado = $_POST["estado"];
        $email = $_SESSION["email"];
        $perdeu = false;
        $ganhou = false;

        if($estado == 1){
            $letra_digitada = strtoupper($_POST["palavra_jogador"]);
            $encontrou = false;

            $_SESSION["letras_jogador"][] = $letra_digitada;
            for($i=0; $i < strlen($palavra); $i++){
                if($palavra[$i] == $letra_digitada){
                    $_SESSION["palavra_jogador"][$i] = $palavra[$i]; 
                    $encontrou = true;
                }  
            }

            if(!$encontrou){
                $_SESSION["pontuacao"]-=20;
                if($_SESSION["pontuacao"]!=0){
                    $_SESSION["errou"] = true;
                }
                else{
                    $perdeu=true;
                    echo '<br/><center><img src="images/perdeu.png" height="400" width="500" class="img-fluid" /></center>'; 
                    $usuario = simplexml_load_file("usuarios.xml");
                    foreach($usuario->children() as $dados){
                        if($dados->email == $email){
                            $dados->perdeu++;
                        }
                    }
                    file_put_contents("usuarios.xml", $usuario->asXML());
                }   
            }

            
            else{
                if($_SESSION["palavra_jogador"] == $palavra){
                    echo '<br/><center><img src="images/venceu.png" height="400" width="500" class="img-fluid" /></center>'; 
                    $ganhou = true;
                    $usuario = simplexml_load_file("usuarios.xml");
                    foreach($usuario->children() as $dados){
                        if($dados->email == $email){
                            $dados->ganhou++;
                            $dados->pontuacao+=$_SESSION["pontuacao"];
                        }
                    }
                    file_put_contents("usuarios.xml", $usuario->asXML());
                }
            }
            unset($_POST["estado"]);
        }
        else if($estado == 2){
            $palavra_completa = strtoupper($_POST["palavra_completa"]);
            if($palavra_completa == $palavra){
                echo '<br/><center><img src="images/venceu.png" height="400" width="500" class="img-fluid" /></center>'; 
                $ganhou = true;
                $usuario = simplexml_load_file("usuarios.xml");
                foreach($usuario->children() as $dados){
                    if($dados->email == $email){
                        $dados->ganhou++;
                        $dados->pontuacao+=$_SESSION["pontuacao"];
                    }
                }
                file_put_contents("usuarios.xml", $usuario->asXML());
            }
            else{
                $perdeu=true;
                echo '<center><img src="images/perdeu.png" height="400" width="500" class="img-fluid" /></center>'; 
                $usuario = simplexml_load_file("usuarios.xml");
                foreach($usuario->children() as $dados){
                    if($dados->email == $email){
                        $dados->perdeu++;
                    }
                }
                file_put_contents("usuarios.xml", $usuario->asXML());
            }
            unset($_POST["estado"]);
        }
        else if($estado == 3){
            if($_SESSION["dica_solicitada"] <2){
                $_SESSION["dica_solicitada"]++;
                $_SESSION["pontuacao"] -=25;
                $_SESSION["errou"] = true;
              
            }
            if($_SESSION["pontuacao"] == 0){
                $perdeu=true;
                echo '<br/><center><img src="images/perdeu.png" height="400" width="500" class="img-fluid" /></center>'; 
                $usuario = simplexml_load_file("usuarios.xml");
                foreach($usuario->children() as $dados){
                    if($dados->email == $email){
                        $dados->perdeu++;
                    }
                }
                file_put_contents("usuarios.xml", $usuario->asXML());
            }
        }

        if(!$perdeu && !$ganhou){
            include "dica.inc";
            for($i=0; $i < strlen($palavra); $i++){
                echo '<input type="text" value = "'.$_SESSION["palavra_jogador"][$i].'" name="letra'.$i.'" size="1" readonly="readonly" class="palavra" />';
            }
            echo '<br/><br/>';
            
            if(isset($_SESSION["letras_jogador"])){
                echo '<h6 class="display-5 text-center font-weight-bolder font-italic">Letras Digitadas:</h6>';
                for($i=0; $i < sizeof($_SESSION["letras_jogador"]); $i++){
                    echo  ''.$_SESSION["letras_jogador"][$i].' - ';
                }
            }
            
            include "form_jogo.inc";
               
        }
        
    }

    function mostrar_dicas(){
        if($_SESSION["dica_solicitada"] == 1){
            echo '<div class="text-center font-italic text-uppercase "><h5 class="dica_esp">' .$_SESSION["dica_esp"]. '</h5></div>';
        }
        else if($_SESSION["dica_solicitada"] == 2){
            echo '<div class="text-center font-italic text-uppercase "><h5 class="dica_esp">' .$_SESSION["dica_esp"]. '</h5></div>';
            echo '<div class="text-center font-italic text-uppercase "><h5 class="dica_esp">' .$_SESSION["dica_esp2"]. '</h5></div>';
        }
    }

    function exibe_ranking(){
        $pontuacao = array();
        $posicao = 1;
        $cod = array();
    
        $usuarios = simplexml_load_file("usuarios.xml");
        foreach($usuarios->children() as $dados){
            $pontuacao[] = (int)$dados->pontuacao;
        }
        rsort($pontuacao);
        
        for($i=0; $i<sizeof($pontuacao); $i++){
            foreach($usuarios->children() as $dados){
                if($pontuacao[$i] == $dados->pontuacao){
                    if(codigo_ranking($dados->codigo, $cod)){
                        echo '
                            <tr class="table_ranking">
                                <td >';
                                    if($posicao == 1){
                                        echo '<img src="images/primeiro.png" width="35" height="50"/>';
                                    }
                                    else if($posicao == 2){
                                        echo '<img src="images/segundo.png" width="35" height="50"/>';
                                    }
                                    else if($posicao == 3){
                                        echo '<img src="images/terceiro.png" width="35" height="50"/>';
                                    }
                                    else{
                                        echo $posicao. 'º';
                                    }
                                echo '</td>
                                <td>'.$dados->nome.'</td>
                                <td>'.$dados->pontuacao.'</td>';
                                if($dados->ganhou >= 20){
                                    echo '<td class="text-center">
                                        <img src="images/trofeu_intermediario.png" width="25" height="49"/>
                                        <img src="images/trofeu_avancado.png" width="26px" height="46px"/>
                                        <img src="images/trofeu_iniciante.png" width="25px" height="49px"/></td>';
                                        $dados->trofeus = 3;
                                }
                                else if($dados->ganhou >= 10){
                                    echo '<td class="text-center"><img src="images/trofeu_intermediario.png" width="25px" height="47px"/>
                                    <img src="images/trofeu_iniciante.png" width="25px" height="49"/></td>';
                                    $dados->trofeus = 2;
                                }
                                else if($dados->ganhou >= 5){
                                    echo '<td class="text-center"><img src="images/trofeu_iniciante.png" width="25px" height="47px"/></td>';
                                    $dados->trofeus = 1;
                                }
                                else{
                                    echo '<td class="text-center">Não há troféus</td>';
                                }
                        echo '
                            </tr>
                        ';
                        $posicao++;
                        $cod[] = $dados->codigo;
                    }
                }
            }
        }  
    }

    function codigo_ranking($codus, $cod){
        for($i=0; $i<sizeof($cod); $i++){
            if($cod[$i] == $codus){
                return false;
            }
        }
        return true;
    }
?>