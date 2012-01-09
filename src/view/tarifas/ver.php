<script type="text/javascript">
$(document).ready(function($){

	$("#botaoEditar").click(function(){
		id = $("#id").val();
		nome = $("#nome").val();
		valor = $("#valor").val();
		$.get('tarifas/verificaExistencia', {id: id, nome: nome, valor: valor}, 
				function(data, status){
					if($.trim(data) == 'erro' || status != "success"){
						$("#erro").html("Essa tarifa já existe no sistema, escolha outro nome.");	
						return false;
					} else {
						$("#formEditar").submit();
					}		
				}
		);
		
	});	
	
	$(".editar").hide();
	
	$("#editar").click(function(){
		$(".visualizar").hide();
		$(".editar").fadeIn();
	});
	
});
</script>
<?php
	$tarifas = $this->getDados('VIEW');
?>

	<div class=" header-content">
		<h2 class="left">Ver Tarifa</h2>
		<?php
    		require_once VIEW . DS . "default" . DS . "sede.php";
    	?>	
	</div>
	<br />
	<br />
	<hr class="mrg-bottom_20"/>
	<div id="dashboard-wrap">
		<div class="metabox">
		</div>
		<div class="clear"> </div>
		<div class="box-content">
			<div class="box">
				<div class="table">
					<div class="inside">
						<ul class="list-cadastro">
							<li>
								<form name="editar" id="formEditar" method="post" action="tarifas/editar/<?php echo $tarifas->getId(); ?>">
									<input type="hidden" name="id" id="id" value="<?php echo $tarifas->getId(); ?>">
									<fieldset>
										<legend>Dados</legend>
											<span><img title="editar" src="img/btn-editar.png" id="editar" style="float:right;" /></span>
										
										<ul class="list-cadastro">
											<li style="margin-bottom:10px;">
												<p><strong>Nome</strong></p>
												<p class="visualizar"><?php echo $tarifas->getNome();?></p>
												<input type="text" id="nome" name="nome" value="<?php echo $tarifas->getNome();?>" class="required editar"/>
												<b style="color:red;" id="erro"></b>
											</li>
											
											<li style="margin-bottom:10px;margin-right:47px;float:left;">
												<p><strong>Valor</strong></p>
												<p class="visualizar"><?php echo number_format($tarifas->getValor(), 2, ",", "."); ?></p>
												<input type="text"  id="valor" name="valor" alt="decimal" value="<?php echo number_format($tarifas->getValor(), 2, ",", ".");  ?>" class="required editar" />
											</li>
										</ul>
										<input type="button" class="button right editar" id="botaoEditar" value=" Editar " />
									</fieldset>
								</form>
							</li>
						</ul>
					<hr> </hr>
					<ul id="bts">
						<li>
							<input type="button" style="margin-right:5px;" class="button right" value="Voltar" onclick="location.href='voltar'" />
						</li>
					</ul>
					</div> <!--fim div inside-->
				</div><!--fim div table-->
				<div class="table-footer"></div>
			</div> <!--fim div box-->
		</div> <!--fim div box-content-->
	</div><!--fim div dashboard-wrap-->