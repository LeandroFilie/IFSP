<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exemplos Gatilhos</title>
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                
                $("#btn1").click(function(){
                    var texto = $("#mensagem").html();
                    alert(texto);
                });

                $("#btn2").click(function(){
                    var texto = "<b>Mudando o texto da div e aplicando negrito</b>";
                    $("#mensagem").html(texto);
                });
            });
        </script>
    </head>
    <body>
        <div id="mensagem">Texto da div</div>
        <hr/>
        <button id="btn1">Acionar açar HTML sem parâmetro</button>
        <hr/>
        <button id="btn2">Acionar açar HTML com parâmetro String</button>
        <hr/>
    </body>
</html>