<?php
	session_start();

	include "conteudo.php";

	if(isset($_SESSION['tempo']) && (time() - $_SESSION['tempo'] >= 60)){
		session_destroy();
		echo  "<script>alert('Sua sessão expirou, faça login novamente');</script>";
		echo "<script>location.href='index.php'</script>";
	}
	else{
		$_SESSION["tempo"]=time();
	}	
	
	if(isset($_SESSION["cpf"])){
		$titulo = "Entrada";
		$conteudos = array();
		$conteudos[0] = "<p>Olá, ".$_SESSION['email'].".</p>";
		$conteudos[1] = "<p>Seu CPF é ".$_SESSION['cpf'].".</p>";
		$conteudos[2] = "<p>Seu tipo é ".$_SESSION['nome'].".</p>";
		$conteudos[3] = "<p>Sua permissão é do nível ".$_SESSION['nivel']." - ".$_SESSION['descricao']."</p>";
		$conteudos[4] = "<p>Seja bem vindo ao sistema</p><br />";
		$conteudos[5] = "<div id='tab_cookies'></div>";
		exibir($titulo, $conteudos);
	}
	else{
		//session_destroy();
		header("location: form_login.php");
	}

?>