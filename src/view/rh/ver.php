<script type="text/javascript">
	$(document).ready(function($){

		$(".fancy").fancybox({
			'width'				: '25%',
			'height'			: '40%',
			'autoScale'			: false,
			'scrolling'         : 'no',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'iframe'
		});

		$("#dadosContratuais").hide();
		$("#documentos").hide();
		$("#cadastroEmpregado").hide();
		$("#estadoCivilOutro").hide();
		$("#informacoesComplementares").hide();
		$("#GerenciarAnexos").hide();
		$("#addAdvertencia").hide();
		$("#addFerias").hide();
		$("#addHorasExtras").hide();
		$("#addPagamentos").hide();
		$("#addSalarios").hide();
		$("#gerarDocumentacao").hide();

		if($(".possui_vTransporte:checked").val() == 0){
			$(".transporteV").hide();
		}

		if($(".possui_vAlimentacao:checked").val() == 0){
			$(".refeicaoV").hide();
		}


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

		$("#advertencias").click(function(){
			$("#tipoColaborador").hide();
			$("#dadosContratuais").hide();
			$("#documentos").hide();
			$("#cadastroEmpregado").hide();
			$("#estadoCivilOutro").hide();
			$("#informacoesComplementares").hide();
			$("#addFerias").hide();
			$("#addHorasExtras").hide();
			$("#addPagamentos").hide();
			$("#addSalarios").hide();
			$("#GerenciarAnexos").hide();
			$("#gerarDocumentacao").hide();
			$("#addAdvertencia").fadeIn();
		});

		$("#Anexos").click(function(){
			$("#tipoColaborador").hide();
			$("#dadosContratuais").hide();
			$("#documentos").hide();
			$("#cadastroEmpregado").hide();
			$("#estadoCivilOutro").hide();
			$("#informacoesComplementares").hide();
			$("#addFerias").hide();
			$("#addHorasExtras").hide();
			$("#addPagamentos").hide();
			$("#addSalarios").hide();
			$("#addAdvertencia").hide();
			$("#gerarDocumentacao").hide();
			$("#GerenciarAnexos").fadeIn();
		});

		$("#ferias").click(function(){
			$("#tipoColaborador").hide();
			$("#dadosContratuais").hide();
			$("#documentos").hide();
			$("#cadastroEmpregado").hide();
			$("#estadoCivilOutro").hide();
			$("#informacoesComplementares").hide();
			$("#addAdvertencia").hide();
			$("#addHorasExtras").hide();
			$("#addPagamentos").hide();
			$("#addSalarios").hide();
			$("#GerenciarAnexos").hide();
			$("#gerarDocumentacao").hide();
			$("#addFerias").fadeIn();
		});

		$("#documentacao").click(function(){
			$("#tipoColaborador").hide();
			$("#dadosContratuais").hide();
			$("#documentos").hide();
			$("#cadastroEmpregado").hide();
			$("#estadoCivilOutro").hide();
			$("#informacoesComplementares").hide();
			$("#addAdvertencia").hide();
			$("#addHorasExtras").hide();
			$("#addPagamentos").hide();
			$("#addSalarios").hide();
			$("#GerenciarAnexos").hide();
			$("#addFerias").hide();			
			$("#gerarDocumentacao").fadeIn();
			
			
			
		});

		$("#horasExtras").click(function(){
			$("#tipoColaborador").hide();
			$("#dadosContratuais").hide();
			$("#documentos").hide();
			$("#cadastroEmpregado").hide();
			$("#estadoCivilOutro").hide();
			$("#informacoesComplementares").hide();
			$("#addAdvertencia").hide();
			$("#addFerias").hide();
			$("#addPagamentos").hide();
			$("#addSalarios").hide();
			$("#GerenciarAnexos").hide();
			$("#gerarDocumentacao").hide();
			$("#addHorasExtras").fadeIn();
		});

		$("#pagamentos").click(function(){
			$("#tipoColaborador").hide();
			$("#dadosContratuais").hide();
			$("#documentos").hide();
			$("#cadastroEmpregado").hide();
			$("#estadoCivilOutro").hide();
			$("#informacoesComplementares").hide();
			$("#addAdvertencia").hide();
			$("#addFerias").hide();
			$("#addHorasExtras").hide();
			$("#addSalarios").hide();
			$("#GerenciarAnexos").hide();
			$("#gerarDocumentacao").hide();
			$("#addPagamentos").fadeIn();
		});

		$("#salarios").click(function(){
			$("#tipoColaborador").hide();
			$("#dadosContratuais").hide();
			$("#documentos").hide();
			$("#cadastroEmpregado").hide();
			$("#estadoCivilOutro").hide();
			$("#informacoesComplementares").hide();
			$("#addAdvertencia").hide();
			$("#addFerias").hide();
			$("#addHorasExtras").hide();
			$("#addPagamentos").hide();
			$("#GerenciarAnexos").hide();
			$("#gerarDocumentacao").hide();
			$("#addSalarios").fadeIn();
		});

		//esconde as demais imagens de seleção.
		$("#img1").hide();
		$("#img2d").hide();
		$("#img3d").hide();
		$("#img4d").hide();
		$("#img5d").hide();

		//começa a dinâmica do menu ficticio
		$("#img1d").click(function(){
			$("#addAdvertencia").hide();
			$("#addFerias").hide();
			$("#addHorasExtras").hide();
			$("#addPagamentos").hide();
			$("#addSalarios").hide();
			$("#img1").hide();
			$("#img1d").fadeIn();
			$("#img2d").hide();
			$("#img2").fadeIn();
			$("#img3d").hide();
			$("#img3").fadeIn();
			$("#img4d").hide();
			$("#img4").fadeIn();
			$("#img5d").hide();
			$("#img5").fadeIn();
			$("#tipoColaborador").fadeIn();
			$("#dadosContratuais").hide();
			$("#documentos").hide();
			$("#cadastroEmpregado").hide();
			$("#GerenciarAnexos").hide();
			$("#informacoesComplementares").hide();
			$("#gerarDocumentacao").hide();
		});


		$("#img1").click(function(){
			$("#addAdvertencia").hide();
			$("#addFerias").hide();
			$("#addHorasExtras").hide();
			$("#addPagamentos").hide();
			$("#addSalarios").hide();
			$("#img1").hide();
			$("#img1d").fadeIn();
			$("#img2d").hide();
			$("#img2").fadeIn();
			$("#img3d").hide();
			$("#img3").fadeIn();
			$("#img4d").hide();
			$("#img4").fadeIn();
			$("#img5d").hide();
			$("#img5").fadeIn();
			$("#tipoColaborador").fadeIn();
			$("#dadosContratuais").hide();
			$("#documentos").hide();
			$("#cadastroEmpregado").hide();
			$("#GerenciarAnexos").hide();
			$("#informacoesComplementares").hide();
			$("#gerarDocumentacao").hide();
		});

		$("#img2").click(function(){
			$("#addAdvertencia").hide();
			$("#addFerias").hide();
			$("#addHorasExtras").hide();
			$("#addPagamentos").hide();
			$("#addSalarios").hide();
			$("#img1d").hide();
			$("#img1").fadeIn();
			$("#img2").hide();
			$("#img2d").fadeIn();
			$("#img3d").hide();
			$("#img3").fadeIn();
			$("#img4d").hide();
			$("#img4").fadeIn();
			$("#img5d").hide();
			$("#img5").fadeIn();
			$("#tipoColaborador").hide();
			$("#dadosContratuais").hide();
			$("#documentos").hide();
			$("#cadastroEmpregado").fadeIn();
			$("#GerenciarAnexos").hide();
			$("#informacoesComplementares").hide();
			$("#gerarDocumentacao").hide();
		});

		$("#img3").click(function(){
			$("#addAdvertencia").hide();
			$("#addFerias").hide();
			$("#addHorasExtras").hide();
			$("#addPagamentos").hide();
			$("#addSalarios").hide();
			$("#GerenciarAnexos").hide();
			$("#img1d").hide();
			$("#img1").fadeIn();
			$("#img2d").hide();
			$("#img2").fadeIn();
			$("#img3").hide();
			$("#img3d").fadeIn();
			$("#img4d").hide();
			$("#img4").fadeIn();
			$("#img5d").hide();
			$("#img5").fadeIn();
			$("#tipoColaborador").hide();
			$("#dadosContratuais").fadeIn();
			$("#documentos").hide();
			$("#cadastroEmpregado").hide();
			$("#informacoesComplementares").hide();
			$("#gerarDocumentacao").hide();
		});

		$("#img4").click(function(){
			$("#addAdvertencia").hide();
			$("#addFerias").hide();
			$("#addHorasExtras").hide();
			$("#addPagamentos").hide();
			$("#addSalarios").hide();
			$("#GerenciarAnexos").hide();
			$("#img1d").hide();
			$("#img1").fadeIn();
			$("#img2d").hide();
			$("#img2").fadeIn();
			$("#img3d").hide();
			$("#img3").fadeIn();
			$("#img4").hide();
			$("#img4d").fadeIn();
			$("#img5d").hide();
			$("#img5").fadeIn();
			$("#tipoColaborador").hide();
			$("#dadosContratuais").hide();
			$("#documentos").fadeIn();
			$("#cadastroEmpregado").hide();
			$("#informacoesComplementares").hide();
			$("#gerarDocumentacao").hide();
		});

		$("#img5").click(function(){
			$("#addAdvertencia").hide();
			$("#addFerias").hide();
			$("#addHorasExtras").hide();
			$("#addPagamentos").hide();
			$("#addSalarios").hide();
			$("#GerenciarAnexos").hide();
			$("#img1d").hide();
			$("#img1").fadeIn();
			$("#img2d").hide();
			$("#img2").fadeIn();
			$("#img3d").hide();
			$("#img3").fadeIn();
			$("#img4d").hide();
			$("#img4").fadeIn();
			$("#img5").hide();
			$("#img5d").fadeIn();
			$("#tipoColaborador").hide();
			$("#dadosContratuais").hide();
			$("#documentos").hide();
			$("#cadastroEmpregado").hide();
			$("#informacoesComplementares").fadeIn();
			$("#gerarDocumentacao").hide();
		});
		//começa a dinâmica do menu ficticio

		$(".editar1").hide();
		$(".editar2").hide();
		$(".editar3").hide();
		$(".editar4").hide();

		$("#editar1").click(function(){
			$(".visualizar1").hide();
			$(".editar1").fadeIn();
		});

		$("#editar2").click(function(){
			$(".visualizar2").hide();
			$(".editar2").fadeIn();
		});

		$("#editar3").click(function(){
			$(".visualizar3").hide();
			$(".editar3").fadeIn();
		});

		$("#editar4").click(function(){
			$(".visualizar4").hide();
			$(".editar4").fadeIn();
		});

		$(".button-delete").live('click', function(){
			$(this).parent().fadeOut("slow").delay(1000).queue(function() { $(this).remove(); });
			quantidade = parseInt($("#quantidadeDeFilhos").val());
			$("#quantidadeDeFilhos").val(quantidade - 1);
			if((quantidade - 1) == 0){
				$("#indiceDeFilhos").val(0);
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
			$("<div class='mrg-top_20'><hr class='mrg-bottom_10' /><input type='button' class='button-delete right' style='margin-bottom:-6px' value='x' /><div class='inline-block'><p>Nome:</p><input type='text' name='filho[" + $("#indiceDeFilhos").val() +"][nome]' class='width_685' value=''/></div><div class='inline-block'><span class='left'><p>Data de Nascimento:</p><input type='text' name='filho[" + $("#indiceDeFilhos").val() +"][nascimento]' class='mrg-right_30' value='' alt='date'/></span><span class='left'><p>Pensão Alimentícia:</p><input type='text' name='filho[" + $("#indiceDeFilhos").val() +"][pensao]' value='' alt='decimal'/></span></div></div>").appendTo("#filhos");
			quantidade = parseInt($("#quantidadeDeFilhos").val());
			$("#quantidadeDeFilhos").val(quantidade + 1);
			indice = parseInt($("#indiceDeFilhos").val());
			$("#indiceDeFilhos").val(indice + 1);
		});



		$("#cadastrar1").click(function(){
			id = $("#id").val();
			$(".id").val(id);
			nome = $("#nome").val();
			endereco = $("#endereco").val();
			bairro = $("#bairro").val();
			cidade = $("#cidade").val();
			uf = $("#estado").val();
			cep = $("#cep").val();
			telefone1 = $("#telefone_1").val();
			telefone2 = $("#telefone_2").val();
			dataNascimento = $("#dataNascimento").val();
			municipioNascimento = $("#municipioNascimento").val();
			ufNascimento = $("#ufNascimento").val();
			pai = $("#pai").val();
			mae = $("#mae").val();
			if($(".estadoCivil:checked").val() != 2){
				estadoCivil = $(".estadoCivil:checked").attr("nome");
			} else {
				estadoCivil = $("#estadoCivilOutro").val();
			}
			tipo = $("#tc").val();
			status = $("#status").val();
			$.get('recursosHumanos/cadastroEmpregadoEdicao', {id: id, nome: nome, endereco: endereco, bairro: bairro, cidade: cidade, uf: uf, cep: cep, telefone1: telefone1, telefone2: telefone2, dataNascimento: dataNascimento, municipioNascimento: municipioNascimento, ufNascimento: ufNascimento, pai: pai, mae: mae, estadoCivil: estadoCivil, tipo: tipo, status: status },
		  		function(data, status){
			      	if(status == 'success' && $.trim(data) == 'ok') {
			      		alert("Cadastro do Empregado editado com Sucesso.");
						$.scrollTo(0, 0, {queue:true} );
						location.reload();
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
			      		alert("Dados Contratuais editados com Sucesso.");
			      		//$("#dadosContratuais").fadeOut("slow");
						//$.scrollTo(0, 0, {queue:true} );
						//$("#documentos").fadeIn("slow");
				  	}
				  	if($.trim(data) == 'erro'){
	      				alert("Ocorreu um erro durante a gravação do dados. Favor, repetir o processo.");
				  	}
				  }
			);
		});

		$("#cadastrar3").click(function(){
			id = $("#id").val();
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
			      		alert("Documentos editados com Sucesso.");
						$.scrollTo(0, 0, {queue:true} );
						location.reload();
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

		//Código do Portlet
		//$(".column").sortable({connectWith: '.column'});

		$(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
			.find(".portlet-header")
				.addClass("ui-widget-header ui-corner-all")
				.prepend('<span class="ui-icon ui-icon-minusthick"></span>')
				.end()
			.find(".portlet-content");

		$(".portlet-header .ui-icon").click(function() {
			$(this).toggleClass("ui-icon-minusthick").toggleClass("ui-icon-plusthick");
			$(this).parents(".portlet:first").find(".portlet-content").toggle();
		});

		$(".column").disableSelection();





	



$("input").setMask();
	});
</script>
<style type="text/css">
    .column { width: 300px; float: left; padding-bottom: 100px; }
    .big { width: 350px; float: left; padding-bottom: 100px; }
    .portlet { margin: 0 2em 2em 0; }
    .portlet-header { margin: 0.3em; padding-bottom: 4px; padding-left: 0.2em; }
    .portlet-header .ui-icon { float: right; }
    .portlet-content { padding: 0.4em; }
    .ui-sortable-placeholder { border: 1px dotted black; visibility: visible !important; height: 50px !important; }
    .ui-sortable-placeholder * { visibility: hidden; }
</style>

<?php
$colaborador = $this->getDados('VIEW');
?>
<div class=" header-content">
    <h2 class="left">Ver Colaborador</h2>
    <div class="inline-block" style="margin-top:10px;float:right;">
        <input type="button" class="btn_1" style="margin-right:5px;" id="advertencias" value="Advertências" />
        <input type="button" class="btn_1" style="margin-right:5px;" id="ferias" value="Férias" />
        <input type="button" class="btn_1" style="margin-right:5px;" id="horasExtras" value="Horas Extras" />
        <input type="button" class="btn_1" style="margin-right:5px;" id="pagamentos" value="Pagamentos" />
        <input type="button" class="btn_1" style="margin-right:5px;" id="salarios" value="Salários" />
		<input type="button" class="btn_1" style="margin-right:5px;" id="Anexos" value="Anexos" />
		<input type="button" class="btn_1" style="margin-right:5px;" id="documentacao" value="Documentação" />
		
    </div>
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
                    <div class="inline-block" style="width:110%;margin-bottom:10px">
                        <span id="img1d"><img src="img/bc1-AZUL.png" style="float:left;"></span>
                        <span id="img1"><img src="img/bc1-AZULZINHO.png" style="float:left;"></span>
                        <span id="img2d"><img src="img/bc2-AZUL.png" style="float:left;"></span>
                        <span id="img2"><img src="img/bc2-AZULZINHO.png" style="float:left;"></span>
                        <span id="img3d"><img src="img/bc3-AZUL.png" style="float:left;"></span>
                        <span id="img3"><img src="img/bc3-AZULZINHO.png" style="float:left;"></span>
                        <span id="img4d"><img src="img/bc4-AZUL.png" style="float:left;"></span>
                        <span id="img4"><img src="img/bc4-AZULZINHO.png" style="float:left;"></span>
                        <span id="img5d"><img src="img/bc5-AZUL.png" style="float:left;"></span>
                        <span id="img5"><img src="img/bc5-AZULZINHO.png" style="float:left;"></span>
                    </div>

                    <form name="tipoColaborador" id="tipoColaborador" method="get">
                        <fieldset>
                            <legend>Resumo</legend>
                            <p style="margin-bottom:20px;font-size:14pt;">Nome:<strong> <?php echo $colaborador->getNome(); ?></strong></p>
                            <div id="portlets">
                                <div class="column big">
                                    <div class="portlet">
                                        <div class="portlet-header">Advertências</div>
                                        <div class="portlet-content">
                                            <?php
                                            try {
                                                $advertencias = Advertencia::listar($colaborador->getId());
                                                foreach ($advertencias as $advertencia) {
                                            ?>
                                                    <span class="tooltip" title="<?php echo $advertencia->getDescricao(); ?>">
                                                        <p style="margin-bottom:5px;" title="<?php echo $advertencia->getDescricao(); ?>">
                                                    <?php echo formataData(substr($advertencia->getData(), 0, 10)); ?> &nbsp;&nbsp; <?php echo substr($advertencia->getDescricao(), 0, 22); ?> &nbsp;&nbsp; <?php
                                                    if ($advertencia->getAnexo() != "") {
                                                        echo "<a><img style='float:right;' src='img/attachment-icon.png' /></a>";
                                                    }
                                                    ?>
                                                </p>
                                            </span>
                                            <?php
                                                }
                                            } catch (ListaVazia $e) {
                                            ?>
                                                <p>Esse Colaborador não possui nenhuma advertência</p>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="portlet">
                                        <div class="portlet-header">Pagamentos</div>
                                        <div class="portlet-content">
                                            <?php
                                            try {
                                                $pagamentos = Pagamento::listar($colaborador->getId());
                                                foreach ($pagamentos as $pagamento) {
                                            ?>
                                                    <span class="tooltip" title="<?php echo $pagamento->getDescricao(); ?>">
                                                        <p style="margin-bottom:5px;">
                                                    <?php echo formataData($pagamento->getData()); ?> &nbsp;&nbsp;<?php echo "R$ " . $pagamento->getValor(); ?>&nbsp;&nbsp; <span style="float:right;"><?php echo substr($pagamento->getTipo()->getNome(), 0, 12); ?></span>
                                                </p>
                                            </span>
                                            <?php
                                                }
                                            } catch (ListaVazia $e) {
                                            ?>
                                                <p>Esse Colaborador não possui registro de pagamentos no sistema. </p>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="portlet">
                                        <div class="portlet-header">Horas Extras</div>
                                        <div class="portlet-content">
                                            <?php
                                            try {
                                                $horaExtras = HoraExtra::listar($colaborador->getId());
                                                foreach ($horaExtras as $horaExtra) {
                                            ?>
                                            <span class="tooltip" title="<?php echo $horaExtra->getId(); ?>">
                                                        <p style="margin-bottom:5px;">
                                                    <?php echo formataData($horaExtra->getData()); ?> &nbsp;&nbsp;<?php echo $horaExtra->getPendentes() . " Horas"; ?>&nbsp;&nbsp;&nbsp;<?php echo $horaExtra->getTipoHoraExtra()->getValor()*100 . "%";?>
                                                </p>
                                            </span>
                                            <?php
                                                }
                                            } catch (ListaVazia $e) {
                                            ?>
                                                <p>Esse Colaborador não possui registro de horas extras no sistema. </p>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="portlet">
                                        <div class="portlet-header">Salários</div>
                                        <div class="portlet-content">
                                            <?php
                                            try {
                                                $salarios = Salario::listar($colaborador->getId());
                                                foreach ($salarios as $salario) {
                                            ?>
                                                    <span class="tooltip" title="<?php echo $salario->getValor(); ?>">
                                                        <p style="margin-bottom:5px;">
                                                    <?php echo formataData($salario->getData()); ?> &nbsp;&nbsp;<?php echo "R$ " . $salario->getValor(); ?>
                                                </p>
                                            </span>
                                            <?php
                                                }
                                            } catch (ListaVazia $e) {
                                            ?>
                                                <p>Esse Colaborador não possui registro de horas extras no sistema. </p>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="portlet">
                                        <div class="portlet-header">Férias</div>
                                        <div class="portlet-content">
                                            <?php
                                            try {
                                                $ferias = Ferias::listar($colaborador->getId());
                                                foreach ($ferias as $feria) {
                                            ?>
                                                    <span class="tooltip" title="Férias a vencer">
                                                        <p style="margin-bottom:5px;">
                                                    <?php echo "Inicio: ". formataData($feria->getData()); ?> &nbsp;&nbsp;<?php echo "Termino: " . formataData($feria->getDuracao()); ?>
                                                </p>
                                            </span>
                                            <?php
                                                }
                                            } catch (ListaVazia $e) {
                                            ?>
                                                <p>Esse Colaborador não possui registro de férias no sistema. </p>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </fieldset>
                    </form>

                    <form enctype="multipart/form-data" name="addAdvertencia" id="addAdvertencia" method="post" action="recursosHumanos/advertencia">
                        <fieldset>
                            <legend>Advertência</legend>
                            <p><strong>Anexo</strong></p>
                            <input type="hidden" name="id" value="<?php echo $colaborador->getId(); ?>">
                            <input type="hidden" name="nomeArquivo" value="<?php echo "Advertencia_" . $colaborador->getId() . "_" . date("dmYHms"); ?>">
                            <input type="file" id="arquivo" name="arquivo" value="">
                            <p><strong>Descrição</strong></p>
                            <textarea name="descricao" id="descricao" rows="100" cols="116"></textarea>
                            <input type="submit" class="button right" value=" Cadastrar " />
                        </fieldset>
                    </form>
					<div id="GerenciarAnexos">
						<form enctype="multipart/form-data" name="GerenciarAnexos" method="post" action="upload2.php">
							<fieldset>
								<legend>Anexar Documentos</legend>
								<input type="hidden" name="id" value="<?php echo $colaborador->getId(); ?>">
								<input type="hidden" name="nomeArquivo" value="<?php echo "Anexo_" . $colaborador->getId() . "_" . date("dmYHms"); ?>">
								<p><strong>Data</strong></p>
								<input name="data" id="data" value="" alt="date" />
								<div style="text-align:left;">
									<p><strong>Tipo do Anexo</strong></p>
									<select name="tipo" id="tipo">
										<?php
											if($colaborador->getTipo() == 0){
												?>
												<option id="contratoTrabalho" value="5">Contrato de trabalho</option>
												<option id="comprovanteCTPS" value="6">Comprovante de Entrega de CTPS</option>
												<option id="exameAdmissional" value="0">Exame Admissional</option>
												<option id="exameDemissional" value="1">Exame Demissional</option>
												<?php
											} else {
												?>
												<option id="contratoEstagio"  value="2">Contrato de Estagio</option>
												<?php
											}
										?>
										<option id="valeTransporte"  value="3">Vale Transporte</option>
										<option id="valeAlimentacao" value="4">Vale Alimenta&ccedil;&atilde;o</option>
									</select>
								</div>
								<input type="file" id="arquivo" name="arquivo" value="">
								<input type="submit" class="button right" value=" Cadastrar " />
							</fieldset>
						</form>
						<fieldset>
								<legend>Documentos Anexados</legend>
							<?php
								try{
									$documentos = $colaborador->obterDocumentos($colaborador->getId());
									?>
									<table style="width:100%;">
										<thead>
											<tr  class="tr-header">
												<th>Tipo do Anexo</th>
												<th>Data</th>
												<th>Download</th>
											</tr>
										</thead>
										<tbody>
										<?php
										foreach($documentos as $documento){
											?>
											<tr>
												<td>
													<?php echo $documento["tipo"]; ?>
												</td>
												<td>
													<?php echo formataData($documento["data"]); ?>
												</td>
												<td>
													<a href="<?php echo BASE . '/download.php?caminho=anexos/&file=' . $documento["arquivo"]; ?>"> Baixar </a>
												</td>
											</tr>
										<?php
										}
										?>
										</tbody>
									</table>
									<?php
								}catch(ListaVazia $e){
									echo "Nenhum Anexo Encontrado";
								}
							?>
						</fieldset>
					</div>
                    <form name="addFerias" id="addFerias" method="post" action="recursosHumanos/addFerias">
                        <fieldset>
                            <legend>Férias</legend>
                            <p><strong>Data Início</strong></p>
                            <input type="text" name="data" alt="date" value=""  />
                            <input type="hidden" name="id" value="<?php echo $colaborador->getId(); ?>">
                            <p><strong>Data Término</strong></p>
                            <input type="text" name="duracao" value="" alt="date"/>
                            <input type="submit" class="button right" value=" Cadastrar " />
                        </fieldset>
                    </form>
                    
                    <div name="gerarDocumentacao" id="gerarDocumentacao">
                    	
                    	<fieldset>
                    		<legend>Gerar Documentação</legend>
                    		
                    		<form method="post" action="recursosHumanos/gerarAcorodIndividualCompensacaoJornada">
                    			<input type='hidden' name='idColaborador' id='idColaborador' value="<?php echo $colaborador->getId(); ?>">                    		
                    			<input id="acoIndComJornada" class="btn_1" type="submit" value="ACORDO INDIVIDUAL DE COMPENSAÇÃO DE JORNADA" style="margin-right:5px;"><br />
                    		</form>
                    		<form method="post" action="recursosHumanos/gerarConsecaoValeRefeicao">
                    			<input type='hidden' name='idColaborador' id='idColaborador' value="<?php echo $colaborador->getId(); ?>">
                    			<input id="documentacao" class="btn_1" type="submit" value="CONCESSÃO DE VALE REFEIÇÃO" style="margin-right:5px;"><br />
                    		</form>
                    		<form method="post" action="recursosHumanos/gerarContratoExperiencia">
                    			<input type='hidden' name='idColaborador' id='idColaborador' value="<?php echo $colaborador->getId(); ?>">
                    			<input id="documentacao" class="btn_1" type="submit" value="CONTRATO DE EXPERÊNCIA" style="margin-right:5px;"><br />
                    		</form>
                    		<form method="post" action="recursosHumanos/gerarReciboEntregaCarteiraProfissionalAnotacoes">
                    			<input type='hidden' name='idColaborador' id='idColaborador' value="<?php echo $colaborador->getId(); ?>">
                    			<input id="documentacao" class="btn_1" type="submit" value="RECIBO DE ENTREGA DA CARTEIRA PROFISSIONAL PARA ANOTAÇÕES" style="margin-right:5px;"><br />
                    		</form>
                    		<form method="post" action="recursosHumanos/gerarValeTransportePedidoConcessao">
                    			<input type='hidden' name='idColaborador' id='idColaborador' value="<?php echo $colaborador->getId(); ?>">
                    			<input id="documentacao" class="btn_1" type="submit" value="VALE TRANSPORTE PEDIDO DE CONCESSÃO" style="margin-right:5px;"><br />
                    		</form>
                    		<form method="post" action="recursosHumanos/gerarValeTransporteDeclaracaoDeNaoBeneficiario">
                    			<input type='hidden' name='idColaborador' id='idColaborador' value="<?php echo $colaborador->getId(); ?>">
                    			<input id="documentacao" class="btn_1" type="submit" value="VALE TRANSPORTE DECLARAÇÃO DE NÃO BENEFICIÁRIO" style="margin-right:5px;"><br />
                    		</form>
                    	</fieldset>
                    </div>
                    
                    <form name="addHorasExtras" id="addHorasExtras" method="post" action="recursosHumanos/addHorasExtras">
                        <fieldset>
                            <legend>Horas Extras</legend>
                            <input type="hidden" name="id" value="<?php echo $colaborador->getId(); ?>">
                            <p><strong>Data</strong></p>
                            <input type="text" value="" name="data" alt="date" />
                            <p><strong>Quantidade de horas trabalhadas</strong></p>
                            <input type="text" value="" name="pendentes" alt="number" />
                            <p><strong>Tipo de Hora Extra</strong></p>
                            <select name="tipoHoraExtra">
                                <?php
                                    try{
                                        $tiposHorasExtras = TipoHoraExtra::listar();
                                        foreach($tiposHorasExtras as $tipoHoraExtra){
                                            ?>
                                            <option value="<?php echo $tipoHoraExtra->getId(); ?>"><?php echo 100*$tipoHoraExtra->getValor() . "%"; ?></option>
                                            <?php
                                        }
                                    }catch(ListaVazia $e){}
                                ?>
                            </select>
                            <input type="submit" class="button right" value=" Cadastrar " />
                        </fieldset>
                    </form>
                    <form enctype="multipart/form-data" name="addPagamentos" id="addPagamentos" method="post" action="recursosHumanos/addPagamentos">
                        <fieldset>
                            <legend>Pagamentos</legend>
                            <p><strong>Tipo</strong></p>
                            <select name="tipo">
                                <?php
                                            try {
                                                $tipoPagamentos = TipoPagamento::listar();
                                                foreach ($tipoPagamentos as $tipoPagamento) {
                                ?>
                                                    <option id="<?php echo $tipoPagamento->getId(); ?>" value="<?php echo $tipoPagamento->getId(); ?>"><?php echo $tipoPagamento->getNome(); ?></option>
                                <?php
                                                }
                                            } catch (ListaVazia $e) {
                                ?>
                                                <option value="0">Nenhum cadastrado.</option>
                                <?php
                                            }
                                ?>
                                        </select>
                                        <input type="hidden" name="id" value="<?php echo $colaborador->getId(); ?>">
                                        <p><strong>Data</strong></p>
                                        <input type="text" value="" name="data" alt="date"/>
                                        <p><strong>Anexo</strong></p>
                                        <input type="hidden" name="nomeArquivo" value="<?php echo "Pagamento_" . $colaborador->getId() . "_" . date("dmYHms"); ?>">
                                        <input type="file" id="arquivo" name="arquivo" value="">
                                        <p><strong>Valor</strong></p>
                                        <input type="text" name="valor" alt="decimal" value="" >
                                        <p><strong>Descrição</strong></p>
                                        <textarea name="descricao" id="descricao" rows="100" cols="116"></textarea>
                                        <input type="submit" class="button right" value=" Cadastrar " />
                                    </fieldset>
                                </form>
                                <form name="addSalarios" id="addSalarios" method="post" action="recursosHumanos/addSalarios">
                                    <fieldset>
                                        <legend>Salários</legend>
                                        <input type="hidden" name="id" value="<?php echo $colaborador->getId(); ?>">
                                        <p><strong>Data</strong></p>
                                        <input type="text" value="" name="data" alt="date">
                                        <p><strong>Valor</strong></p>
                                        <input type="text" value="" name="valor" alt="decimal">
                                        <input type="submit" class="button right" value=" Cadastrar " />
                                    </fieldset>
                                </form>
                                <form name="cadastroEmpregado" id="cadastroEmpregado" method="post">
                                    <input type="hidden" name="tc" id="tc" value="<?php echo $colaborador->getTipo(); ?>">
                                    <fieldset name="cadastroEmpregadoFieldset" id="cadastroEmpregadoFieldset">
                                        <legend>Cadastro do Empregado</legend>
                            <?php
                                            if (Acao::checarPermissao(2, CursoControll::MODULO)) {
                            ?>
                                                <span><img title="editar" src="img/btn-editar.png" id="editar1" style="float:right;cursor:pointer;" /></span>
                            <?php
                                            }
                            ?>
                                            <input type="hidden" id="id" value="<?php echo $colaborador->getId(); ?>">
                                            <p><strong>Nome:</strong></p>
                                            <p class="visualizar1"><?php echo $colaborador->getNome(); ?></p>
                                            <input type="text" name="nome" id="nome" class="width_685 editar1" value="<?php echo $colaborador->getNome(); ?>"/>
                                            <br />
                                            <p><strong>Endereco:</strong></p>
                                            <p class="visualizar1"><?php echo $colaborador->getEndereco(); ?></p>
                                            <input type="text" name="endereco" id="endereco" class="width_685 editar1" value="<?php echo $colaborador->getEndereco(); ?>"/>
                                            <br />
                                            <div>
                                                <span class="left mrg-right_47">
                                                    <p><strong>Bairro:</strong></p>
                                                    <p class="visualizar1"><?php echo $colaborador->getBairro(); ?></p>
                                                    <input type="text" name="bairro" class="editar1" id="bairro" value="<?php echo $colaborador->getBairro(); ?>"/>
                                                </span>
                                                <span class="left mrg-right_47">
                                                    <p><strong>Cidade:</strong></p>
                                                    <p class="visualizar1"><?php echo $colaborador->getCidade(); ?></p>
                                                    <input type="text" name="cidade" id="cidade" class="editar1" value="<?php echo $colaborador->getCidade(); ?>"/>
                                                </span>
                                                <span class="left mrg-right_47">
                                                    <p><strong>Estado:</strong></p>
                                                    <p class="visualizar1"><?php echo $colaborador->getUf(); ?></p>
                                                    <input type="text" name="estado" id="estado"  class="editar1" value="<?php echo $colaborador->getUf(); ?>"/>
                                                </span>
                                                <span class="left mrg-right_47">
                                                    <p><strong>CEP:</strong></p>
                                                    <p class="visualizar1"><?php echo $colaborador->getCep(); ?></p>
                                                    <input type="text" name="cep" class="editar1" id="cep" value="<?php echo $colaborador->getCep(); ?>" alt="cep"/>
                                                </span>
                                            </div>
                                            <div class="inline-block">
                                                <span class="left mrg-right_47">
                                                    <p><strong>Telefone:</strong></p>
                                                    <p class="visualizar1"><?php echo $colaborador->getFone(); ?></p>
                                                    <input type="text" name="telefone_1" id="telefone_1" class="editar1" value="<?php echo $colaborador->getFone(); ?>" alt="phone" />
                                                </span>
                                                <span class="left mrg-right_47">
                                                    <p><strong>Celular:</strong></p>
                                                    <p class="visualizar1"><?php echo $colaborador->getCelular(); ?></p>
                                                    <input type="text" name="telefone_2" id="telefone_2" class=" editar1" value="<?php echo $colaborador->getCelular(); ?>" alt="phone" />
                                                </span>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="inline-block">
                                                <span class="left mrg-right_47">
                                                    <p><strong>Data de Nascimento:</strong></p>
                                                    <p class="visualizar1"><?php echo formataData($colaborador->getDataNascimento()); ?></p>
                                                    <input type="text" name="dataNascimento" id="dataNascimento" class="editar1" value="<?php echo formataData($colaborador->getDataNascimento()); ?>" alt="date" />
                                                </span>
                                                <span class="left mrg-right_47">
                                                    <p><strong>Município do Nascimento:</strong></p>
                                                    <p class="visualizar1"><?php echo $colaborador->getMunicipioNascimento(); ?></p>
                                                    <input type="text" name="municipioNascimento" class="editar1" id="municipioNascimento" value="<?php echo $colaborador->getMunicipioNascimento(); ?>" />
                                                </span>
                                                <span class="left mrg-right_47">
                                                    <p><strong>Uf do Nascimento:</strong></p>
                                                    <p class="visualizar1"><?php echo $colaborador->getUfNascimento(); ?></p>
                                                    <input type="text" name="ufNascimento" class="editar1" id="ufNascimento" value="<?php echo $colaborador->getUfNascimento(); ?>">
                                                </span>
                                            </div>
                                            <br />
                                            <br />
                                            <p><strong>Nome do Pai:</strong></p>
                                            <p class="visualizar1"><?php echo $colaborador->getNomePai(); ?></p>
                                            <input type="text" name="pai" id="pai"  class="width_685 editar1" value="<?php echo $colaborador->getNomePai(); ?>">
                                            <br />
                                            <p><strong>Nome da Mãe:</strong></p>
                                            <p class="visualizar1"><?php echo $colaborador->getNomeMae(); ?></p>
                                            <input type="text" name="mae" id="mae"  class="width_685 editar1" value="<?php echo $colaborador->getNomeMae(); ?>">
                                            <br />
                                            <p class="visualizar1"><strong>Tipo</strong></p>
                                            <p class="visualizar1"><?php
                                            if ($colaborador->getTipo() == 0) {
                                                echo "Funcionário";
                                            } else {
                                                echo "Estagiário";
                                            } ?></p>
											<input type="hidden" name="tc" id="tc" value="<?php echo $colaborador->getTipo(); ?>" />
											<br class="visualizar1" />
											<p><strong>Status</strong></p>
											<p class="visualizar1">
											<?php
                                            if ($colaborador->getStatus() == 0) {
                                                echo "Inativo";
                                            } else {
                                                echo "Ativo";
                                            }
											?>
											</p>
											<select class="editar1" name="status" id="status">
												<option value="1" <?php echo (($colaborador->getStatus() == 1) ? "selected='selected'": ""); ?>>Ativo</option>
												<option value="0" <?php echo (($colaborador->getStatus() == 0) ? "selected='selected'": ""); ?>>Inativo</option>
											</select>
											<br />
                                    <p><strong>Estado Civil:</strong></p>
                                    <p class="visualizar1"><?php echo $colaborador->getEstadoCivil(); ?></p>
                                    <label class="editar1"><input type="radio" <?php
                                            if ($colaborador->getEstadoCivil() == 0) {
                                                echo "checked='checked'";
                                            } ?> class="estadoCivil input-radio editar1" name="estadoCivil" value="0" nome="Casado">Casado</label>
                            <br /><br />
                            <label class="editar1"><input type="radio" <?php
                                                          if ($colaborador->getEstadoCivil() == 1) {
                                                              echo "checked='checked'";
                                                          }
                            ?> class="estadoCivil input-radio editar1" name="estadoCivil" value="1" nome="Solteiro">Solteiro</label>
                            <br /><br />
                            <label class="editar1"><input type="radio" <?php
                                                          if ($colaborador->getEstadoCivil() != 0 AND $colaborador->getEstadoCivil() != 1) {
                                                              echo "checked='checked'";
                                                          }
                            ?> class="estadoCivil input-radio editar1" name="estadoCivil" value="2" nome="Outro">Outro</label>
                            &nbsp;&nbsp;
                            <input type="text" name="estadoCivilOutro" id="estadoCivilOutro" value="<?php
                                                          if ($colaborador->getEstadoCivil() != 0 AND $colaborador->getEstadoCivil() != 1) {
                                                              echo $colaborador->getEstadoCivil();
                                                          }
                            ?>">

                                                   <input id="cadastrar1" type="button" class="button right editar1" value=" Editar " />
                                               </fieldset>
                                           </form>

                                           <form name="dadosContratuais" id="dadosContratuais" method="post">
                                               <input type="hidden" id="id" name="id" value="">
                                               <fieldset name="dadosContratuaisFieldset" id="dadosContratuaisFieldset">
                                                   <legend>Dados Contratuais</legend>
                            <?php
                                                          if (Acao::checarPermissao(2, CursoControll::MODULO)) {
                            ?>
                                                              <span><img title="editar" src="img/btn-editar.png" id="editar2" style="float:right;cursor:pointer;" /></span>
                            <?php
                                                          }
                            ?>
                                                      <br />
                                                      <br />
                                                      <div class="inline-block">
                                                          
                                                          <span class="left mrg-right_47">
                                                              <p><strong>Data de admissão:</strong></p>
                                                              <p class="visualizar2"><?php echo formataData($colaborador->getDataAdmissao()); ?></p>
                                                              <input alt="date" type="text" name="dataAdmissao" class="editar2" id="dataAdmissao" value="<?php echo formataData($colaborador->getDataAdmissao()); ?>"/>
                                                          </span>                                                          
                                                          
                                                          <span class="left mrg-right_47">
                                                              <p><strong>Grau de Instrução:</strong></p>
                                                              <p class="visualizar2"><?php echo $colaborador->getGrauInstrucao(); ?></p>
                                                              <input type="text" name="grauInstrucao" class="editar2" id="grauInstrucao" value="<?php echo $colaborador->getGrauInstrucao(); ?>"/>
                                                          </span>
                                                          
                                                          <span class="left mrg-right_47">
                                                              <p><strong>Dias de Experiência:</strong></p>
                                                              <p class="visualizar2"><?php echo $colaborador->getDiaContratoExperiencia(); ?></p>
                                                              <input type="text" name="diasContratoExperiencia" class="editar2" id="diasContratoExperiencia" value="<?php echo $colaborador->getDiaContratoExperiencia(); ?>"/>
                                                          </span>
                                                      </div>

                                                      <div class="inline-block">
                                                          <span class="left mrg-right_47">
                                                              <p><strong>Departamento:</strong></p>
                                                              <p class="visualizar2"><?php echo $colaborador->getDepartamento(); ?></p>
                                                              <input type="text" name="departamento" class="editar2" id="departamento" value="<?php echo $colaborador->getDepartamento(); ?>"/>
                                                          </span>
                                                          <span class="left">
                                                              <p><strong>Função:</strong></p>
                                                              <p class="visualizar2"><?php echo $colaborador->getFuncao(); ?></p>
                                                              <input type="text" name="funcao" class="editar2" id="funcao" value="<?php echo $colaborador->getFuncao(); ?>"/>
                                                          </span>
                                                      </div>
                                                      <br />
                                                      <br />
                                                      <div class="inline-block">
                                                          <span class="left mrg-right_47">
                                                              <p><strong>Salário Contratual:</strong></p>
                                                              <p class="visualizar2"><?php echo $colaborador->getSalarioContratual(); ?></p>
                                                              <input type="text" name="salarioContratual" class="editar2" id="salarioContratual" value="<?php echo $colaborador->getSalarioContratual(); ?>" alt="decimal"/>
                                                          </span>
                                                          <span class="left mrg-right_47">
                                                              <p><strong>Adiantamento Quinzenal</strong></p>
                                                              <p class="visualizar2"><?php echo $colaborador->getAdiantamentoQuinzenal(); ?></p>
                                                              <input type="text" name="adiantamentoQuinzenal" class="editar2" id="adiantamentoQuinzenal" value="<?php echo $colaborador->getAdiantamentoQuinzenal(); ?>" alt="decimal"/>
                                                          </span>
                                                      </div>
                                                      <br />
                                                      <br />
                                                      <p class="mrg-bottom_10"><strong>Horário de Trabalho:</strong></p>
                                                      <div class="inline-block">
                                                          <span class="left mrg-right_47">
                                                              <p><strong>Entrada:</strong></p>
                                                              <p class="visualizar2"><?php echo $colaborador->getHorarioEntrada(); ?></p>
                                                              <input type="text" name="horarioEntrada" class="editar2" id="horarioEntrada" value="<?php echo $colaborador->getHorarioEntrada(); ?>"/ alt="time">
                                                          </span>
                                                          <span class="left mrg-right_47">
                                                              <p><strong>Intervalo:</strong></p>
                                                              <p class="visualizar2"><?php echo $colaborador->getDuracaoIntervalo(); ?></p>
                                                              <input type="text" name="duracaoIntervalo" class="editar2" id="duracaoIntervalo" value="<?php echo $colaborador->getDuracaoIntervalo(); ?>" alt="time"/> às
                                                              <p class="visualizar2"><?php echo $colaborador->getHorarioIntervalo(); ?></p>
                                                              <input type="text" name="horarioIntervalo" class="editar2" id="horarioIntervalo" value="<?php echo $colaborador->getHorarioIntervalo(); ?>" alt="time"/>
                                                          </span>
                                                          <span class="left">
                                                              <p><strong>Saida:</strong></p>
                                                              <p class="visualizar2"><?php echo $colaborador->getHorarioSaida(); ?></p>
                                                              <input type="text" name="horarioSaida" class="editar2" id="horarioSaida" value="<?php echo $colaborador->getHorarioSaida(); ?>" alt="time"/>
                                                          </span>
                                                      </div>
                                                      <br />
                                                      <br />
                                                      <p class="mrg-bottom_10"><strong>Benefícios:</strong></p>
                                                      <div class="inline-block">
                                                          <span class="left mrg-right_47">
                                                              <p><strong>Possui vale-transporte?</strong></p>
                                                              <p class="visualizar2"><?php echo (($colaborador->getPossuiTransporte() == 0) ? "Não" : "Sim"); ?></p>
                                                              <label class="editar2"><input type="radio" class="input-radio possui_vTransporte" <?php
                                                          if ($colaborador->getPossuiTransporte() == 1) {
                                                              echo "checked='checked'";
                                                          } ?> name="possui_vTransporte" value="1">Sim</label>
                                    <label class="editar2"><input type="radio" class="input-radio possui_vTransporte" <?php
                                                                  if ($colaborador->getPossuiTransporte() == 0) {
                                                                      echo "checked='checked'";
                                                                  } ?> name="possui_vTransporte" value="0">Não</label><br />
                                    <br />
                                </span>
                                <span class="left mrg-right_47 transporteV">
                                    <p><strong>Tarifa:</strong></p>
                                    <p class="visualizar2"><?php echo $colaborador->getAuxilioTransporteTipo()->getNome(); ?></p>
                                    <select class="editar2" name="aux_transporte_tipo" id="aux_transporte_tipo" style="width:126px;">
                                        <?php
                                                                  try {
                                                                      $tiposTransportes = TipoAuxTransporte::listar();
                                                                      foreach ($tiposTransportes as $tiposTransporte) {
                                                                          if ($colaborador->getAuxilioTransporteTipo()->getId() == $tiposTransporte->getId()) {
                                                                              $selected = "selected='selected'";
                                                                          } else {
                                                                              $selected = "";
                                                                          }
                                        ?>
                                                                          <option <?php echo $selected; ?> value="<?php echo $tiposTransporte->getId(); ?>"><?php echo $tiposTransporte->getNome(); ?></option>
                                        <?php
                                                                      }
                                                                  } catch (ListaVazia $e) {

                                                                  }
                                        ?>
                                                              </select>
                                                              <br />
                                                              <span class="left mrg-right_47 transporteV">
                                                                  <p><strong>Casa / Trabalho:</strong></p>
                                                                  <p class="visualizar2"><?php echo $colaborador->getValeCasaTrabalho(); ?></p>
                                                                  <input type="text" name="transporteCT" class="editar2" id="transporteCT" value="<?php echo $colaborador->getValeCasaTrabalho(); ?>"/>
                                                                  <br />
                                                                  <p><strong>Trabalho / Casa:</strong></p>
                                                                  <p class="visualizar2"><?php echo $colaborador->getValeTrabalhoCasa(); ?></p>
                                                                  <input type="text" name="transporteTC" class="editar2" id="transporteTC" value="<?php echo $colaborador->getValeTrabalhoCasa(); ?>"/>
                                                              </span>
                                                          </div>
                                                          <hr style="margin-top:10px;"></hr>
                                                          <br />
                                                          <div class="inline-block">
                                                              <span class="left mrg-right_47">
                                                                  <p><strong>Possui vale-refeição?</strong></p>
                                                                  <p class="visualizar2"><?php echo (($colaborador->getPossuiAlimentacao() == 0) ? "Não" : "Sim"); ?></p>
                                                                  <label class="editar2">
                                                                      <input type="radio" class="input-radio possui_vAlimentacao" name="possui_vAlimentacao" <?php
                                                                  if ($colaborador->getPossuiAlimentacao() == 1) {
                                                                      echo "checked='checked'";
                                                                  }
                                    ?> value="1">Sim
                                                       </label>
                                                       <label class="editar2">
                                                           <input type="radio" class="input-radio possui_vAlimentacao" name="possui_vAlimentacao" <?php
                                                                  if ($colaborador->getPossuiAlimentacao() == 0) {
                                                                      echo "checked='checked'";
                                                                  }
                                    ?> value="0">Não
                                                       </label>
                                                       <br />
                                                       <br />
                                                   </span>
                                                   <span class="left mrg-right_47 refeicaoV">
                                                       <p><strong>Tipo do Vale-Refeição:</strong></p>
                                                       <p class="visualizar2"><?php echo (($colaborador->getAuxAlimentacaoTipo() == 0) ? "Refeição" : "Alimentação"); ?></p>
                                                       <select name="aux_alimentacao_tipo" id="aux_alimentacao_tipo" style="width:126px;" class="editar2">
                                                           <option <?php
                                                                  if ($colaborador->getAuxAlimentacaoTipo() == 0) {
                                                                      echo "selected='selected'";
                                                                  }
                                    ?> value="0">Refeição</option>
                                                              <option <?php
                                                                  if ($colaborador->getAuxAlimentacaoTipo() == 0) {
                                                                      echo "selected='selected'";
                                                                  }
                                    ?> value="1">Alimentação</option>
                                                          </select>
                                                      </span>
                                                          </div>
                                                          <hr></hr>
                                                          <input id="cadastrar2" type="button" class="button right editar2" value=" Editar " />
                                                      </fieldset>
                                                  </form>

                                                  <form name="documentos" id="documentos" method="post">
                                                      <fieldset name="documentosFieldset" id="documentosFieldset">
                                                          <legend>Documentos</legend>
                            <?php
                                                                  if (Acao::checarPermissao(2, CursoControll::MODULO)) {
                            ?>
                                                                      <span><img title="editar" src="img/btn-editar.png" id="editar3" style="float:right;cursor:pointer;" /></span>
                            <?php
                                                                  }
                            ?>
                                                                  <div>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>Identidade:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getRg(); ?></p>
                                                                          <input type="text" class="editar3" name="rg" id="rg" value="<?php echo $colaborador->getRg(); ?>"/>
                                                                      </span>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>Órgão Expedidor:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getOrgaoExpedidor(); ?></p>
                                                                          <input type="text" class="editar3" name="orgaoExpedidor" id="orgaoExpedidor" value="<?php echo $colaborador->getOrgaoExpedidor(); ?>"/>
                                                                      </span>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>Data de Expedição:</strong></p>
                                                                          <p class="visualizar3"><?php echo formataData($colaborador->getDataExpedicao()); ?></p>
                                                                          <input type="text" class="editar3" name="dataExpedicao" id="dataExpedicao" value="<?php echo formataData($colaborador->getDataExpedicao()); ?>" alt="date"/>
                                                                      </span>
                                                                  </div>
                                                                  <br />
                                                                  <br />
                                                                  <br />
                                                                  <div>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>Carteira de Habilitação:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getHabilitacao(); ?></p>
                                                                          <input type="text" class="editar3" name="habilitacao" id="habilitacao" value="<?php echo $colaborador->getHabilitacao(); ?>"/>
                                                                      </span>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>Categoria:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getHabilitacaoCategoria(); ?></p>
																		<select name="categoria" id="categoria" class="editar3">
																			<option value="A" <?php echo (($colaborador->getHabilitacaoCategoria() == 'A') ? "selected='selected'":""); ?> >A</option>
																			<option value="B" <?php echo (($colaborador->getHabilitacaoCategoria() == 'B') ? "selected='selected'":""); ?> >B</option>
																			<option value="C" <?php echo (($colaborador->getHabilitacaoCategoria() == 'C') ? "selected='selected'":""); ?> >C</option>
																			<option value="D" <?php echo (($colaborador->getHabilitacaoCategoria() == 'D') ? "selected='selected'":""); ?> >D</option>
																			<option value="E" <?php echo (($colaborador->getHabilitacaoCategoria() == 'E') ? "selected='selected'":""); ?> >E</option>
																		</select>
                                                                      </span>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>Vencimento:</strong></p>
                                                                          <p class="visualizar3"><?php echo formataData($colaborador->getHabilitacaoVencimento()); ?></p>
                                                                          <input type="text" class="editar3" name="vencimentoHabilitacao" id="vencimentoHabilitacao" value="<?php echo formataData($colaborador->getHabilitacaoVencimento()); ?>" alt="date"/>
                                                                      </span>
                                                                  </div>
                                                                  <br />
                                                                  <br />
                                                                  <br />
                                                                  <div>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>Título Eleitoral:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getTitulo(); ?></p>
                                                                          <input type="text" class="editar3" name="tituloEleitoral" id="tituloEleitoral" value="<?php echo $colaborador->getTitulo(); ?>"/>
                                                                      </span>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>Zona:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getTituloZona(); ?></p>
                                                                          <input type="text" class="editar3" name="zonaEleitoral" id="zonaEleitoral" value="<?php echo $colaborador->getTituloZona(); ?>"/>
                                                                      </span>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>Seção:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getTituloSecao(); ?></p>
                                                                          <input type="text" class="editar3" name="secaoEleitoral" id="secaoEleitoral" value="<?php echo $colaborador->getTituloSecao(); ?>"/>
                                                                      </span>
                                                                  </div>
                                                                  <br />
                                                                  <br />
                                                                  <br />
                                                                  <div>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>Carteira de Trabalho:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getCarteiraTrabalho(); ?></p>
                                                                          <input type="text" class="editar3" name="carteiraTrabalho" id="carteiraTrabalho" value="<?php echo $colaborador->getCarteiraTrabalho(); ?>"/>
                                                                      </span>
																	  <span class="left mrg-right_47">
                                                                          <p><strong>Série:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getCarteiraTrabalhoSerie(); ?></p>
                                                                          <input type="text" class="editar3" name="carteiraTrabalhoSerie" id="carteiraTrabalhoSerie" value="<?php echo $colaborador->getCarteiraTrabalhoSerie(); ?>"/>
                                                                      </span>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>Uf:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getCarteiraUf(); ?></p>
                                                                          <input type="text" class="editar3" name="ufCarteiraTrabalho" id="ufCarteiraTrabalho" value="<?php echo $colaborador->getCarteiraUf(); ?>"/>
                                                                      </span>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>PIS:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getPis(); ?></p>
                                                                          <input type="text" class="editar3" name="pis" id="pis" value="<?php echo $colaborador->getPis(); ?>"/>
                                                                      </span>
                                                                  </div>
                                                                  <br />
                                                                  <br />
                                                                  <br />
                                                                  <div>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>CPF:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getCpf(); ?></p>
                                                                          <input type="text" class="editar3" name="cpf" id="cpf" value="<?php echo $colaborador->getCpf(); ?>" alt="cpf"/>
                                                                      </span>
                                                                      <span class="left mrg-right_47">
                                                                          <p><strong>Certificado Reservista:</strong></p>
                                                                          <p class="visualizar3"><?php echo $colaborador->getCertificadoReservista(); ?></p>
                                                                          <input type="text" class="editar3" name="reservista" id="reservista" value="<?php echo $colaborador->getCertificadoReservista(); ?>"/>
                                                                      </span>
                                                                  </div>

                                                                  <input type="button" id="cadastrar3" class="button right editar3" value=" Editar " />
                                                              </fieldset>
                                                          </form>
                                                          <form name="informacoesComplementares" id="informacoesComplementares" action="recursosHumanos/concluirCadastro" method="post">
                                                              <fieldset name="infComplementaresFieldset" id="infComplementaresFieldset">
                                                                  <legend>Informações Complementares</legend>
                            <?php
                                                                  if (Acao::checarPermissao(2, CursoControll::MODULO)) {
                            ?>
                                                                      <span><img title="editar" src="img/btn-editar.png" id="editar4" style="float:right;cursor:pointer;" /></span>
                            <?php
                                                                  }
                            ?>
                                                                  <p><strong>Cônjuge:</strong></p>
                                                                  <p class="visualizar4"><?php echo $colaborador->getConjuge(); ?></p>
                                                                  <input type="hidden" class="id" name="id" value="<?php echo $colaborador->getId(); ?>" />
                                                                  <input type="hidden" id="quantidadeDeFilhos" value="0"/>
                                                                  <input type="hidden" id="indiceDeFilhos" value="1"/>
                                                                  <input type="text" name="conjuge" class="editar4" id="conjuge" class="width_685" value="<?php echo $colaborador->getConjuge(); ?>"/>
                                                                  <br />
                                                                  <input type="button" class="button-add editar4" id="addFilho" value="+ Adicionar Filhos" style="clear:both"/>
                                                                  <div id="filhos">
                                <?php
                                                                  try {
                                                                      $filhos = Filho::listar($colaborador->getId());
                                                                      foreach ($filhos as $key => $filho) {
                                ?>
                                                                          <div class="mrg-top_20">
                                                                              <hr class="mrg-bottom_10" />
                                                                              <input type="button" class="button-delete right editar4" style="margin-bottom:-6px" value="x" />
                                                                              <div class="inline-block">
                                                                                  <p><strong>Nome</strong></p>
                                                                                  <p class="visualizar4"><?php echo $filho->getNome(); ?></p>
                                                                                  <input type="text" name="filho[<?php echo $key; ?>][nome]" class="width_685 editar4" value="<?php echo $filho->getNome(); ?>"/>
                                                                              </div>
                                                                              <br />
                                                                              <br />
                                                                              <div class="inline-block">
                                                                                  <span class="left" style="margin-right:47px;">
                                                                                      <p><strong>Data de Nascimento</strong></p>
                                                                                      <p class="visualizar4"><?php echo formataData($filho->getDataNascimento()); ?></p>
                                                                                      <input type="text" name="filho[<?php echo $key; ?>][nascimento]" class="mrg-right_30 editar4" value="<?php echo formataData($filho->getDataNascimento()); ?>" alt="date"/>
                                                                                  </span>
                                                                                  <span class="left">
                                                                                      <p><strong>Pensão Alimentícia</strong></p>
                                                                                      <p class="visualizar4"><?php echo $filho->getPensao(); ?></p>
                                                                                      <input type="text" name="filho[<?php echo $key; ?>][pensao]" value="<?php echo $filho->getPensao(); ?>" class="editar4" alt="decimal"/>
                                                                                  </span>
                                                                              </div>
                                                                          </div>
                                <?php
                                                                      }
                                                                  } catch (ListaVazia $e) {

                                                                  }
                                ?>
                                                              </div>
                                                              <p style="margin-top:30px;"><strong>Observações:</strong></p>
                                                              <p class="visualizar4"><?php echo $colaborador->getObservacoes(); ?></p>
                                                              <textarea  rows="100" cols="116" name="observacoes" class="editar4" ><?php echo $colaborador->getObservacoes(); ?></textarea>
                            <input type="submit" id="cadastrar4" class="button right editar4" value=" Editar " />
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

