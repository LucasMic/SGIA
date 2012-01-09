<script type="text/javascript">
	$(document).ready(function($){
		
		
		//Telas e Campos que devem aparecer ocultos ao carregar a tela
		$("#dadosContratuais").hide();
		$("#documentos").hide();
		$("#cadastroEmpregado").hide();
		$("#estadoCivilOutro").hide();
		$("#informacoesComplementares").hide();
		$(".transporteV").hide();
		$(".refeicaoV").hide();
		
		
		$(".fancy").fancybox({
			'width'				: '25%',
			'height'			: '40%',
			'autoScale'			: false,
			'scrolling'         : 'no',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'iframe'
		});
		
		$(".button-delete").live('click', function(){
			$(this).parent().fadeOut("slow").delay(1000).queue(function() { $(this).remove(); });
			quantidade = parseInt($("#quantidadeDeFilhos").val());
			$("#quantidadeDeFilhos").val(quantidade - 1);
			if((quantidade - 1) == 0){
				$("#indiceDeFilhos").val(0);
			}
		});
		
		$(".tc").click(function(){
			$("#tc").val($(this).attr("tc"));
			$("#tipoColaborador").hide();
			$("#cadastroEmpregado").fadeIn("slow");
		});
		
		$(".possui_vTransporte").change(function(){
			if($(".possui_vTransporte:checked").val() == 1){
				$(".transporteV").fadeIn();		
			} else {
				$(".transporteV").hide();
			}
		});
		
		$(".possui_vAlimentacao").change(function(){
			if($(".possui_vAlimentacao:checked").val() == 1){
				$(".refeicaoV").fadeIn();		
			} else {
				$(".refeicaoV").hide();
			}
		});
		
		$(".estadoCivil").change(function(){
			if($(".estadoCivil:checked").val() == 2){
				$("#estadoCivilOutro").show();		
			} else {
				$("#estadoCivilOutro").hide();
				$("#estadoCivilOutro").val('');
			}
		});
		
		
		$("#addFilho").click(function(){
			$("<div class='mrg-top_20'><hr class='mrg-bottom_10' /><input type='button' class='button-delete right' style='margin-bottom:-6px' value='x' /><div class='inline-block'><p>Nome:</p><input type='text' name='filho[" + $("#indiceDeFilhos").val() +"][nome]' class='width_685' value=''/></div><div class='inline-block'><span class='left'><p>Data de Nascimento:</p><input type='text' name='filho[" + $("#indiceDeFilhos").val() +"][nascimento]' class='mrg-right_30' value='' alt='date'/></span><span class='left'><p>Pensão Alimentícia(%):</p><input type='text' name='filho[" + $("#indiceDeFilhos").val() +"][pensao]' value='' alt='decimal'/></span></div></div>").appendTo("#filhos");
			quantidade = parseInt($("#quantidadeDeFilhos").val());
			$("#quantidadeDeFilhos").val(quantidade + 1);
			indice = parseInt($("#indiceDeFilhos").val());
			$("#indiceDeFilhos").val(indice + 1);
		});
		
		
		
		$("#cadastrar1").click(function(){
			nome = $("#nome").val();
			endereco = $("#endereco").val();
			bairro = $("#bairro").val();
			cidade = $("#cidade").val();
			uf = $("#estado").val();
			cep = $("#cep").val();
			fone = $("#fone").val();
			celular = $("#celular").val();
			data_nascimento = $("#data_nascimento").val();
			mun_nascimento = $("#mun_nascimento").val();
			uf_nascimento = $("#uf_nascimento").val();
			pai = $("#pai").val();
			mae = $("#mae").val();
			if($(".estado_civil:checked").val() != 2){
				estado_civil = $(".estado_civil:checked").attr("nome");
			} else {
				estado_civil = $("#estadoCivilOutro").val();
			}
			tipo = $("#tc").val();
			$.get('recursosHumanos/cadastroEmpregado', {nome: nome, endereco: endereco, bairro: bairro, cidade: cidade, uf: uf, cep: cep, fone: fone, celular: celular, data_nascimento: data_nascimento, mun_nascimento: mun_nascimento, uf_nascimento: uf_nascimento, pai: pai, mae: mae, estado_civil: estado_civil, tipo: tipo }, 
		  		function(data, status){
			      	if(status == 'success' && $.trim(data) != 'erro') {
			      		$(".id").val(data);
                  		$("#anexarContratoEstagio").attr("href", $("#anexarContratoEstagio").attr("href") + data + "&tipo=2");	
                  		$("#anexarExameAdmissional").attr("href", $("#anexarExameAdmissional").attr("href") + data + "&tipo=0");
                  		$("#anexarExameDemissional").attr("href", $("#anexarExameDemissional").attr("href") + data + "&tipo=1");
			      		if(tipo == 0){
                  			$("#anexarContratoEstagio").hide();
              			} else{
              				$("#anexarExameAdmissional").hide();
                  			$("#anexarExameDemissional").hide();
              			}
			      		$("#anexarComprovateTransporte").attr("href", $("#anexarComprovateTransporte").attr("href") + data + "&tipo=3");
			      		$("#anexarComprovanteRefeicao").attr("href", $("#anexarComprovanteRefeicao").attr("href") + data + "&tipo=4");
			      		alert("Cadastro do Empregado efetuado com Sucesso. Favor preencher os dados contratuais.");
			      		$("#cadastroEmpregado").fadeOut("slow");
						$.scrollTo(0, 0, {queue:true} );
						$("#dadosContratuais").fadeIn("slow");
				  	}
				  	if($.trim(data) == 'erro'){
	      				alert("Ocorreu um erro durante a gravação do dados. Favor, repetir o processo.");
				  	}
				  }
			);
		});
		
		$("#cadastrar2").click(function(){
			id = $(".id").val();
                        dataAdmissao = $("#dataAdmissao").val();
			grauInstrucao = $("#grauInstrucao").val();
			diasContratoExperiencia = $("#diasContratoExperiencia").val();
			departamento = $("#departamento").val();
			funcao = $("#funcao").val();
			salarioContratual = $("#salarioContratual").val();
			adiantamentoQuinzenal = $("#adiantamentoQuinzenal").val();
			horarioEntrada = $("#horarioEntrada").val();
			horarioSaida = $("#horarioSaida").val();
			horarioIntervalo = $("#horarioIntervalo").val();
			duracaoIntervalo = $("#duracaoIntervalo").val();
			possuivTransporte = $(".possui_vTransporte:checked").val();
			possuivAlimentacao = $(".possui_vAlimentacao:checked").val();
			aux_transporte_tipo = $("#aux_transporte_tipo").val();
			tipoRefeicao = $("#aux_alimentacao_tipo").val();
			transporteTC = $("#transporteTC").val();
			transporteCT = $("#transporteCT").val();
			$.get('recursosHumanos/dadosContratuais', {id: id, dataAdmissao: dataAdmissao, grauInstrucao: grauInstrucao, diasContratoExperiencia: diasContratoExperiencia, departamento: departamento, funcao: funcao, salarioContratual: salarioContratual, adiantamentoQuinzenal: adiantamentoQuinzenal, horarioEntrada: horarioEntrada, horarioSaida: horarioSaida, horarioIntervalo: horarioIntervalo, duracaoIntervalo: duracaoIntervalo, transporteTC: transporteTC, transporteCT: transporteCT, possuivTransporte: possuivTransporte, possuivAlimentacao: possuivAlimentacao, aux_transporte_tipo: aux_transporte_tipo, tipoRefeicao: tipoRefeicao}, 
		  		function(data, status){
		  			alert(data);		  			
			      	if(status == 'success' && $.trim(data) == 'ok') {
			      		alert("Dados Contratuais cadastrados com Sucesso. Favor preencher os dados relativos ao documentos.");
			      		$("#dadosContratuais").fadeOut("slow");
						$.scrollTo(0, 0, {queue:true} );
						$("#documentos").fadeIn("slow");
				  	}
				  	if($.trim(data) == 'erro'){
	      				alert("Ocorreu um erro durante a gravação do dados. Favor, repetir o processo.");
				  	}
				  }
			);
		});
		
		$("#cadastrar3").click(function(){
			id = $(".id").val();
			rg = $("#rg").val();
			orgaoExpedidor = $("#orgaoExpedidor").val();
			dataExpedicao = $("#dataExpedicao").val();
			habilitacao = $("#habilitacao").val();
			categoria = $("#categoria").val();
			vencimentoHabilitacao = $("#vencimentoHabilitacao").val();
			tituloEleitoral = $("#tituloEleitoral").val();
			zonaEleitoral = $("#zonaEleitoral").val();
			secaoEleitoral = $("#secaoEleitoral").val();
			cpf = $("#cpf").val();
			carteiraTrabalho = $("#carteiraTrabalho").val();
			carteiraTrabalhoSerie = $("#carteiraTrabalhoSerie").val();
			ufCarteiraTrabalho = $("#ufCarteiraTrabalho").val();
			pis = $("#pis").val();
			reservista = $("#reservista").val();
			$.get('recursosHumanos/documentos', {id: id, rg: rg, orgaoExpedidor: orgaoExpedidor, dataExpedicao: dataExpedicao, habilitacao: habilitacao, categoria: categoria, vencimentoHabilitacao: vencimentoHabilitacao, tituloEleitoral: tituloEleitoral, zonaEleitoral: zonaEleitoral, secaoEleitoral: secaoEleitoral, cpf: cpf, carteiraTrabalho: carteiraTrabalho, carteiraTrabalhoSerie: carteiraTrabalhoSerie, ufCarteiraTrabalho: ufCarteiraTrabalho, pis: pis, reservista: reservista}, 
		  		function(data, status){
			      	if(status == 'success' && $.trim(data) == 'ok') {
			      		alert("Documentos cadastrados com Sucesso. Favor preencher os dados relativos ao documentos.");
			      		$("#documentos").hide();
						$.scrollTo(0, 0, {queue:true} );
						$("#informacoesComplementares").fadeIn("slow");
				  	}
				  	if($.trim(data) == 'erro'){
	      				alert("Ocorreu um erro durante a gravação do dados. Favor, repetir o processo.");
				  	}
				  }
			);
		});
		
		
		$('#nome').focus();
		$('form').validate( {
			messages: {
				nome: { required: 'Digite um nome' }
			}
		});
                
         $("input").setMask();
	});
</script>
	<div class=" header-content">
    	<h2 class="left">Cadastro de Colaborador</h2>
    </div>
    <br />
    <br />
    <hr class="mrg-bottom_20"/>
	<div id="dashboard-wrap">
		<div class="metabox"></div>
		<div class="clear"></div>
		<div class="box-content">
			<div class="box">
				<div class="table">
					<div class="inside">
                    
						<form name="tipoColaborador" id="tipoColaborador" method="get">
							<img class="mrg-bottom_20" src="img/bc1.png">
							<fieldset>
								<legend>Tipo de Colaborador</legend>
								<center>
									<label>Qual é o tipo do colaborador que você deseja cadastrar?</label> <br />
									<div>
										<input type="button" style="margin-right:5px;" class="button tc" value="Funcionário" tc="0"/>
										<strong style="font-size:15pt;">ou</strong>
										<input type="button" style="margin-left:5px;" class="button tc" value="Estagiário" tc="1"/>
									</div>
								</center>
							</fieldset>
						</form>
						<form name="cadastroEmpregado" id="cadastroEmpregado" method="post">
							<img class="mrg-bottom_20" src="img/bc2.png">
							<input type="hidden" name="tc" id="tc" value="">
							<fieldset name="cadastroEmpregadoFieldset" id="cadastroEmpregadoFieldset">
								<legend>Cadastro do Empregado</legend>
                                    <p>Nome:</p>
                                    <input type="text" name="nome" id="nome" class="width_685" value=""/>
                                    <p>Endereco:</p>
                                    <input type="text" name="endereco" id="endereco" class="width_685" value=""/>
                                    <div>
                                        <span class="left mrg-right_47">
                                            <p>Bairro:</p>
                                            <input type="text" name="bairro" id="bairro" value=""/>
                                        </span>
                                        <span class="left mrg-right_47">
                                            <p>Cidade:</p>
                                            <input type="text" name="cidade" id="cidade" value=""/>
                                        </span>
                                        <span class="left mrg-right_47">
                                            <p>Estado:</p>
                                            <input type="text" name="estado" id="estado" value=""/>
                                        </span>
                                        <span class="left mrg-right_47">
                                            <p>CEP:</p>
                                            <input type="text" name="cep" id="cep" value="" alt="cep"/>
                                        </span>
                                    </div>
                                    <div class="inline-block">
                                        <span class="left mrg-right_47">
                                            <p>Telefone:</p>
                                            <input type="text" name="fone" id="fone" value="" alt="phone" />
                                        </span>
                                        <span class="left mrg-right_47">
                                        	<p>Celular:</p>
                                            <input type="text" name="celular" id="celular" value="" alt="phone" />
                                        </span>
                                    </div>
                                    <div class="inline-block">
                                    	<span class="left mrg-right_47">
                                            <p>Data de Nascimento:</p>
                                            <input type="text" name="data_nascimento" id="data_nascimento" value="" alt="date" />
                                        </span>
                                        <span class="left mrg-right_47">
                                            <p>Município do Nascimento:</p>
                                            <input type="text" name="mun_nascimento" id="mun_nascimento" value="" />
                                        </span>
                                        <span class="left mrg-right_47">
                                            <p>Uf do Nascimento:</p>
                                            <input type="text" name="uf_nascimento" id="uf_nascimento" value="">
                                        </span>
                                    </div>
                                    <p>Nome do Pai:</p>
                                    <input type="text" name="pai" id="pai"  class="width_685" value="">
                                    <p>Nome da Mãe:</p>
                                    <input type="text" name="mae" id="mae"  class="width_685" value="">
                                    
                                    <p class="mrg-bottom_10"><strong>Estado Civil:</strong></p>
                                    
                                    <label><input type="radio" class="estado_civil input-radio" name="estado_civil" value="0" nome="Casado">Casado</label>
                                    <br /><br />
                                    <label><input type="radio" class="estado_civil input-radio" name="estado_civil" value="1" nome="Solteiro">Solteiro</label>
                                    <br /><br />
                                    <label><input type="radio" class="estado_civil input-radio" name="estado_civil" value="2" nome="Outro">Outro</label>
                                    <br /><br />
                                    <input type="text" name="estadoCivilOutro" id="estadoCivilOutro" value="">
								<input id="cadastrar1" type="button" class="button right" value=" Cadastrar " />
							</fieldset>
						</form>
                        
						<form name="dadosContratuais" id="dadosContratuais" method="post">
							<img class="mrg-bottom_20" src="img/bc3.png">
							<input type="hidden" id="id" name="id" value="">
							<fieldset name="dadosContratuaisFieldset" id="dadosContratuaisFieldset">
								<legend>Dados Contratuais</legend>
								<!-- div id="botões" style="margin-bottom:20px">
									<span class="left mrg-right_47">
	                              		<a class="btn_1 fancy" id="anexarContratoEstagio" href='<?php echo BASE . "/formAnexo.php?id=";?>'>Contrato de Estágio</a>
	                              	<span>
	                          		<span class="left mrg-right_47">
	                              		<a class="btn_1 fancy" id="anexarExameAdmissional" href='<?php echo BASE . "/formAnexo.php?id=";?>'>Exame Admissional</a>
	                              	</span>
	                              	<span class="left mrg-right_47">
	                              		<a class="btn_1 fancy" id="anexarExameDemissional" href='<?php echo BASE . "/formAnexo.php?id=";?>'>Exame Demissional</a>
	                             	</span>
	                             </div -->
                             	<br />
                                
                                        <div class="inline-block">
                                        <span class="left mrg-right_47">
                                            <p>Data de admissão:</p>
                                            <input type="text" alt="date" value="" name="dataAdmissao" id="dataAdmissao" >
                                        </span>
                                
                                	<div class="inline-block">
                                        <span class="left mrg-right_47">
                                            <p>Grau de Instrução:</p>
                                            <input type="text" name="grauInstrucao" id="grauInstrucao" value=""/>
                                        </span>
                                            
                                            
                                        <span class="left mrg-right_47">
                                            <p>Dias de Experiência:</p>
                                            <input type="text" name="diasContratoExperiencia" id="diasContratoExperiencia" value=""/>
                                        </span>
                                    </div>
                                    
                                    <div class="inline-block">
                                        <span class="left mrg-right_47">
                                            <p>Departamento:</p>
                                            <input type="text" name="departamento" id="departamento" value=""/>
                                        </span>
                                        <span class="left">
                                            <p>Função:</p>
                                            <input type="text" name="funcao" id="funcao" value=""/>
                                        </span>
                                    </div>
                                            
                                    <div class="inline-block">
                                        <span class="left mrg-right_47">
                                            <p>Salário Contratual:</p>
                                            <input type="text" name="salarioContratual" id="salarioContratual" value="" alt="decimal"/>
                                        </span>
                                        <span class="left mrg-right_47">
                                            <p>Adiantamento Quinzenal</p>
                                            <input type="text" name="adiantamentoQuinzenal" id="adiantamentoQuinzenal" value="" alt="decimal"/>
                                        </span>
                                    </div>
                                            
                                    <p class="mrg-bottom_10"><strong>Horário de Trabalho:</strong></p>
                                    <div class="inline-block">
                                        <span class="left mrg-right_47">
                                            <p>Entrada:</p>
                                            <input type="text" name="horarioEntrada" id="horarioEntrada" value=""/ alt="time">
                                        </span>
                                        <span class="left mrg-right_47">
                                            <p>Intervalo:</p>
                                            <input type="text" name="duracaoIntervalo" id="duracaoIntervalo" value="" alt="time"/> às 
                                            <input type="text" name="horarioIntervalo" id="horarioIntervalo" value="" alt="time"/>
                                        </span>
                                        <span class="left">
                                            <p>Saida:</p>
                                            <input type="text" name="horarioSaida" id="horarioSaida" value="" alt="time"/>
                                        </span>
                                    </div>
                                    <p class="mrg-bottom_10"><strong>Benefícios:</strong></p>
                                    <div class="inline-block">
                                        <span class="left mrg-right_47">
                                    		<p>Possui vale-transporte?</p>
                                        	<label><input type="radio" class="input-radio possui_vTransporte" name="possui_vTransporte" value="1">Sim</label>
                                    		<label><input type="radio" class="input-radio possui_vTransporte" checked="checked" name="possui_vTransporte" value="0">Não</label><br />
                                    		<br />
                                    	</span>	
                                    	<span class="left mrg-right_47 transporteV">
                                    		<p>Tarifa</p>
                                        	<select name="aux_transporte_tipo" id="aux_transporte_tipo" style="width:126px;">
                                        		<?php                         		
                                        		try{
                                        			$tiposTransportes = TipoAuxTransporte::listar();
	                                        		foreach($tiposTransportes as $tiposTransporte){
	                                        			?>
	                                        			<option value="<?php echo $tiposTransporte->getId(); ?>"><?php echo $tiposTransporte->getNome(); ?></option>
	                                        			<?php	
	                                        		}	
                                        		}catch(ListaVazia $e){
                                        			
                                        		}
                                        		?>	                                        		
                                        	</select>
                                        </span>
                                        <span class="left mrg-right_47 transporteV">
                                    	 	<p>casa / trabalho</p>
                                            <input type="text" name="transporteCT" id="transporteCT" value=""/>
                                         	<p>trabalho / casa</p>
                                            <input type="text" name="transporteTC" id="transporteTC" value=""/>
                                      	</span>
                                  	</div>
                                	<hr></hr>
                                	<br />
                                	<div class="inline-block">
                                		<span class="left mrg-right_47">
                                    		<p>Possui vale-refeição?</p>
                                        	<label>
                                        		<input type="radio" class="input-radio possui_vAlimentacao" name="possui_vAlimentacao" value="1">Sim
                                    		</label>
                                    		<label>
                                    			<input type="radio" class="input-radio possui_vAlimentacao" name="possui_vAlimentacao" value="0" checked="checked">Não
                                			</label>
                                    		<br />
                                    		<br />
                                    	</span>
                                    	<span class="left mrg-right_47 refeicaoV">
                                    		<p>Tipo do Vale-Refeição</p>
                                        	<select name="aux_alimentacao_tipo" id="aux_alimentacao_tipo" style="width:126px;">
                                    			<option value="0">Refeição</option>
                                    			<option value="1">Alimentação</option>
                                        	</select>
                                        </span>
                                        <!-- span class="left mrg-right_47 refeicaoV" style="margin-top:20px;">
                                        	<p><a class="btn_1 fancy" id="anexarComprovanteRefeicao" href='<?php echo BASE . "/formAnexo.php?id=";?>'>Anexar Comprovante</a></p>
                                        </span -->
                                	</div>
                                	<hr></hr>
									<input id="cadastrar2" type="button" class="button right" value=" Cadastrar " />
							</fieldset>
						</form>
                        
						<form name="documentos" id="documentos" method="post">
							<img src="img/bc4.png">
							<fieldset name="documentosFieldset" id="documentosFieldset">
								<legend>Documentos</legend>
                                <div>
                                    <span class="left mrg-right_47">
                                        <p>Identidade:</p>
                                        <input type="text" name="rg" id="rg" value=""/>
                                    </span>
                                    <span class="left mrg-right_47">
                                        <p>Órgão Expedidor:</p>
                                        <input type="text" name="orgaoExpedidor" id="orgaoExpedidor" value=""/>
                                    </span>
                                    <span class="left mrg-right_47">
                                        <p>Data de Expedição:</p>
                                        <input type="text" name="dataExpedicao" id="dataExpedicao" value="" alt="date"/>
                                    </span>
                                </div>
                                <div>
                                	<span class="left mrg-right_47">
										<p>Carteira de Habilitação:</p>
	                                    <input type="text" name="habilitacao" id="habilitacao" value=""/>
                                    </span>
                                    <span class="left mrg-right_47">
										<p>Categoria:</p>
										<select name="categoria" id="categoria">
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="D">D</option>
											<option value="E">E</option>
										</select>
									</span>
                                    <span class="left mrg-right_47">
										<p>Vencimento:</p>
	                                    <input type="text" name="vencimentoHabilitacao" id="vencimentoHabilitacao" value="" alt="date"/>
									</span>
                                </div>
                                <div>
                                	<span class="left mrg-right_47">
										<p>Título Eleitoral:</p>
                                    	<input type="text" name="tituloEleitoral" id="tituloEleitoral" value=""/>
									</span>
                                    <span class="left mrg-right_47">
										<p>Zona:</p>
                                    	<input type="text" name="zonaEleitoral" id="zonaEleitoral" value=""/>
									</span>
									<span class="left mrg-right_47">
										<p>Seção:</p>
										<input type="text" name="secaoEleitoral" id="secaoEleitoral" value=""/>
									</span>
                                </div>
                                <div>
                                	<span class="left mrg-right_47">
										<p>Carteira de Trabalho:</p>
										<input type="text" name="carteiraTrabalho" id="carteiraTrabalho" value=""/>
									</span>
									<span class="left mrg-right_47">
										<p>Série:</p>
										<input type="text" name="carteiraTrabalhoSerie" id="carteiraTrabalhoSerie" value=""/>
									</span>
                                    <span class="left mrg-right_47">
										<p>Uf:</p>
                                    	<input type="text" name="ufCarteiraTrabalho" id="ufCarteiraTrabalho" value=""/>
									</span>
                                    <span class="left mrg-right_47">
										<p>PIS:</p>
                                    	<input type="text" name="pis" id="pis" value=""/>
									</span>
                                </div>
                                
                                <div>
                                	<span class="left mrg-right_47">
										<p>CPF:</p>
                                    	<input type="text" name="cpf" id="cpf" value="" alt="cpf"/>
									</span>
                                    <span class="left mrg-right_47">
										<p>Certificado Reservista:</p>
                                    	<input type="text" name="reservista" id="reservista" value=""/>
									</span>
                                </div>

								<input type="button" id="cadastrar3" class="button right" value=" Cadastrar " />
							</fieldset>
						</form>
						<form name="informacoesComplementares" id="informacoesComplementares" action="recursosHumanos/concluirCadastro" method="post">
							<img src="img/bc5.png">
							<fieldset name="infComplementaresFieldset" id="infComplementaresFieldset">
								<legend>Informações Complementares</legend>
                                    <p>Cônjuge:</p>
                                    <input type="hidden" class="id" name="id" value="" />
                                    <input type="hidden" id="quantidadeDeFilhos" value="0"/>
                                    <input type="hidden" id="indiceDeFilhos" value="1"/>
                                    <input type="text" name="conjuge" id="conjuge" class="width_685" value=""/>
                                    <input type="button" class="button-add" id="addFilho" value="+ Adicionar Filhos" style="clear:both"/>
                                    <div id="filhos">
                                    </div>
                                    <p style="margin-top:30px;">Observações:</p>
                                    <textarea  rows="100" cols="116" name="observacoes"></textarea>
								<input type="submit" class="button right" value=" Cadastrar " />
							</fieldset>
						</form>
						<ul id="bts">
							<li>
								<input type="button" style="margin-right:30px;" class="button-back right" value="Voltar" onclick="location.href='voltar'" />
							</li>
						</ul>
					</div><!--fim div inside-->
				</div><!--fim div table-->
				<div class="table-footer"></div>
			</div><!--fim div box-->
		</div><!--fim div box-content-->
	</div><!--fim div dashboard-wrap-->