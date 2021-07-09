$(function() {

	$(".modalbtn").click(function() {
        $(".modal").css("display", "block");
    });

	$(".close").click(function() {
        $(".modal").css("display", "none");
    });

	$(".cancelbtn").click(function() {
        $(".modal").css("display", "none");
    });
	
	$(window).click(function(event) {
		//var target = event.target;
		//if (target.className=="modal") {
			//$(".modal").css("display", "none");
		//}
		var target = $(event.target);
		if(target.is($(".modal"))) {
			$(".modal").css("display", "none");
		}
	});

	$("#submeter").click(function(){
		if($("#lembrete").is(":checked")){
			let email64 = btoa($("#email").val());
			let usuario = {"email":email64, "data":Date.now()};
			localStorage.setItem("usuario", JSON.stringify(usuario));
		}
		else{
			if(localStorage.getItem("usuario")){
				localStorage.removeItem("usuario");
				// localStorage.clear(); remover tudo da localStorage
			}
		}
	});
	
	getItemLocalStorage();

});

function getItemLocalStorage(){

	if(localStorage.getItem("usuario")){
		var usuario = JSON.parse(localStorage.getItem("usuario"));
		var email = atob(usuario.email);
		var data = usuario.data;
		var dataAtual = Date.now();
		if(dataAtual - data >= 172800000){
			alert("localStorage expirou!");
			localStorage.removeItem("usuario");
		}
		else{
			$("#email").val(email);
		}
		
	}
}
