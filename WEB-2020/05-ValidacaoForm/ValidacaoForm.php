<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <script>
            function exibe_mensagem(nome, email, sexo, data){
                if((nome != "") && (email != "") && (sexo != "") && (data != "")){
                    mensagem_dados = "Nome: "+nome+" \nEmail: "+email+"\nSexo: "+sexo+"\nData de Nascimento: "+data+"";   
                    alert(mensagem_dados);
                }
                else{
                    mensagem = "Preencher os campos:";
                    if(nome==""){
                        mensagem += "\n-Nome";
                    }
                    if(email==""){
                        mensagem += "\n-E-mail";
                    }
                    if(sexo==""){
                        mensagem += "\n-Sexo";
                    }
                    if(data==""){
                        mensagem += "\n-Data de Nascimento";
                    }
                    alert(mensagem);
                }
            }
        </script>
    </head>
    <body>
        <form name="exer1">
            <fieldset>
                <legend>Exercício 1</legend>
                <p>Nome: <input type="text" name="Nome" /></p>
                <p>E-mail: <input type="text" name="Email" /></p>
                <p>Sexo:
                <select name="Sexo">
                    <option value="">Escolha</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select></p>
                <p>Data de Nascimento: <input type="date" name="nasc" /></p>
                <input type="button" value="Exibir" onclick="exibe_mensagem(document.exer1.Nome.value, document.exer1.Email.value, document.exer1.Sexo.value, document.exer1.nasc.value); ">
            </fieldset>    
        </form>
    </body>
</html>