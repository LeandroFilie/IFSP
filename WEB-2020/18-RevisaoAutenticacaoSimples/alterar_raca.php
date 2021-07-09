<form>
        <div class="form-group">
            <div class="input-group">
                <input type="text" name="nome_modal" id="nome_modal" placeholder="Nome da Raça" class="form-control" required= "required"/>
            </div>
        </div>
        <div class="form-group">    
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
        </div>
</form>
