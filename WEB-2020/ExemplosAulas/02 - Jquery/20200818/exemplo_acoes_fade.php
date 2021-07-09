<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exemplos Gatilhos</title>
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                
                $("#btnFadeIn").click(function(){
                    $("#mensagem").fadeIn();
                });

                $("#btnFadeOut").click(function(){
                    $("#mensagem").fadeOut();
                });
            });
        </script>
    </head>
    <body>
        <div id="mensagem">Mensagem será ocultada / mostrada ao clicar nos botôes abaixo</div>
        <hr/>
       <button id="btnFadeIn">FadeIn</button>
       <button id="btnFadeOut">FadeOut</button>
    </body>
</html>