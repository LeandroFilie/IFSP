<form>
    <div>
        <input type="text" name="nome_modal" id="nome_modal" placeholder="Nome do Animal" class="form-control" required= "required"/>
    </div>
    <div>
        <select name="especie_modal" id="especie_modal" class="form-control" required>
            <option label="::Selecione a Espécie::"></option>
                <?php
                    include "conexao.php";
                    $select = "SELECT id_especie, nome FROM especie";
                    $resultado = mysqli_query($conexao,$select);
                    while($linha=mysqli_fetch_assoc($resultado)){
                        echo '<option value='.$linha["id_especie"].'>'.$linha["nome"].'</option>';
                    }
                ?>
        </select>
    <div>     
    <div id="raca">
        <select name="cod_raca_modal" class="form-control" id="cod_raca_modal" required>
            <option label="::Selecione a Raça::"></option>
        </select>
    </div>        

    <div>        
        <select name="cliente_modal" id="cliente_modal" class="form-control" required>
            <option label="::Selecione o dono do animal::"></option>
                <?php
                    include "conexao.php";
                    $select = "SELECT id_cliente, nome FROM cliente";
                    $resultado = mysqli_query($conexao,$select);
                    while($linha=mysqli_fetch_assoc($resultado)){
                        echo '<option value='.$linha["id_cliente"].'>'.$linha["nome"].'</option>';
                    }
                ?>
        </select>
    <div>
</form>