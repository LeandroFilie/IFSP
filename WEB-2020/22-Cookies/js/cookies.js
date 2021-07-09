$(document).ready(function(){
	atualiza_tabela();

	$("#remover").click(function(){
		var nomes_cookies = [];
	
		$("input[name='excluirCookie']:checked").each(function() {
			nomes_cookies.push($(this).val());
		});
	
		$.post("remover_cookies.php", {"nomes_cookies":nomes_cookies}, function (retorno) {
			if(retorno == 1){
			atualiza_tabela();
		  }      
		});
		
    });
});
    

function atualiza_tabela(){
    $.post("tabela_cookies.php",function(conteudo) {
        $("#tab_cookies").html(conteudo);
    });
}