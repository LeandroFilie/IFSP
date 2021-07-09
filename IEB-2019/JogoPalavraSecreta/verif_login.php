<?php
    session_start();

    $email = $_POST["email"];
    $_SESSION["email"] = $email;
    $senha = $_POST["senha"];
    $adm = false;
    $entrou = false;

    if($email == 'admin' && $senha == '0c7540eb7e65b553ec1ba6b20de79608'){
        header('Location:indexADM.php');   
        $adm = true;
    }

    if(!($adm)){
        if(!file_exists("usuarios.xml")){
            header('Location:index.php');
        }
        else{
            $usuarios = simplexml_load_file("usuarios.xml");
            foreach($usuarios->children() as $dados){
                if(($email == $dados->email) && ($senha == $dados->senha)){
                    header('Location:indexJOG.php');
                    $entrou = true; 
                }
            }

            if(!($entrou)){
                header('Location:index.php');
            }
        }
    }


?>