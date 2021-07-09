<?php
    echo '  
        <br/>
        <div class="dica text-uppercase">
                <h5 class="display-5 text-center font-weight-bolder ">'.$_SESSION["dica"].'</h5>
        </div>';
        mostrar_dicas();

        if(isset($_SESSION["errou"])){
            if($_SESSION["errou"]){
                echo '<div class="text-uppercase pont-errou">';
                $_SESSION["errou"] = false;
            }
            else{
                echo '<div class="text-uppercase pont">';
            }
        }
            echo '
                <h6 class="display-6 font-italic text-center font-weight-bolder ">Pontuação: '.$_SESSION["pontuacao"].'</h6>
        </div>
    ';
    echo "<br/><br/>";

?>