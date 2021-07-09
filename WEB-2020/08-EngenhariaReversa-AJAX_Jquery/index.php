<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Engenharia Reversa - jquery com ajak</title>
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(function(){
                $("#btn").click(function(){
                    var fruta = $("#cadFruta").val();
                    $.get("lista.php",{"fruta":fruta},function(msg){
                        $("#mensagem").html(msg);
                        $("#cadFruta").val("");
                    });
                });
            });
        </script>
    </head>
    <body>
        <input type="text" id="cadFruta" placeholder="Cadastre uma fruta..." />
        <button id="btn">Cadastro Assíncrono</button>
        <hr />
        <div id="mensagem"></div>
          
    </body>

    <?php
        session_destroy();
    ?>
</html>