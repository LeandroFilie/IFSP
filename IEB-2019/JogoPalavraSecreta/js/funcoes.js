function modifica(){ 
    var excluir = window.confirm("Deseja mesmo excluir?");
}

function validaFormulario(){
	if(!validaNOME()){
		return false
	}
	if(!validaDICA()){
		return false
    }
    if(!validaDICAESP()){
		return false
    }	
    if(!validaDICAESP2()){
        return false;
    }
    
    var palavra = document.getElementById("palavra").value;
    var dica = document.getElementById("dica").value;
    var dica_esp = document.getElementById("dica_esp").value;
    var dica_esp2 = document.getElementById("dica_esp2").value;
    if(palavra == ""){
        alert("A palavra é obrigatória");
        return false;
    } 
    if(dica == ""){
        alert("A dica é obrigatória");
        return false;
    } 
    if(dica_esp == ""){
        alert("A dica é obrigatória");
        return false;
    } 
    if(dica_esp2 == ""){
        alert("A dica é obrigatória");
        return false;
    } 
}

function validaNOME(){
	var palavra = document.getElementById("palavra");
	
    if(palavra == ""){
        alert("A palavra é obrigatória");
        return false;
    }
	else{
		document.getElementById("erroNOME").innerHTML = "";
		palavra.style.background = "none";
	}
	
	return true;
}

function validaDICA(){
	var dica = document.getElementById("dica");
    if(dica == ""){
        alert("A dica é obrigatória");
        return false;
    } 
	else{
		document.getElementById("erroDICA").innerHTML = "";
		dica.style.background = "none";
	}
	
	return true;
}

function validaDICAESP(){
	var dica_esp = document.getElementById("dica_esp");

    if(dica_esp == ""){
        alert("A dica é obrigatória");
        return false;
    }
	else{
		document.getElementById("erroDICAESP").innerHTML = "";
		dica_esp.style.background = "none";
	}
	
	return true;
}

function validaDICAESP2(){
    var dica_esp2 = document.getElementById("dica_esp2");
    if(dica_esp2 == ""){
        alert("A dica é obrigatória");
        return false;
    } 
    else{
		document.getElementById("erroDICAESP2").innerHTML = "";
		dica_esp2.style.background = "none";
    }
    return true;
}

function modifica(){ 
    
    if(confirm("Certeza?? Tenho família!! Vai me excluir pra sempre mesmo?")){
        window.location.href='remover_palavra.php?';
    }
    else{
        return false;
    }
}

function validaNome() {
    var nome = document.getElementById("nome").value;
    if(nome == ""){
        document.getElementById("erroNOME").innerHTML = "O nome é obrigatório";
        return false;
    } 
    else{
        document.getElementById("erroNOME").innerHTML = "";
        
        return true;
    }
}

function validaEMAIL() {
    var email = document.getElementById("email").value;
    if(email == ""){
        document.getElementById("erroEMAIL").innerHTML = "O email é obrigatório";
        return false;
    } 
    else{
        document.getElementById("erroEMAIL").innerHTML = "";
        
        return true;
    }
}

function validaSENHA(){
    var senha = document.getElementById("senha").value;
    if(senha == ""){
        document.getElementById("erroSENHA").innerHTML = "A senha é obrigatória";
        return false;
    } 
    else{
        document.getElementById("erroSENHA").innerHTML = "";
        
        return true;
    }
}

function validaCONFIRMASENHA() {
    var confirmasenha = document.getElementById("confirmasenha").value;
    if(confirmasenha == ""){
        document.getElementById("erroCONFIRMASENHA").innerHTML = "A confirmação de senha é obrigatória";
        return false;
    } 
    else{
        document.getElementById("erroCONFIRMASENHA").innerHTML = "";
        
        return true;
    }
}

function comparaSENHA() {
    var senha = document.getElementById("senha").value;
    var confirmasenha = document.getElementById("confirmasenha").value;
    if (validaSENHA()) {
        if (validaCONFIRMASENHA()) {
            if (senha == confirmasenha) {
                document.getElementById("erroCONFIRMASENHA").innerHTML = "";
                return true;  
        }
        else {
            document.getElementById("erroCONFIRMASENHA").innerHTML = "As senhas não são compatíveis!";
            return false;

        }
    }
}
}

function validaFormularioUser(){
     
    // validar nome
    var nok = validaNome();

    var eok = validaEMAIL();
    var sok = validaSENHA();
    var cok = validaCONFIRMASENHA();
    if (sok && cok) {
        var compara = comparaSENHA();

    } 

if(nok && eok && sok && cok && compara){
        return true;
    }
    else {
        return false;
    }

            
}

function enviarDadosModal (codigo, nome, email) {
    document.getElementById('codigo').value = codigo;
    document.getElementById('nome').value = nome;
    document.getElementById('email').value = email;
    document.getElementById('modo').value = 1;

    $("#Usuario").modal();
}




