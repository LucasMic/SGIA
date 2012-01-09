<script type="text/javascript">

var valorCurso = parseFloat(0);
var resultPorcentagem = parseFloat(0);
var totalParcelas = parseFloat(0) ;
var itemSelecionado = "";
var idItemSelecionado = parseFloat(0);
var quan = parseFloat(0);

$(document).ready(function($){
	
	var qtd = 1;	
	//oculta o que precisa
	$("#div_parcelas").hide();
	$("#detalhes_cheques").hide();
	$("#divCurso").hide();
	for (i=1;i<=6;i++)
	{		
		$("#Pagamento"+i).hide();			
	}

	//exibe o valor do curso
	$("#cursos_id").change(function(){
		id = parseInt($("#cursos_id").val()) ;			
		if(id == 0){
			$("#ValorCurso").html("");
			return false;										
		}	
		else{
		$.get('matricula/valorCursoGet', {id: id}, 
				function(data, status){						
					if($.trim(data) == 'erro' || status != "success"){							
						$("#ValorCurso").html("");	
							return false;
					} else {					
																
						$("#ValorCurso").html("R$ "+data);
						valorCurso = data.replace(",",".");
					}		
				}
		);}			
	});//fim #cursos_id

	//retira os possiveis cursos que o aluno ja está cadastrado
	$("#alunos_id").change(function(){
			idAluno =  parseInt($("#alunos_id").val());		
			
			$.getJSON("aluno/cursoMatriculadoGet",{idAluno:idAluno}, function(json){
					
					var select = $('#cursos_id').empty();
					if(idAluno == 0 ){
						$("#divCurso").hide();
						return false;
						}					
					select.append('<option value=\"0\">Selecione um curso</option>');
					$.each(json,function(index, value){										
						select.append( '<option value="'
                                + value.id
                                + '">'
                                + value.nome
                                + '</option>' );
						});			
				

	       		} // fim do callback					
	       ); // fim do .getJSON()
			$("#divCurso").show();
		});

	

	//adiciona cheque
	$("#addCheque").live('click',function(){		
		i = $("#indiceDeCheques").val();
		$("<div id='cheque_" + i + "' style='margin-left:25px;'><hr class='mrg-bottom_10' />"+				
				"<input type='button' class='button-delete right' style='margin-bottom:-6px' value='x' />"+				
				"<p style='margin-left:0px;'><strong>" + i + ")</strong></p>"+				
				
				"<p>Agência</p><input type='text' tittle='Agência"+ i +"' class='conteudoCheque' name='cheques[" + i + "][agencia]' id='agencia_" + i + "' value=''>"+				
				"<p>Conta</p><input type='text' tittle='Conta"+ i +"' class='conteudoCheque' name='cheques[" + i + "][conta]' id='conta_" + i + "' value=''>"+				
				"<p>Número do Cheque</p><input type='text' tittle='Número do cheque"+ i +"' class='conteudoCheque' name='cheques[" + i + "][numero_cheque]' id='numero_cheque_" + i + "' value=''>"+				
				"<p>Data de Vencimento</p><input type='text' tittle='Data de vencimento"+ i +"' class='conteudoChequeData' name='cheques[" + i + "][data_vencimento]' id='data_vencimento_" + i + "' value='' alt='date'>"+				

				"<p>Valor</p><input type='text' class='valorMatricula' name='cheques[" + i + "][valor]' id='valor_" + i + "' value='' alt='decimal'>"+
				
		"</div>").appendTo("#detalhes_cheques");

		$("input").setMask();
        quantidade = parseInt($("#quantidadeDeCheques").val());
		$("#quantidadeDeCheques").val(quantidade + 1);
		indice = parseInt($("#indiceDeCheques").val());
		$("#indiceDeCheques").val(indice + 1);
	});//fim #addcheque

	//fecha o cheque adicionado
	$(".button-delete").live('click', function(){
		$(this).parent().fadeOut("slow").delay(1000).queue(function() { $(this).remove(); });
		quantidade = parseInt($("#quantidadeDeCheques").val());
		$("#quantidadeDeCheques").val(quantidade - 1);
		if((quantidade - 1) == 0){
			$("#indiceDeCheques").val(1);
		}
	});//fim button-delete

    //fecha tipo de pagamento 

    //fecha pagamento bolsa de estudos
    $("#fechaPagamentoBolsaEstudo").live('click', function(){
        $("#formasPagamento_" + $(this).attr("pagamento")).removeAttr('disabled');
        $("#pagamento_" + $(this).attr("pagamento")).html("Pagamento por:");
		$(this).parent().fadeOut("slow").delay(1000).queue(function() {                
            $(".formasPagamento").append("<option value=1>Bolsa de estudos</option>");
         });
    });//fim button-delete

    //fecha fechaPagamentoCartaCredito
    $("#fechaPagamentoCartaCredito").live('click', function(){
        $("#formasPagamento_" + $(this).attr("pagamento")).removeAttr('disabled');
        $("#pagamento_" + $(this).attr("pagamento")).html("Pagamento por:");
		$(this).parent().fadeOut("slow").delay(1000).queue(function() {
            $(".formasPagamento").append("<option value=2>Carta de crédito</option>");
        });
    });//fim button-delete

    //fecha fechaPagamentoCartaCredito
    $("#fechaPagamentoCartaoCredito").live('click', function(){
        $("#formasPagamento_" + $(this).attr("pagamento")).removeAttr('disabled');
        $("#pagamento_" + $(this).attr("pagamento")).html("Pagamento por:");
		$(this).parent().fadeOut("slow").delay(1000).queue(function() {
            $(".formasPagamento").append("<option value=3>Cartão de crédito</option>");
        });

    });//fim button-delete

    //fecha fechaPagamentoCartaoDebito
    $("#fechaPagamentoCartaoDebito").live('click', function(){
        $("#formasPagamento_" + $(this).attr("pagamento")).removeAttr('disabled');
		$("#pagamento_" + $(this).attr("pagamento")).html("Pagamento por:");
        $(this).parent().fadeOut("slow").delay(1000).queue(function() {
            $(".formasPagamento").append("<option value=4>Cartão de débito</option>");
         });
    });//fim button-delete

    //fecha fechaPagamentoCheque
    $("#fechaPagamentoCheque").live('click', function(){
        $("#formasPagamento_" + $(this).attr("pagamento")).removeAttr('disabled');
		$("#pagamento_" + $(this).attr("pagamento")).html("Pagamento por:");
        $(this).parent().fadeOut("slow").delay(1000).queue(function() {
            $(".formasPagamento").append("<option value=5>Cheque</option>");
        });
    });//fim button-delete

    //fecha fechaPagamentoEspecie
    $("#fechaPagamentoEspecie").live('click', function(){
        $("#formasPagamento_" + $(this).attr("pagamento")).removeAttr('disabled');
		$("#pagamento_" + $(this).attr("pagamento")).html("Pagamento por:");
        $(this).parent().fadeOut("slow").delay(1000).queue(function() {
            $(".formasPagamento").append("<option value=6>Espécie</option>" );
        });
    });//fim button-delete
    
    
	//botão enviar
	$("#submeter").click(function(){   
    
		totalParcelas = parseFloat(0);		
		if ($("#alunos_id").val() == 0){
			alert("Escolha o aluno");
			return false;
		}		
		if($("#cursos_id").val() == 0){
			alert("Escolha o curso");
			return false;
		}	
		if($("#QuantidadePagamentos").val() == 0){
			alert("Escolha a quantidade de formas de pagamento");
			return false;
		}       
        
		var testaCondicao = true;		
		//testa se os inputs do cheque foram preenchidos				
		if ($('.conteudoCheque').size()){//testa se existe elemntos desta classe na arvore dom
			$.each($(".conteudoCheque"), function(){// faz uma iteração de todos os elementos desta mesma classe  			
				// e utilizado o this para referenciar cada elemento desta classe
				if($(this).val() == ""){
					alert("Preencha a informação de: "+ $(this).attr('tittle'));
					testaCondicao = false;
					return false;																									
				}					
			});
			//para parar a excução da função se existir campo de cheque em branco 	
			if(!testaCondicao){
				return false;
			}
			if(!validarData($('.conteudoChequeData').val(),'Data', false)){
					alert("Preencha a data do vencimento do cheque corretamente");
					testaCondicao = false;
					return false;			
				}											
		}
		//para parar a excução da função se existir campo de cheque em branco 	
		if(!testaCondicao){
			return false;
		}
        
        if($('.parcelasCartaoCredito').size() && $('.parcelasCartaoCredito').val()=='' ) {
            alert("Indique a quantidade de parcelas");
			return false;
        }
        
        
        if($('.parcelasCartaoCredito').val() < 1 || $('.parcelasCartaoCredito').val() > 12){
            alert("As parcelas devem estar entre 1 ou 12 vezes");
			return false;
        }
        
		//testa o arquivo anexo
		if($('.arquivoAnexo').size() && $('.arquivoAnexo').val()==''){
				alert("Falta anexar o documento de carta de crédito");
				return false;
			}			
		//percorre campos de mesma classe
		$.each($(".valorMatricula"), function(){			
			totalParcelas = totalParcelas + parseFloat($(this).val().replace(",", "."));
		});		
		//calcula se o valor de todas as parcelas não é menor que o valor do curso		
		//verifica se preencheu porcentagem e calcula
		//typeof é pra saber se realmente existe o objeto		
		if ($('.valorMatriculaPorcentagem').val() != '00,00' && typeof $('.valorMatriculaPorcentagem').val() != 'undefined'){
			//trata o valor de porcentagem		
			var totPorcentagem = $('.valorMatriculaPorcentagem').val().replace(",",".");			
			resultPorcentagem = (valorCurso * totPorcentagem)/100;			
			//alert ("Valor da porcentagem: "+resultPorcentagem);				
		}			
		totalParcelas = totalParcelas+resultPorcentagem;				
		//trata o valor do curso pra compara				
		if((totalParcelas < valorCurso) || (totalParcelas == 0)){			      
            alert("total a ser pago"+ totalParcelas);
            alert("valor do curso"+ valorCurso);
            alert('Total a ser pago é menor que o valor do curso, preencha os valores novamente');			
			return false;
		}           
        
        if(totalParcelas > valorCurso){
            
            alert("total a ser pago"+ totalParcelas);
            alert("valor do curso"+ valorCurso);
            
            alert('Valor a ser pago maior que o valor do curso, preencha os valores novamente');			
			return false;
        }        
		else{			
			return true;
		}				
	});// fim submeter


		

	//cria formas pagamento
	$("#QuantidadePagamentos").change(function(){
		quan = parseInt($("#QuantidadePagamentos").val());				
		for (f=0; f<=6; f++){
			$("#TipoPagamento_"+f).remove();
		}

		<?php //metodo pra preenche o select
				
			try{ 
				$formasPagmentos = FormaPagamento::listar();
				$formasDePagamentos = "";
				foreach($formasPagmentos as $formasPagmento){																																		
					$formasDePagamentos .= "<option value='". $formasPagmento->getId(). "'>" . $formasPagmento->getNome(). "</option>";
				}
				}catch(ListaVazia $e){
					$formasDePagamentos = "<option value='0'>Não existem formas de pagamento cadastradas</option>";
				} 
		?>
		
		if(quan != 0){
			for (i=1; i<=quan; i++){
				$("<div class='radius' id='TipoPagamento_" + i + "'><table id='lista' border='0' cellpadding='0' cellspacing='0' width='745'><thead><tr class='tr-header'><th class='titulo' id='pagamento_"+i+"'>Pagamento por:</th></tr></thead><tbody><tr><td width='100%' align='left'><li>Formas de pagamento:</li> <select name='formasPagamento_"+i+"' class='formasPagamento' id='formasPagamento_"+i+"' pagamento='"+i+"'> <option  value=0 selected='selected'>Selecione uma Forma de Pagamento</option> <?php echo $formasDePagamentos;?></select>                         <li id='ConteudoPagamento_"+ i +"'></li></td></tr></tbody></table></div>").appendTo("#inseriPagamento");
			}}

	});//fim QuantidadePagamentos
	
	
	//gerencia formas pagamento
	$(".formasPagamento").live("change", function(){	
        
       
		tituloPagamento = $(this).find('option:selected').text();
		valorOption = $(this).find('option:selected').val();						  
        
        
		$("#pagamento_"+$(this).attr("pagamento")).html("Pagamento por: "+tituloPagamento);
		
		if(tituloPagamento == "Bolsa de estudos"){				


                $(this).attr('disabled', 'disabled');
				$(".formasPagamento").find('option[value='+valorOption+']').remove();
                $("#ConteudoPagamento_"+$(this).attr("pagamento")).html("<div id='conteudo'><p></p>Porcentagem da bolsa(%)&nbsp&nbsp<input type='text' class='valorMatriculaPorcentagem' name='Pagamento[1]' value='' alt='integer' /><input pagamento='"+$(this).attr("pagamento")+"' type='button' id='fechaPagamentoBolsaEstudo' class='fechaPagamento right' style='margin-bottom:-6px' value='x' /></div>");
		}		
		if(tituloPagamento == "Carta de crédito"){
                $(this).attr('disabled', 'disabled');
				$(".formasPagamento").find('option[value='+valorOption+']').remove();
                $("#ConteudoPagamento_"+$(this).attr("pagamento")).html("<div id='conteudo'><p></p>Valor da carta:&nbsp&nbsp<input type='text' class='valorMatricula' name='Pagamento[2]' value='' alt='decimal' /><p></p>Anexar documento:&nbsp&nbsp<input class='arquivoAnexo' type='file' name='arquivoAnexo' id='arquivoAnexo' size='chars'/><input pagamento='"+$(this).attr("pagamento")+"' type='button' id='fechaPagamentoCartaCredito' class='fechaPagamento right' style='margin-bottom:-6px' value='x' /></div>");
		}
		if(tituloPagamento == "Cartão de crédito"){                
                $(this).attr('disabled', 'disabled');
				$(".formasPagamento").find('option[value='+valorOption+']').remove();
                $("#ConteudoPagamento_"+$(this).attr("pagamento")).html("<div id='conteudo'><p></p>Valor total:&nbsp&nbsp<input type='text' class='valorMatricula' name='Pagamento[3]' value='' alt='decimal' /><p></p>Número de Parcelas:&nbsp&nbsp<input type='text' id='parcelasCartaoCredito' class='parcelasCartaoCredito' name='parcelasCartaoCredito' value='0' /><input pagamento='"+$(this).attr("pagamento")+"' type='button' id='fechaPagamentoCartaoCredito' class='fechaPagamento right' style='margin-bottom:-6px' value='x' /><div>");
		}
		if(tituloPagamento == "Cartão de débito"){                
                $(this).attr('disabled', 'disabled');
        		$(".formasPagamento").find('option[value='+valorOption+']').remove();
				$("#ConteudoPagamento_"+$(this).attr("pagamento")).html("<div id='conteudo'><p></p>Valor :&nbsp&nbsp<input type='text' class='valorMatricula' name='Pagamento[4]' value='' alt='decimal' /><input pagamento='"+$(this).attr("pagamento")+"' type='button' id='fechaPagamentoCartaoDebito' class='fechaPagamento right' style='margin-bottom:-6px' value='x' /></div>");
		}
		if(tituloPagamento == "Cheque"){              
                $(this).attr('disabled', 'disabled');
				$(".formasPagamento").find('option[value='+valorOption+']').remove();
                $("#ConteudoPagamento_"+$(this).attr("pagamento")).html("<div id='conteudo'><li id='detalhes_cheques'><input type='hidden' id='quantidadeDeCheques' value='0'/><input type='hidden' id='indiceDeCheques' value='1' name='Pagamento[5]'/><input type='button' class='button-add' style='margin-bottom:10px;' id='addCheque' value='+ Adicionar Cheque' style='clear:both'/><p><strong>Detalhes do Cheque:</strong></p><br /></li><input pagamento='"+$(this).attr("pagamento")+"' type='button' id='fechaPagamentoCheque' class='fechaPagamento right' style='margin-bottom:-6px' value='x' /></div>");
		}
		if(tituloPagamento == "Espécie"){
                $(this).attr('disabled', 'disabled');
                $(".formasPagamento").find('option[value='+valorOption+']').remove();        
				$("#ConteudoPagamento_"+$(this).attr("pagamento")).html("<div id='conteudo'><p></p>Valor:&nbsp&nbsp<input type='text' class='valorMatricula' name='Pagamento[6]' value='' alt='decimal' /><input pagamento='"+$(this).attr("pagamento")+"' type='button' id='fechaPagamentoEspecie' class='fechaPagamento right' style='margin-bottom:-6px' value='x' /></div>");
		}	        
		$("input").setMask();
	});//fim gerencia formas pagamento


	
	 		
});

</script>

<div class=" header-content">
		<h2 class="left">Cadastro de Matrícula</h2>
		<?php
    		require_once VIEW . DS . "default" . DS . "sede.php";
    	?>	
	</div>
	<br />
	<hr class="mrg-bottom_20"/>
	<div id="dashboard-wrap">
		<div class="metabox"></div>
		<div class="clear"></div>
		<div class="box-content">
			<div class="box">
				<div class="table">
					<div class="inside">
						<form method="post" name="add" enctype="multipart/form-data">
							<fieldset>
								<legend>Dados</legend>
								<ul class="list-cadastro">
									<li>
										<p>Aluno:</p>
										<input type="hidden" name="idSede" id="idSede" value="<?php echo $_SESSION["sede"] ?>">
										<?php 
												try{
													$alunos = Aluno::listar($_SESSION["sede"]);
													?>
													<select name="alunos_id" id="alunos_id">
													<option value="0">Selecione um Aluno</option>
													<?php					
													foreach($alunos as $aluno){
														?>
														<option value="<?php echo $aluno->getId(); ?>"><?php echo $aluno->getNome(); ?></option>
														<?php
													}
													?>
													</select>
													<?php
												}catch(ListaVazia $e){
													echo "<select disabled='disabled'><option selected='selected' value='0'>Não existem alunos cadastrados</option></select>";
												}
											?>
									</li>
									<li>
										<div id="divCurso" name="divCurso">									
										<p>Curso:</p>
										<select name="cursos_id" id="cursos_id">
											<option value="0">Selecione um curso</option>
										<?php 
											/*try{
												$cursos = Curso::listar($_SESSION["sede"]);
												foreach($cursos as $key => $curso){
													?>
													<option id="curso_<?php echo $curso->getId();?>" valorPromocional="<?php echo $curso->getValorPromocionalValido();?>" datapromocional="<?php echo str_replace("-", "/", $curso->getDataEncerramentoPromocional()); ?>" value="<?php echo $curso->getId(); ?>"><?php echo $curso->getNome(); ?></option>
													<?php
												}
											}catch(ListaVazia $e){
												echo "<option value='0'>Não existem cursos cadastrados</option>";
											}*/
										?>										
										</select>
										<b style="color:red;" id="ValorCurso"></b>
										</div>
										
									</li>								
									
									<li>
										<p>Quantidade de formas de pagamento:</p>
											<select name="QuantidadePagamentos" id="QuantidadePagamentos">
												<option value='0'>Selecione a quantidade de pagamentos</option>
												<option value='1'>1</option>
												<option value='2'>2</option>
												<option value='3'>3</option>
												<option value='4'>4</option>
												<option value='5'>5</option>
												<option value='6'>6</option>
											</select>
										<b style="color:red;" id="FormaPagamento"></b>
									</li>

									<li id="inseriPagamento">
																
									</li>			
                                    
									<li id="detalhes_cheques">
										<input type="hidden" id="quantidadeDeCheques" value="0"/>
                               			<input type="hidden" id="indiceDeCheques" value="1"/>
                               			<input type="button" class="button-add" style="margin-bottom:10px;" id="addCheque" value="+ Adicionar Cheque" style="clear:both"/>
										<p><strong>Detalhes do Cheque:</strong></p>
										<br />
									</li>                                    
								</ul>
								<input type="submit" id="submeter" class="button right" value=" Cadastrar " />
							</fieldset>
							<ul id="bts">
								<li>
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
