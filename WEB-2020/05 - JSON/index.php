<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Atividade JSON - ViaCep</title>
        <script src="./jquery-3.5.1.min.js"></script>
        <script>
            $(function(){
                $("#cep").blur(function(){
                    var cep = $("#cep").val();
                    var cep_valido = /^[0-9]{8}$/;

                    if(!cep_valido.test(cep)){
                        alert("CEP digitado em formato incorreto. Digite novamente!");
                    }
                    else{
                        $.get("https://viacep.com.br/ws/"+cep+"/json/",function(dados){
                            if(dados.erro){
                                $("#cep").val("");
                                $("#endereco").val("");
                                $("#bairro").val("");
                                $("#cidade").val("");
                                $("#estado").val("");
                                alert("O CEP não existe. Digite novamente!");
                            }
                            else{
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                                $("#numero").focus();
                                $("#msg").html("Digite o número");
                                
                                $("#numero").blur(function(){
                                    if($("#numero").val() == ""){
                                        $("#msg").html("Digite o número");
                                        
                                    }
                                    else{
                                        $("#msg").html("");
                                    }
                                });
                            }
                        });
                    }
                });
            });
        </script>
    </head>
    <body>
        <form name="f">
            <input type="text" id="cep" value="" placeholder="CEP..." />
            <input type="text" id="endereco" value="" placeholder="Endereço..." readonly/>
            <input type="text" id="numero" value="" placeholder="Numero..." /><br /><br />
            <input type="text" id="bairro" value="" placeholder="Bairro..." readonly/>
            <input type="text" id="cidade" value="" placeholder="Cidade..." readonly/>
            <input type="text" id="estado" value="" placeholder="Estado..." readonly/>
        </form>
        <hr />
        <div id="msg" style="color:red;"></div>
    </body>
</html>