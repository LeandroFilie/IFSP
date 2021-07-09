<?php
    $encontrou = FALSE;
    if(!empty($_GET)){
        $codigo = (int)$_GET["codigo"];

        $cadastro = simplexml_load_file("palavra.xml");

        foreach($cadastro->children() as $palavra){
            if($palavra->codigo == $codigo){
                $encontrou = TRUE;
                $nome = $palavra->nome;
                $dica = $palavra->dica;
                $dica_esp = $palavra->dica_esp;
                $dica_esp2 = $palavra->dica_esp2;
                break;
            }
        }
    }
?>
<article>
<div class="login-form col-sm-6 offset-sm-3 col-md-4 offset-md-4 center block" style="margin-bottom: 100px;">
    <form action="" method="POST" onsubmit="return validaFormulario()">
        <div class="modal-body">
            <div class="row">
                <div class="form-group col-sm-6 col-12 offset-sm-3">
                    <label for="codigo">Código da palavra</label>
                    <input type="text" name="codigo" id="codigo" class="form-control"'; 
                            <?php
                                if($encontrou){
                                    echo "value=\"$codigo\"";
                                }
                                else{
                                    $novo_codigo = obter_codigo("palavra");
                                    echo "value = \"$novo_codigo\"";
                                }
                            ?>
                    echo ' readonly="readonly"/>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6 col-12 offset-sm-3">
                <label for="palavra">Palavra</label>
                <input type="text" name="palavra" id="palavra" class="form-control"
                <?php
                    if($encontrou){
                        echo "value=\"$nome\"";
                    }
                ?> 
                onchange="validaNOME()"/>
                <span id="erroNOME" style="color:red;"></span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6 col-12 offset-sm-3">
                <label for="dica">Dica genérica</label>
                <input type="text" name="dica" id="dica" class="form-control"
                <?php
                    if($encontrou){
                        echo "value=\"$dica\"";
                    }
                ?>
                onchange="validaDICA()"/>
                <span id="erroDICA" style="color:red;"></span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6 col-12 offset-sm-3">
                <label for="dica_esp">Dica específica</label>
                <input type="text" name="dica_esp" id="dica_esp" class="form-control" 
                <?php
                    if($encontrou){
                        echo "value=\"$dica_esp\"";
                    }
                ?>
                onchange="validaDICAESP()"/>
                <span id="erroDICAESP" style="color:red;"></span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6 col-12 offset-sm-3">
                <label for="dica_esp2">Dica específica 2</label>
                <input type="text" name="dica_esp2" id="dica_esp2" class="form-control" 
                <?php
                    if($encontrou){
                        echo "value=\"$dica_esp2\"";
                    }
                ?>
                onchange="validaDICAESP2()"/>
                <span id="erroDICAESP2" style="color:red;"></span>
            </div>
        </div>
                
        <?php
        if($encontrou){
            echo "
                <input type=\"hidden\" name=\"alterar_palavra\" value=\"1\">
            ";
        }
        else{
            echo "
                <input type=\"hidden\" name=\"alterar_palavra\" value=\"0\">
            ";
        }
        ?>
        <hr>
        <button type="reset" class="btn btn-outline-danger" >
            Limpar
        </button>
        <button type="submit" class="btn btn-outline-dark" >
            Salvar
        </button>
    </div>
    </form>
</div>
</article>