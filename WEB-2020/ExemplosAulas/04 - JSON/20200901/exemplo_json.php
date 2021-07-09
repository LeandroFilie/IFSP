<!DOCTYPE html>
<html>
    <head>
        <style>div{width:200px;height:200px;border:1px solid;}</style>
        <meta charset="UTF-8">
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(function(){
                $("#btn").click(function(){
                    var f = {
                        "funcionarios":
                        [
                            {"nome":"Ana", "sobrenome":"Silva"},
                            {"nome":"Maria", "sobrenome":"Ribeiro"},
                            {"nome":"José", "sobrenome":"Sanches"}
                        ]
                    };
                    texto = "";
                    $.each(f.funcionarios,function(indice,valor){
                        texto += valor.sobrenome + ", " + valor.nome + ".<br />"
                    });
                    $("#div_receptora").html(texto);
                });
            });
        </script>
    </head>
    <body>
        <button id="btn">Preenche nomes de referências no padrão ABNT</button>
        <hr />
        <div id="div_receptora"></div>
    </body>
</html>