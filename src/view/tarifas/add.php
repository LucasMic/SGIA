<script type="text/javascript">
$(document).ready(function($){
	$("#submeter").click(function(){
		id = $("#id").val();
		nome = $("#nome_tarifa").val();
		valor = $("#valor_tarifa").val();

		$.get('tarifas/verificaExistencia', {id: id, nome: nome, valor: valor}, 
				function(data, status){					
					if($.trim(data) == 'erro' || status != "success"){
						$("#erro").html("Essa tarifa já existe no sistema, escolha outro nome.");	
						return false;
					} else {
						$("#add").submit();
					}		
				}
		);
		
	});	
	
});
</script>

<div class=" header-content">
		<h2 class="left">Cadastro de Tarifas</h2>
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
						<form name="add" id ="add" method="post">
							<fieldset>
								<legend>Dados</legend>
								<ul class="list-cadastro">
									<li>
										<input type="hidden" name="id" id="id" value="0">
										<p>Nome da tarifa: </p>
										<input type="text" id="nome_tarifa" name="nome_tarifa" value="" class="required" maxlength="1" />
										<b style="color:red;" id="erro"></b>
										
										<p>Valor da tarifa: </p>
										<input type="text" id="valor_tarifa" name="valor_tarifa" value="" alt="decimal" class="required" />

									</li>
									
									
								</ul>
								<input type="button" id="submeter" class="button right" value=" Cadastrar " />
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
