<?php 
$projeto = $this->getDados('VIEW');
?>
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
            $("#formProjeto").submit();
            return true;
        }        
    });    
});
</script>



<div class=" header-content">
<h2 class="left">Editar Projeto</h2>
<?php
        //AQUI SERVE PRA EXIBIR O SELECT DE ACORDO COM A SEDE NO CASO PROJETO
        //require_once VIEW . DS . "default" . DS . "sede.php";
?>	
</div>
<hr class="mrg-bottom_20"/>
    <div id="dlist-cadastroashboard-wrap">
            <div class="metabox"></div>
            <div class="clear"></div>
            <div class="box-content">
                    <div class="box">
                            <div class="table">
                                    <div class="inside">
                                            <form method="post" id="formProjeto">
                                                <input type="hidden" id="id" name="id" value="<?php echo $projeto->getId();?>" />
                                                    <fieldset>
                                                        <legend>Dados</legend>
                                                        <ul class="list-cadastro">
                                                            <li>
                                                                <p>
                                                                    <label for="nome">Nome do projeto</label>
                                                                </p>    
                                                                <input type="text" id="nome" name="nome" value="<?php echo $projeto->getNome();?>" class="required" />
                                                            </li>
                                                        </ul>
                                                        
                                                        <ul class="list-cadastro">
                                                            <li style="margin-bottom: 16px;">
                                                                <p>
                                                                    <label for="descricao">Descrição do projeto</label>
                                                                </p>
                                                                <p>
                                                                    <label class="labelButao" id="labelExibirDescricao"> Exibir + </label>
                                                                    <label class="labelButao esconde" id="labelEsconderDescricao"> Esconder - </label>
                                                                </p>
                                                            </li>
                                                            
                                                            <li style="margin-bottom: 16px;" id="divDescricao" class="esconde">
                                                                <textarea rows="2" cols="20" id="descricao" name="descricao" class="tinymce"><?php echo $projeto->getDescricao();?></textarea> 
                                                            </li>
                                                        </ul>
                                                        
                                                        
                                                        <ul class="list-cadastro">
                                                            <li style="margin-bottom: 16px;">
                                                                <p>
                                                                    <label for="introducao">Introdução do projeto</label>
                                                                </p>
                                                                <p>
                                                                    <label class="labelButao" id="labelExibirIntroducao"> Exibir + </label>
                                                                    <label class="labelButao esconde" id="labelEsconderIntroducao"> Esconder - </label>
                                                                </p>
                                                            </li>
                                                            <li style="margin-bottom: 16px;" id="divIntroducao" class="esconde">
                                                                <textarea rows="2" cols="20" id="introducao" name="introducao" class="tinymce"><?php echo $projeto->getIntroducao();?></textarea> 
                                                            </li>
                                                        </ul>
                                                        
                                                        <ul class="list-cadastro">
                                                            <li style="margin-bottom: 16px;">
                                                                <p>
                                                                    <label for="introducao">Metodologia do projeto</label>
                                                                </p>
                                                                <p>
                                                                    <label class="labelButao" id="labelExibirMetodologia"> Exibir + </label>
                                                                    <label class="labelButao esconde" id="labelEsconderMetodologia"> Esconder - </label>
                                                                </p>
                                                            </li>
                                                            <li style="margin-bottom: 16px;" id="divMetodologia" class="esconde">
                                                                <textarea rows="2" cols="20" id="metodologia" name="metodologia" class="tinymce"><?php echo $projeto->getMetodologia();?></textarea>
                                                            </li>
                                                        </ul>
                                                        
                                                        <ul class="list-cadastro">
                                                            <li style="margin-bottom: 16px;">
                                                                <p>
                                                                    <label for="DescricaoAreaPesquisa">Descrição da área da pesquisa</label>
                                                                </p>
                                                                <p>
                                                                    <label class="labelButao" id="labelExibirDescricaoAreaPesquisa"> Exibir + </label>
                                                                    <label class="labelButao esconde" id="labelEsconderDescricaoAreaPesquisa"> Esconder - </label>
                                                                </p>
                                                            </li>
                                                            <li style="margin-bottom: 16px;" id="divDescricaoAreaPesquisa" class="esconde">
                                                                <textarea rows="2" cols="20" id="descricaoAreaPesquisa" name="descricaoAreaPesquisa" class="tinymce"><?php echo $projeto->getDescricaoAreasPesquisa();?></textarea> 
                                                            </li>
                                                        </ul>
                                                        
                                                        <ul class="list-cadastro">
                                                            <li style="margin-bottom: 16px;">
                                                                <p>
                                                                    <label for="ConsideracoesGeraisRecomendacoes">Considerações gerais / recomendações</label>
                                                                </p>
                                                                <p>
                                                                    <label class="labelButao" id="labelExibirConsideracoesGeraisRecomendacoes"> Exibir + </label>
                                                                    <label class="labelButao esconde" id="labelEsconderConsideracoesGeraisRecomendacoes"> Esconder - </label>
                                                                </p>
                                                            </li>
                                                            <li style="margin-bottom: 16px;" id="divConsideracoesGeraisRecomendacoes" class="esconde">
                                                                <textarea rows="2" cols="20" id="consideracoesGeraisRecomendacoes" name="consideracoesGeraisRecomendacoes" class="tinymce"><?php echo $projeto->getConsideracoesGeraisRecomendacoes();?></textarea> 
                                                            </li>
                                                        </ul>

                                                    </fieldset>	


                                                    <ul id="bts">
                                                        <li>
                                                            <input type="button" id="cadastrar" class="button right" value=" Editar " />
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