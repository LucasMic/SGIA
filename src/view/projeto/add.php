<style type="text/css">

.spanButao{
    color: #CC3300;
    cursor: pointer;
    /*display: block;*/
}


</style>

<script type="text/javascript">
$(document).ready(function(){
    //$(".esconde").hide();
    
    /*$("#labelDescricao").click(function(){        
        $("#divDescricao").slideToggle("slow");
	return false; //Prevent the browser jump to the link anchor
    });*/
});
</script>


<script type="text/javascript">
jQuery.fn.toggleText = function(a,b) {
    return   this.html(this.html().replace(new RegExp("("+a+"|"+b+")"),function(x){return(x==a)?b:a;}));
}
 
$(document).ready(function(){
$('.tgl').before('<span id="spanButao"> Exibir</span>');
$('.tgl').css('display', 'none')
    $('#spanButao').click(function() {
        alert("oi");
        $(this).next().slideToggle('slow').siblings('.tgl:visible').slideToggle('fast');
        // aqui começa o funcionamento do plugin
        //$(this).toggleText('Exibir','Ocultar').siblings('span').next('.tgl:visible').prev().toggleText('Exibir','Ocultar');
    });
})
</script>





	<div class=" header-content">
    	<h2 class="left">Cadastro de Projeto</h2>
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
                                            <form method="post">
                                                    <fieldset>
                                                        <legend>Dados</legend>
                                                        <ul class="list-cadastro">
                                                            <li>
                                                                <p>
                                                                    <label for="nome">Nome do projeto</label>
                                                                </p>    
                                                                <input type="text" id="nome" name="nome" value="" class="required" />
                                                            </li>
                                                        </ul>                                                            

                                                        <ul class="list-cadastro">
                                                            <li>
                                                                <p>
                                                                    <label for="descricao">Descrição do projeto</label>                                                                    
                                                                </p> 
                                                                <p class="tgl">
                                                                    <textarea rows="2" cols="20" id="descricao" name="descricao" class="tinymce"></textarea> 
                                                                </p>
                                                            </li>
                                                        </ul>

                                                        <!--<ul id="divDescricao" class="list-cadastro esconde">

                                                            <p>
                                                                <label for="descricao">Descrição do projeto</label>
                                                                <label class="labelButao" id="labelDescricao"> Exibir </label>
                                                            </p>  

                                                            <li class="tgl">                                                                    
                                                                <textarea rows="2" cols="20" id="descricao" name="descricao" class="tinymce"></textarea> 
                                                            </li>
                                                        </ul>-->

                                                    </fieldset>	


                                                    <ul id="bts">
                                                        <li>
                                                            <input type="submit" class="button right" value=" Cadastrar " />
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
	