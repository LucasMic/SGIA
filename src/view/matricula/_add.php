<script type="text/javascript">
	$(document).ready(function($){
		var qtd = 1;
		
		$("#div_parcelas").hide();
		$("#detalhes_cheques").hide();
		
	
		$("#addCheque").click(function(){
			i = $("#indiceDeCheques").val();
			$("<div id='cheque_" + i + "' style='margin-left:25px;'><hr class='mrg-bottom_10' /><input type='button' class='button-delete right' style='margin-bottom:-6px' value='x' /><p style='margin-left:0px;'><strong>" + i + ")</strong></p><p>Agência</p><input type='text' name='cheques[" + i + "][agencia]' id='agencia_" + i + "' value=''><p>Conta</p><input type='text' name='cheques[" + i + "][conta]' id='conta_" + i + "' value=''><p>Número do Cheque</p><input type='text' name='cheques[" + i + "][numero_cheque]' id='numero_cheque_" + i + "' value=''><p>Data de Vencimento</p><input type='text' name='cheques[" + i + "][data_vencimento]' id='data_vencimento_" + i + "' value='' alt='date'><p>Valor</p><input type='text' name='cheques[" + i + "][valor]' id='valor_" + i + "' value='' alt='decimal'></div>").appendTo("#detalhes_cheques");
			quantidade = parseInt($("#quantidadeDeCheques").val());
			$("#quantidadeDeCheques").val(quantidade + 1);
			indice = parseInt($("#indiceDeCheques").val());
			$("#indiceDeCheques").val(indice + 1);
		});
		
		$(".button-delete").live('click', function(){
			$(this).parent().fadeOut("slow").delay(1000).queue(function() { $(this).remove(); });
			quantidade = parseInt($("#quantidadeDeCheques").val());
			$("#quantidadeDeCheques").val(quantidade - 1);
			if((quantidade - 1) == 0){
				$("#indiceDeCheques").val(1);
			}
		});
		
		$("#submeter").click(function(){
			if($("#forma_pagamento").val() == 0 || $("#cursos_id").val() == 0 || $("#alunos_id").val() == 0){
				alert("Preencha os campos obrigatórios");
				return false;
			}
			return true;
		});
		
		$("#forma_pagamento").change(function(){
			if($("#forma_pagamento").val() == 2 ||  $("#forma_pagamento").val() == 1){
				$("#div_parcelas").fadeIn();
				if($("#forma_pagamento").val() == 2){
					$("#detalhes_cheques").fadeIn();
				} else {
					$("#detalhes_cheques").hide();
				}
			} else {
				$("#div_parcelas").hide();
				$("#detalhes_cheques").hide();
			}
		});
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
						<form method="post" name="add">
							<fieldset>
								<legend>Dados</legend>
								<ul class="list-cadastro">
									<li>
										<p>Aluno:</p>
										<select name="alunos_id" id="alunos_id">
											<option value="0">Selecione um Aluno</option>
											<?php 
												try{
													$alunos = Aluno::listar($_SESSION["sede"]);
													foreach($alunos as $aluno){
														?>
														<option value="<?php echo $aluno->getId(); ?>"><?php echo $aluno->getNome(); ?></option>
														<?php
													}
												}catch(ListaVazia $e){
													echo "<option value='0'>Não existem alunos cadastrados</option>";
												}
											?>
										</select>
									</li>
									<li>
										<p>Curso:</p>
										<select name="cursos_id" id="cursos_id">
											<option value="0">Selecione um curso</option>
										<?php 
											try{
												$cursos = Curso::listar($_SESSION["sede"]);
												foreach($cursos as $curso){
													?>
													<option value="<?php echo $curso->getId(); ?>"><?php echo $curso->getNome(); ?></option>
													<?php
												}
											}catch(ListaVazia $e){
												echo "<option value='0'>Não existem cursos cadastrados</option>";
											}
										?>
										</select>
									</li>
									<li>
										<p>Forma de Pagamento:</p>
										<select name="forma_pagamento" id="forma_pagamento">
											<option value="0">Selecione uma Forma de Pagamento</option>
										<?php 
											try{
												$formasPagmentos = FormaPagamento::listar();
												foreach($formasPagmentos as $formasPagmento){
													?>
													<option value="<?php echo $formasPagmento->getId(); ?>"><?php echo $formasPagmento->getNome(); ?></option>
													<?php
												}
											}catch(ListaVazia $e){
												echo "<option value='0'>Não existem formas de pagamento cadastradas</option>";
											}
										?>
										</select>
									</li>
									<li id="div_parcelas">
										<p>Parcelas:</p>
										<input type="text" name="parcelas" id="parcelas" value="1">
									</li>
									<li id="detalhes_cheques">
										<input type="hidden" id="quantidadeDeCheques" value="0"/>
                               			<input type="hidden" id="indiceDeCheques" value="1"/>
                               			<input type="button" class="button-add" style="margin-bottom:10px;" id="addCheque" value="+ Adicionar Cheque" style="clear:both"/>
										<p><strong>Detalhes do Cheque:</strong></p>
										<br />
									</li>
									<li id="descontos">
										<p>Desconto Avulso (%)</p>
										<input type="text" id="valor_desconto" name="valor_desconto" value="" alt="percent" />
										<p>Autorizado por: </p>
										<input type="text" id="autorizacao_desconto" name="autorizacao_desconto" value="" />
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
