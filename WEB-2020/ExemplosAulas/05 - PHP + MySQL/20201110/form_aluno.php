<?php
include "conf.php";

cabecalho();
?>
<h4>Cadastro de Aluno</h4>
<form method="post" action="insere_aluno.php">

    <input type="text" name="prontuario" placeholder="Prontuário..." class="input-control col-6" />
    <input type="text" name="nome" placeholder="Nome..." class="input-control col-6" />
    <input type="email" name="email" placeholder="Email..." class="input-control col-6" />
    <div>Data Nasc. <input type="date" name="data_nascimento" class="input-control col-5" /></div>
    Gênero: <input type="radio" name="sexo" value="m" /> Masc.
    <input type="radio" name="sexo" value="f" /> Fem.
    <input type="radio" name="sexo" value="o" /> Outro <br />
    <button class="input-control col-6">Cadastrar</button>


</form>

<?php
rodape();

?>