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
                    valor1 = $("input[name='x']").val();
                    valor2 = $("input[name='y']").val();
                    $.get("teste2.php",{"v1":valor1, "v2":valor2},function(m){
                        $("#div_receptora").html(m);
                    });
                });
            });
        </script>
    </head>
    <body>
        <input type="text" name="x" placeholder="X..." />
        <input type="text" name="y" placeholder="Y..." />
        <button id="btn">Qual a maior string? X ou Y?</button>
        <hr />
        <div id="div_receptora"></div>
    </body>
</html>