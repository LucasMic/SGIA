<script type="text/javascript">
$(document).ready(function($){
	$(".editar").hide();
	
	$("#editar").click(function(){
		$(".visualizar").hide();
		$(".editar").fadeIn();
	});
	
});
</script>
<?php
	$convenio = $this->getDados('VIEW');
?>
<div class="wrap">
	<div class=" header-content">
		<h2 class="left">Ver Convênio</h2>
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
								<form name="editar" method="post" action="convenio/editar/<?php echo $convenio->getId(); ?>">
									<input type="hidden" name="id" id="id" value="<?php echo $convenio->getId(); ?>">
									<fieldset>
										<legend>Dados</legend>
										<?php 
											if(Acao::checarPermissao(2,ConvenioControll::MODULO)){
												?>
												<span><img title="editar" src="img/btn-editar.png" id="editar" style="float:right;" /></span>
												<?php 
											}
											?>
										<ul>
											<li style="margin-bottom:10px;">
												<strong>Nome</strong><br />
												<p class="visualizar"><?php echo $convenio->getNome();?></p>
												<input type="text" id="nome" name="nome" value="<?php echo $convenio->getNome();?>" class="editar">
											</li>
											<li style="background:#f5f5f5;margin-bottom:10px;">
												<strong>Desconto</strong><br />
												<p class="visualizar"><?php echo $convenio->getDesconto() . " %";?></p>
												<input type="text" id="desconto" name="desconto" value="<?php echo $convenio->getDesconto();?>" class="editar" alt="decimal" />
											</li>
										</ul>
										<input type="submit" class="button right editar" value=" Editar ">
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
</div><!--fim div wrap-->