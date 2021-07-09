<section>
    <div class="container">
        <form action="jogar.php" method="POST">
            <br/><br/>
            <input type="hidden" name="estado" value="1" />
            <label><h6 class="display-5 text-center font-weight-bolder font-italic">Digite uma Letra: </h6></label>
            <input type="text" name="palavra_jogador" maxlength="1" size="1" class="teste" />
            <input type="submit" value="Enviar" class="botao" />
            <br/>
        </form>
        <form action="jogar.php" method="POST">
            <input type="hidden" name="estado" value="2" />
            <label><h6 class="display-5 text-center font-weight-bolder font-italic">Digite a palavra:</h6></label>
            <input type="text" name="palavra_completa" class="teste" />
            <input type="submit" value="Enviar" class="botao" /> 
        </form>
        <br/>   
        <form action="jogar.php" method="POST">
            <input type="hidden" name="estado" value="3" />
            <input type="submit" value="Quero uma Dica" class="botao btn btn-secondary" />
        </form>
       
    </div>
</section>