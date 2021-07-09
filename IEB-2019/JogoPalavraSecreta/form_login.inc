<header class="text-center">
    <h1><img class="img-fluid" src="images/logo.png"/></h1>
    <h2 class="text-center">Entre com seu <b>E-mail</b> e <b>Senha</b></h2>
</header>

<form action="verif_login.php" method="POST">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><i class="material-icons">email</i>
        </div>
        <input type="email" name="email" class="form-control" placeholder="E-mail" />
        </div>
    </div>
    <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="material-icons">lock</i></div>
            <input type="password" name="senha" class="form-control" placeholder="Senha" data-cript="sha1, md5"/>
        </div>
    </div>
    <footer>
        <div class="float-right">
            <button type="submit" class="btn btn-dark">Entrar</button>
        </div>
    </footer>
</form>
<footer>
    <div class="float-left"></div>
    <button class="btn btn-secondary" data-toggle="modal" data-target="#NovoUsuario">Cadastrar</button>
</footer>