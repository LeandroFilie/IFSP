<?php
	
	$host = "localhost";
	$bd = "revisao";
	$usuario = "leandro";
	$senha = "12345";
	
	$conexao = mysqli_connect($host,$usuario,$senha,$bd);

	if(!$conexao) {
		echo mysqli_connect_errno();
		exit();
	}

	mysqli_set_charset($conexao, "utf8");
?>