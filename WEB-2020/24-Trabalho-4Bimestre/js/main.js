$(document).ready(function(){
    if(!localStorage.getItem("url")){ // Primeiro Acesso
        var title = $("title").html();
        if(title !== "Portal de Notícias"){
            var url = window.location.href;
            localStorage.setItem("url", url);
            var dataAcesso = Date.now();
            localStorage.setItem("dataAcesso", dataAcesso);
            qtdAcessos = btoa(1);
            localStorage.setItem("Entrance", qtdAcessos);
        }
    }
    else{ // Segundo Acesso ou posteriores
        var url=window.location.href;
        var title = $("title").html();
        if(localStorage.getItem("url") !== url){
            localStorage.setItem("url", url);
            var dataAtual = Date.now();
            if(dataAtual - localStorage.getItem("dataAcesso") < 2592000000 ){
                if(title !== "Portal de Notícias"){
                    var qtdAcessos = atob(localStorage.getItem("Entrance"))
                    var qtdAcessos = parseInt(qtdAcessos);
                    if(qtdAcessos < 5){
                        qtdAcessos = btoa(qtdAcessos+1);
                        localStorage.setItem("Entrance", qtdAcessos);
                    }
                    else{
                        localStorage.setItem("url", "limite");
                        $('#modal').modal('show');
                    }
                }
            }
            else{
                localStorage.removeItem("url");
                localStorage.clear();
            } 
        }
    }

})