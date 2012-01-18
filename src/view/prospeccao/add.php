<style type="text/css">
.labelButao{
    color: #CC3300;
    cursor: pointer;    
}
</style>

<script type="text/javascript">
$(document).ready(function(){
    $(".esconde").hide();
    //isso é para descrição
    $("#labelExibirDescricao").click(function(){        
        $("#divDescricao").slideToggle("slow");
        $("#labelExibirDescricao").hide(); 
        $("#labelEsconderDescricao").show();
	return false;
    });    
    $("#labelEsconderDescricao").click(function(){        
        $("#divDescricao").slideToggle("slow");
        $("#labelExibirDescricao").show(); 
        $("#labelEsconderDescricao").hide();
	return false;
    });
    ///isso é para descrição//
    
    //isso é para Introducao
    $("#labelExibirIntroducao").click(function(){        
        $("#divIntroducao").slideToggle("slow");
        $("#labelExibirIntroducao").hide(); 
        $("#labelEsconderIntroducao").show();
	return false;
    });    
    $("#labelEsconderIntroducao").click(function(){        
        $("#divIntroducao").slideToggle("slow");
        $("#labelExibirIntroducao").show(); 
        $("#labelEsconderIntroducao").hide();
	return false;
    });
    ///isso é para Introducao//
    
    //isso é para Metodologia
    $("#labelExibirMetodologia").click(function(){        
        $("#divMetodologia").slideToggle("slow");
        $("#labelExibirMetodologia").hide(); 
        $("#labelEsconderMetodologia").show();
	return false;
    });    
    $("#labelEsconderMetodologia").click(function(){        
        $("#divMetodologia").slideToggle("slow");
        $("#labelExibirMetodologia").show(); 
        $("#labelEsconderMetodologia").hide();
	return false;
    });
    ///isso é para Metodologia//
    
    //isso é para DescricaoAreaPesquisa
    $("#labelExibirDescricaoAreaPesquisa").click(function(){        
        $("#divDescricaoAreaPesquisa").slideToggle("slow");
        $("#labelExibirDescricaoAreaPesquisa").hide(); 
        $("#labelEsconderDescricaoAreaPesquisa").show();
	return false;
    });    
    $("#labelEsconderDescricaoAreaPesquisa").click(function(){        
        $("#divDescricaoAreaPesquisa").slideToggle("slow");
        $("#labelExibirDescricaoAreaPesquisa").show(); 
        $("#labelEsconderDescricaoAreaPesquisa").hide();
	return false;
    });
    ///isso é para DescricaoAreaPesquisa//
    
    //isso é para DescricaoAreaPesquisa
    $("#labelExibirConsideracoesGeraisRecomendacoes").click(function(){        
        $("#divConsideracoesGeraisRecomendacoes").slideToggle("slow");
        $("#labelExibirConsideracoesGeraisRecomendacoes").hide(); 
        $("#labelEsconderConsideracoesGeraisRecomendacoes").show();
	return false;
    });    
    $("#labelEsconderConsideracoesGeraisRecomendacoes").click(function(){        
        $("#divConsideracoesGeraisRecomendacoes").slideToggle("slow");
        $("#labelExibirConsideracoesGeraisRecomendacoes").show(); 
        $("#labelEsconderConsideracoesGeraisRecomendacoes").hide();
	return false;
    });
    ///isso é para DescricaoAreaPesquisa//
    
    //validação
    $("#cadastrar").click(function(){ 
        if($("#nome").val() ==""){
            alert("é necessário o nome do projeto");
            $("#nome").focus();
        } else {
            $("#form").submit();
            return true;
        }        
    });
    
    
    
});
</script>



<div class=" header-content">
<h2 class="left">Cadastro de Prospecção</h2>
</div>
<hr class="mrg-bottom_20"/>
    <div id="dlist-cadastroashboard-wrap">
            <div class="metabox"></div>
            <div class="clear"></div>
            <div class="box-content">
                    <div class="box">
                            <div class="table">
                                    <div class="inside">
                                            <form method="post" id="form">
                                                    <fieldset>
                                                        <legend>Dados</legend>
                                                        <ul class="list-cadastro">
                                                            <li>
                                                                <p>
                                                                    <label for="nome">Elevação</label>
                                                                </p>    
                                                                <input type="text" id="elevacao" name="elevacao" value="" class="required" />
                                                            </li>
                                                        </ul>
                                                        
                                                        <ul class="list-cadastro">
                                                            <li>
                                                                <p>
                                                                    <label for="nome">Latitude</label>
                                                                </p>    
                                                                <input type="text" id="coordenada_UTM_N" name="coordenada_UTM_N" value="" class="required" />
                                                            </li>
                                                        </ul>
                                                        
                                                        <ul class="list-cadastro">
                                                            <li>
                                                                <p>
                                                                    <label for="nome">Longitude</label>
                                                                </p>    
                                                                <input type="text" id="coordenada_UTM_E" name="coordenada_UTM_E" value="" class="required" />
                                                            </li>
                                                        </ul>
                                                        
                                                        <ul class="list-cadastro">
                                                            <li>
                                                                <p>
                                                                    <label for="nome">Ponto de</label>
                                                                </p>    
                                                                Caminhamento <input type="radio" id="pontoDe" name="pontoDe" value="1"/> 
                                                                <br />ou
                                                                Sondagem <input type="radio" id="pontoDe" name="pontoDe" value="2"/>
                                                            </li>
                                                        </ul>
                                                        
                                                        <ul class="list-cadastro">
                                                            <li>
                                                                <p>
                                                                    <label for="nome">Observação</label>
                                                                </p>    
                                                                <textarea rows="2" cols="20" id="obs" name="obs"></textarea> 
                                                            </li>
                                                        </ul>

                                                    </fieldset>	


                                                    <ul id="bts">
                                                        <li>
                                                            <input type="button" id="cadastrar" class="button right" value=" Cadastrar " />
                                                            <input type="button" style="margin-right:5px;" class="button right" value="Voltar" onclick="location.href='voltar'" />
                                                        </li>
                                                    </ul>
                                            </form>
                                    </div><!--fim div inside-->
                            </div><!--fim div table-->
                            <div class="table-footer"></div>
                    </div><!--fim div box-->
            </div><!--fim div box-content-->
    </div><!--fim div dashboard-wrap-->
	