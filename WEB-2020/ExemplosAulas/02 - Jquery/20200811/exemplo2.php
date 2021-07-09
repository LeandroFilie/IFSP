<!DOCTYPE html>
<html>
    <head>
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $(function(){  
                $("button").click(function(){
                    $("table").hide();
                });
            });
        </script>
    </head>
    <body>
        <button>Ocultar tabela</button> <br/><br/>
        <table border=1>
            <tr>
                <th>Coluna 1</th>
                <th>Coluna 2</th>
            </tr>
            <tr>
                <td>Valor 1</td>
                <td>Valor 2</td>
            </tr>
        </table>
    </body>
</html>