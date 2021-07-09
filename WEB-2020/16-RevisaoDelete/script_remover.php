<script>
    $(function(){
       $(".remover_animal").click(function(){
           i = $(this).val();
           c = "id_animal";
           t = "animal";
           p = {tabela:t,id:i,coluna:c}
           $.post("remover.php",p,function(r){
                if(r=='1'){                
                    $("#msg").addClass("alert alert-info");
                    $("#msg").html("Animal removido com sucesso.");
                    $("button[value='"+ i +"']").closest("tr").remove();
                }
           });
       });
       $(".remover_cliente").click(function(){
           i = $(this).val();
           c = "id_cliente";
           t = "cliente";
           p = {tabela:t,id:i,coluna:c}
           $.post("remover.php",p,function(r){
                $("#msg").removeClass("alert alert-danger");
                $("#msg").removeClass("alert alert-info");
                if(r=='1'){    
                    $("#msg").addClass("alert alert-info");            
                    $("#msg").html("Cliente removido com sucesso.");
                    $("button[value='"+ i +"']").closest("tr").remove();
                }
                else{
                    $("#msg").addClass("alert alert-danger");            
                    $("#msg").html("Não é possível remover, pois há um animal cadastrado com esse dono");
                }
           });
       });
       $(".remover_especie").click(function(){
           i = $(this).val();
           c = "id_especie";
           t = "especie";
           p = {tabela:t,id:i,coluna:c}
           $.post("remover.php",p,function(r){
                $("#msg").removeClass("alert alert-danger");
                $("#msg").removeClass("alert alert-info");
                if(r=='1'){   
                    $("#msg").addClass("alert alert-info");             
                    $("#msg").html("Espécie removida com sucesso.");
                    $("button[value='"+ i +"']").closest("tr").remove();
                }
                else{
                    $("#msg").addClass("alert alert-danger");            
                    $("#msg").html("Não é possível remover, pois há uma raça cadastrada com essa espécie");
                }
           });
       });
       $(".remover_raca").click(function(){
           i = $(this).val();
           c = "id_raca";
           t = "raca";
           p = {tabela:t,id:i,coluna:c}
           $.post("remover.php",p,function(r){
                $("#msg").removeClass("alert alert-danger");
                $("#msg").removeClass("alert alert-info");
                if(r=='1'){  
                    $("#msg").addClass("alert alert-info");              
                    $("#msg").html("Raça removida com sucesso.");
                    $("button[value='"+ i +"']").closest("tr").remove();
                }
                else{
                    $("#msg").addClass("alert alert-danger");            
                    $("#msg").html("Não é possível remover, pois há um animal cadastrado com essa raça");
                }
            });
       }); 
    });
</script>