<?php include "cabecalho.php"; ?>
    <fieldset>
        <legend>Cadastro de Disciplina</legend>
        <form method="post" action="insere_disciplina.php">
            <input type="text" name="nome" placeholder="Nome Disciplina..." />
            <textarea name="descricao" placeholder="Descrição da disciplina..."></textarea><br />
            <?php
                include "conexao.php";
                $select = "SELECT * FROM professor ORDER BY nome";
                $resultado = mysqli_query($conexao,$select) or die("Erro no sistema. Contate o admin");
                echo "<select name='cod_professor' required>";
                echo "<option label='::Selecione um Professor::''></option>";
                while($linha=mysqli_fetch_assoc($resultado)){
                    echo "<option value='".$linha["prontuario"]."'>".$linha["nome"]."</option>";
                }
                echo "</select>";
            ?>
            <br />
            <button>Enviar</button>
        </form>
    </fieldset>
</body>
</html>