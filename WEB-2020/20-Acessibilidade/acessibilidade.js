$(document).ready(function(){
    $("#aumentaFonte").click(function(){
        var tamanho = parseInt($("body").css("fontSize"));
        console.log(tamanho);
        tamanho += 2;
        console.log(tamanho);
        $("body").css("fontSize", tamanho +"px");
    });
    $("#diminuiFonte").click(function(){
        var tamanho = parseInt($("body").css("fontSize"));
        console.log(tamanho);
        tamanho -= 2;
        console.log(tamanho);
        $("body").css("fontSize", tamanho +"px");
    });
    $("#fontePadrao").click(function(){
        $("body").css("fontSize","16px");
    });
    $("#altoContraste").click(function(){
        var cor = $("body").css("backgroundColor");
        console.log(cor);
        if($("body").css("backgroundColor") == "rgb(255, 255, 255)"){
            $("body").css("backgroundColor","black");
            $("body").css("color","white");
            $("a").css("color","yellow");
        }
        else{
            $("body").css("backgroundColor","white");
            $("body").css("color","black");
            $("a").css("color","black");
        }
    });
});