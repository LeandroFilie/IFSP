<!DOCTYPE html>
<html>
    <head>
        <style>
            div{
                width: 200px;
                height: 200px;
                border: 1px solid;
            }
        </style>
        <meta charset="UTF-8">
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(function(){
                $("#btn").click(function(){
                    $.get("texto.txt",function(m){
                        $("#div_receptora").html(m);
                    });
                });
            });
        </script>
    </head>
    <body>
        <button id="btn">Botão de requisição assíncrona</button>
        <hr />
        <div id="div_receptora"></div>
    </body>
</html>