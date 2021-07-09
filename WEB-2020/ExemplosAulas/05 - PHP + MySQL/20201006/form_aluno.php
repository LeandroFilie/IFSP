<?php include "cabecalho.php"; ?>
    <fieldset>
        <legend>Cadastro de Aluno</legend>
        <form method="post" action="insere_aluno.php">
            <input type="text" name="prontuario" placeholder="Prontuario..." />
            <input type="text" name="nome" placeholder="Nome..." />
            <input type="email" name="email" placeholder="Email..." />
            Data Nascimento: <input type="date" name="data_nascimento" /><br/>
            Sexo:
            <input type="radio" name="sexo" value="m" class="menor">Masc
            <input type="radio" name="sexo" value="f" class="menor">Fem
            <br /><br />
            Quais Disciplinas o aluno irá cursar?<br />
            <?php
                include "conexao.php";
                $select = "SELECT * FROM disciplina ORDER BY nome";
                $resultado = mysqli_query($conexao,$select) or die("Erro no sistema. Contate o admin");
                while($linha=mysqli_fetch_assoc($resultado)){
                    echo "<input type='checkbox' name='disciplina[]' value='".$linha["id_disciplina"]."' class='menor'>".$linha["nome"]."</input><br />";
                }
            ?>
            <button>Enviar</button>
        </form>
    </fieldset>
</body>
</html>