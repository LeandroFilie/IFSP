<!DOCTYPE html>
<html lang=pt-br>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
    <form method="POST" action="turma.php">
        <select name="prof">
            <option value="">::Professor::</option>
            <?php professor(); ?>
        </select>
        <select name="aluno">
            <option value="">::Aluno::</option>
            <?php aluno(); ?>
        </select>
        <select name="disciplina">
            <option value="">::Disciplina::</option>
            <?php disciplina(); ?>
        </select>
        <button>Pesquisar</button>
        <hr />
    </div>
    <table border="1" cellspacing="0">
        <tr>
            <th colspan="3">Disciplina</th>
        </tr>
        <tr>
            <th>Disciplina</th>
            <th>Professor</th>
            <th>Aluno</th>
        </tr>
        <?php
            include "conexao.php";

            function professor(){
                include "conexao.php";
                $select = "SELECT nome, prontuario FROM professor";
                $resultado = mysqli_query($conexao, $select);
                while($linha=mysqli_fetch_assoc($resultado)){
                    echo '<option value='.$linha["prontuario"].'>'.$linha["nome"].'</option>';
                }
            }

            function aluno(){
                include "conexao.php";
                $select = "SELECT nome, prontuario FROM aluno";
                $resultado = mysqli_query($conexao, $select);
                while($linha=mysqli_fetch_assoc($resultado)){
                    echo '<option value='.$linha["prontuario"].'>'.$linha["nome"].'</option>';
                }
            }

            function disciplina(){
                include "conexao.php";
                $select = "SELECT nome, id_disciplina FROM disciplina";
                $resultado = mysqli_query($conexao, $select);
                while($linha=mysqli_fetch_assoc($resultado)){
                    echo '<option value='.$linha["id_disciplina"].'>'.$linha["nome"].'</option>';
                }
            }
            
            $select = "SELECT disciplina.nome as disciplina, professor.nome as professor, aluno.nome as aluno FROM turma INNER JOIN aluno ON turma.cod_aluno = aluno.prontuario INNER JOIN disciplina ON turma.cod_disciplina = disciplina.id_disciplina INNER JOIN professor ON disciplina.cod_prof=professor.prontuario";
            
            if(!empty($_POST)){
                $select .= " WHERE (1=1)";
                if(!empty($_POST["prof"])){
                    $prof = $_POST["prof"];
                    $select .= " AND disciplina.cod_prof = '$prof'";
                }
                if($_POST["aluno"]!=""){
                    $aluno = $_POST["aluno"];
                    $select .= " AND aluno.prontuario = '$aluno'";
                }
                if($_POST["disciplina"]!=""){
                    $disciplina = $_POST["disciplina"];
                    $select .= " AND disciplina.id_disciplina = '$disciplina'";
                }
            }
            
            
            $resultado = mysqli_query($conexao, $select);

            while($linha=mysqli_fetch_assoc($resultado)){
                echo '<tr>
                        <td>'.$linha["disciplina"].'</td>
                        <td>'.$linha["professor"].'</td>
                        <td>'.$linha["aluno"].'</td>
                    </tr>';
            }
            echo "</table>";
        ?>
    </table>
    </form>
</body>
</html>








