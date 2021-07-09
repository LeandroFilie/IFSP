<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(function(){
                $("button").click(function(){
                    $("p").hide();
                })
            });
        </script>
    </head>
    <body>
        <h2>Cabeçalho - não vai ser alterado</h2>
        <p>Parágrafo 1 vai sumir</p>
        <p id="teste">Parágrafo  vai sumir também</p>
        <button>Clique aqui para esconder os parágrafos</button>
    </body>
</html>