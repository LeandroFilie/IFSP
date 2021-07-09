<?php
	function exibir($titulo, $conteudos) {
		$html = "<!DOCTYPE html>\n";
		$html .= "<html lang='pt-BR'>\n";
		$html .= "\t<head>\n";
		$html .= "\t\t<meta charset='UTF-8' />\n";
		$html .= "\t\t<title>".$titulo."</title>\n";
		$html .= "\t\t<script src='js/jquery-3.5.1.min.js'></script>\n";
		$html .= "\t\t<script src='js/login.js'></script>\n";
		$html .= "\t\t<script src='js/cookies.js'></script>\n";
		$html .= "\t</head>\n";
		$html .= "\t<body>\n";
		foreach($conteudos as $conteudo) {
			$html .= "\t\t".$conteudo."\n";
		}
		$html .= "\t\t<div id='tab_cookies'></div>\t\t";
		foreach($_COOKIE as $nome => $valor) {
			$i = 0;
			if($nome != "PHPSESSID"){
				$i++;
			} 
		}
		if($i != 0){
			$html .= "<br/><button type='button' id='remover'>Remover</button><br />";
		}
		$html .= "\t<p><a href='logout.php'>Sair</a></p>\t";
		$html .= "\t</body>\n";
		
		$html .= "\t</body>\n";
		$html .= "</html>";
		echo $html;
	}
?>