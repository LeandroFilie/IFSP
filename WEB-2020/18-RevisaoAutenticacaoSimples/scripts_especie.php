<script>
    $(function(){
        function define_alterar_remover(){ 
            $(".alterar").click(function(){
                i = $(this).val();
                $("#id_especie_oculto").val(i);
                $.get("seleciona_especie.php?id="+i,function(r){
                    e = r[0];
                    $("#nome_modal").val(e.nome);
                });
            });

            $(".remover").click(function(){
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
        }

        define_alterar_remover();

        $(".salvar").click(function(){ 
           p = {
                nome:$("input[name='nome_modal']").val(),
                id_especie: $("#id_especie_oculto").val()
           };      
           
           $.post("atualizar_especie.php",p,function(r){
            $("#msg").removeClass("alert alert-danger");
            $("#msg").removeClass("alert alert-info");
            if(r=='1'){
                $("#msg").addClass("alert alert-info");
                $("#msg").html("Espécie alterada com sucesso.");
                $(".close").click();
                atualizar_tabela();                
            }else{
                $("#msg").addClass("alert alert-danger"); 
                $("#msg").html("Falha ao atualizar Espécie.");
            }
           });
       }); 

       function atualizar_tabela(){           
            $.get("seleciona_especie.php",function(r){
                t = "";
                $.each(r,function(i,e){              
                    t += "<tr>";
                    t +=    "<td>"+e.nome+"</td>";
                    t +=    "<td>";
                    t +=        "<button class='btn btn-warning alterar' value='"+e.id_especie+"' data-toggle='modal' data-target='#modal'>Alterar</button>";
                    t +=        " <button class='btn btn-danger remover' value='"+e.id_especie+"'>Remover</button>";
                    t +=    "</td>";
                    t += "</tr>";
                });            
                $("#tbody_especie").html(t);
                define_alterar_remover();
            });
        }
    });


</script>