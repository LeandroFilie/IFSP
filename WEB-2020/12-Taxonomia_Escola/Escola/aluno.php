<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
    <form method="POST" action="aluno.php">
        <input type="text" name="dados" placeholder="Nome aluno, email ou prontuário..." style="width:300px" /><br /><br />
        <select name="sexo">
            <option value="">::Sexo::</option>
            <option value="m" />Masc</option>
            <option value="f" />Fem</option>
        </select>
        <input type="date" name="data_nascimento" />
        <button>Pesquisar</button>
        <hr />
    </div>
    <table border="1" cellspacing="0">
        <tr>
            <th colspan="5">Aluno</th>
        </tr>
        <tr>
            <th>Prontuario</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data de Nascimento</th>
            <th>Sexo</th>
        </tr>
        <?php
            include "conexao.php";
            
            $select = "SELECT * FROM aluno";

            if(!empty($_POST)){
                $select .= " WHERE (1=1)";
                if(($_POST["sexo"]!="")){
                    $sexo = $_POST["sexo"];
                    $select.=" AND sexo = '$sexo'";
                }
                if($_POST["dados"]!=""){
                    $dados = $_POST["dados"];
                    $select .= " AND nome like '%$dados%' OR prontuario = '$dados' OR email like '%$dados%'";
                }
                if($_POST["data_nascimento"]!=""){
                    $data = $_POST["data_nascimento"];
                    $select .= " AND data_nasc >= '$data'";
                }
            }
            
            $resultado = mysqli_query($conexao, $select);
            while($linha=mysqli_fetch_assoc($resultado)){
                echo '<tr>
                        <td>'.$linha["prontuario"].'</td>
                        <td>'.$linha["nome"].'</td>
                        <td>'.$linha["email"].'</td>
                        <td>'.$linha["data_nasc"].'</td>
                        <td>'.$linha["sexo"].'</td>
                    </tr>';
            }
        ?>
    </table>
    </form>
</body>
</html>

