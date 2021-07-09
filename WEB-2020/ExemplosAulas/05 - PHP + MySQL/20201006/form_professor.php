<?php include "cabecalho.php"; ?>
    <fieldset>
        <legend>Cadastro de Professor</legend>
        <form method="post" action="insere_professor.php">
            <input type="text" name="prontuario" placeholder="Prontuario..." />
            <input type="text" name="nome" placeholder="Nome..." />
            <input type="email" name="email" placeholder="Email..." />
            <input type="text" name="formacao" placeholder="Formação Acadêmica..." />
            <br />
            <button>Enviar</button>
        </form>
    </fieldset>
</body>
</html>