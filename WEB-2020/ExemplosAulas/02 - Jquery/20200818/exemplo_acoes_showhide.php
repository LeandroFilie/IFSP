<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exemplos Gatilhos</title>
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                
                $("#btnShow").click(function(){
                    $("#mensagem").show();
                });

                $("#btnHide").click(function(){
                    $("#mensagem").hide();
                });
            });
        </script>
    </head>
    <body>
        <div id="mensagem">Mensagem será ocultada / mostrada ao clicar nos botôes abaixo</div>
        <hr/>
       <button id="btnShow">Show</button>
       <button id="btnHide">Hide</button>
    </body>
</html>