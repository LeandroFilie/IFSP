<div class="modal" tabindex="-1" rule="dialog" id="NovoUsuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             <h5 class="modal-title">Novo Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>

        <form action="cadastro_usuario.php" method="POST" onsubmit="return validaFormularioUser()">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-6 col-12">
                        <label for="codigo">Código</label>
                        <input type="text" name="codigo" id="codigo" class="form-control"'
                            <?php
                                $novo_codigo = obter_codigo("usuario");
                                 echo "value = \"$novo_codigo\"";
                            ?>
                        readonly ="readonly"/>
                    </div>
                    <div class="form-group col-sm-6 col-12">
                        <label for="nome">Nome Completo</label>
                        <input type="text" name="nome" id="nome" class="form-control"
                            onfocusout="validaNome()"
                            
                            />
                        <span id="erroNOME" style="color:red;"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="control-label" for="e-mail">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" 
                            onfocusout="validaEMAIL()"
                            
                       />
                        <span id="erroEMAIL" style="color:red;"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 col-12">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" class="form-control password" data-cript="sha1, md5" id="senha" 
                            onfocusout="validaSENHA()"
                            
                        />
                       
                    </div>
                    <div class="form-group col-sm-6 col-12">
                        <label for="senha">Confirmação de senha</label>
                        <input type="password" name="confirmasenha" class="form-control password" data-cript="sha1, md5" id="confirmasenha" 
                        onfocusout="validaCONFIRMASENHA()"
                            
                        />
                       
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 col-12">
                        <span id="erroSENHA" style="color:red;"></span>
                    </div>
                    <div class="form-group col-sm-6 col-12">
                        <span id="erroCONFIRMASENHA" style="color:red;"></span>
                    </div>
                </div>
                <input type="hidden" name="modo" id="modo" value="0" />
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary">Limpar</button>
                <button type="submit" class="btn btn-dark" onclick="return validaFormularioUser()">Salvar</button>
            </div>
        </form>
    </div>
</div>