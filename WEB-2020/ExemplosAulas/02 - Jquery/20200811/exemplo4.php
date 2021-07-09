<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(function(){
                $("button").click(function(){
                    $("#teste").hide(); //oculta o id
                })
            });
        </script>
    </head>
    <body>
        <h2>Cabeçalho - não vai ser alterado</h2>
        <p>Parágrafo 1 não vai sumir</p>
        <p id="teste">Só Parágrafo 2 vai sumir</p>
        <button>Clique aqui para esconder os parágrafos</button>
    </body>
</html>