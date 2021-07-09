<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(function(){
                $("button.btn_x").click(function(){
                    $(".testes_x").hide(); //oculta o id
                })
                $("button.btn_y").click(function(){
                    $(".testes_y").hide(); //oculta o id
                })
            });
        </script>
    </head>
    <body>
        <p class="testes_x">Parágrafo 1 - testes X</p>
        <p class="testes_x">Parágrafo 2 - testes X</p>
        <div class="testes_y">Div 1 - testes Y</div>
        <div class="testes_y">Div 2 - testes Y</div>
        <span class="testes_y">Span 1 - testes Y</span>
        <span class="testes_y">Span 2 - testes Y</span>
        <button class="btn_x">Botão 1 X</button>
        <button class="btn_x">Botão 2 X</button>
        <button class="btn_y">Botão 3 Y</button>
    </body>
</html>