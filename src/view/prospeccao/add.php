<style type="text/css">
.labelButao{
    color: #CC3300;
    cursor: pointer;    
}
</style>

<script type="text/javascript">
$.fn.radioSel = function(valueToSel){
        /* 
        Como usar
        » Marca o radio cujo valor é 'F';
          $('input[id=sexo]').radioSel('F')
        » Retorna o valor do radio selecionado ou 'false' caso nenhum esteja marcado;
          $('input[id=sexo]').radioSel()
        » Limpa todos o radio marcado;
          $('input[id=sexo]').radioSel('')
        */
 
        if(arguments.length>0){
            if(valueToSel!=''){
                return this.each(function(){ // itera sobre cada elemento encontrado
                    if($(this).val()==valueToSel)this.checked = true;
                })
            }else{ //Se veio vazio é para limpar todas as marcações
                return this.each(function(){ this.checked = false; })
            }
        }else{
            valorSelecionado = false;
            this.each(function(){ // itera sobre cada elemento encontrado
                if(this.checked){
                    valorSelecionado = $(this).val();
                    return valorSelecionado;
                }
            });
            return valorSelecionado;
        }
    };    
    
    
$(document).ready(function(){
    //validação
    $("#cadastrar").click(function(){ 
        
        if($("#elevacao").val() ==""){
            alert("é necessário a elevação da prospecção!");
            $("#elevacao").focus();
        } 
        else if($("#coordenada_UTM_N").val() ==""){
            alert("é necessário a latitude da prospecção!");
            $("#coordenada_UTM_N").focus();
        }
        else if($("#coordenada_UTM_E").val() ==""){
            alert("é necessário a longitude da prospecção!");
            $("#coordenada_UTM_E").focus();
        }
        else if($("#coordenada_UTM_E").val() ==""){
            alert("é necessário a longitude da prospecção!");
            $("#coordenada_UTM_E").focus();
        }
        else if($('input[id=pontoDe]').radioSel() == false){
            alert("é necessário definir o ponto de da prospecção!");
            $("#pontoDe").focus();
        }
        else {
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
                                                                    <label for="elevacao">Elevação*</label>
                                                                </p>    
                                                                <input type="text" id="elevacao" name="elevacao" value="" class="required" />
                                                            </li>
                                                        </ul>
                                                        
                                                        <ul class="list-cadastro">
                                                            <li>
                                                                <p>
                                                                    <label for="coordenada_UTM_N">Latitude*</label>
                                                                </p>    
                                                                <input type="text" id="coordenada_UTM_N" name="coordenada_UTM_N" value="" class="required" />
                                                            </li>
                                                        </ul>
                                                        
                                                        <ul class="list-cadastro">
                                                            <li>
                                                                <p>
                                                                    <label for="coordenada_UTM_E">Longitude*</label>
                                                                </p>    
                                                                <input type="text" id="coordenada_UTM_E" name="coordenada_UTM_E" value="" class="required" />
                                                            </li>
                                                        </ul>
                                                        
                                                        <ul class="list-cadastro">
                                                            <li>      
                                                                <p>
                                                                    <label for="pontoDe">Ponto de*</label>
                                                                </p> <br />                                                                
                                                                    <input type="radio" id="pontoDe" name="pontoDe" value="1"/> Caminhamento <br />
                                                                    <input type="radio" id="pontoDe" name="pontoDe" value="2"/> Sondagem <br />                                                                
                                                            </li>
                                                            <br />
                                                        </ul>
                                                        
                                                        <ul class="list-cadastro">
                                                            <li>
                                                                <p>
                                                                    <label for="obs">Observação</label>
                                                                </p>    
                                                                <textarea rows="2" cols="90" id="obs" name="obs"></textarea> 
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
	