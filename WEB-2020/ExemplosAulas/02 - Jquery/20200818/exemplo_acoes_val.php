<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exemplos Gatilhos</title>
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
                
                $("input[name='testeVal']").keyup(function(){
                    var valor = $("input[name='testeVal']").val();
                    $("#mensagem").html(valor);
                });

                $("#limpar").click(function(){
                    $("input[name='testeVal']").val("");
                })
            });
        </script>
    </head>
    <body>
        <div id="mensagem"></div>
        <hr/>
        <input type="text" name="testeVal" placeholder="digite aqui..." />
        <hr/>
        <button id="limpar">Limpar TesteVal</button>
        <hr/>
    </body>
</html>