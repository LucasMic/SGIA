<script type="text/javascript">
	function validarCamposObrigatorios(){
		if(($.trim($("#nome").val()) == '')||($("input:checked").size() == 0)){
			jAlert('Preencha os campos obrigatórios.','Alerta');
			return false;
		}
		return true;
	}

</script>
<?php 
	$perfil = $this->getDados('VIEW');
?>
<div class="wrap">
		<div class=" header-content">
    	<h2 class="left">Editar Perfil</h2>
    </div>
 	<hr class="mrg-bottom_20"/>
    
	<div id="dashboard-wrap">
		<div class="metabox"></div>
		<div class="clear"></div>
		<div class="box-content">
			<div class="box">
				<div class="table">
					<div class="inside">
						<form id="editarPerfil" name="editarPerfil" method="post" onSubmit="return validarCamposObrigatorios();">
							<input type="hidden" id="id" name="id" value="<?php echo $perfil->getId();?>" />
							<fieldset>
								<legend>Dados</legend>
								<ul class="list-cadastro">
									<li>
										<label for="nome">Nome</label>
										<input type="text" id="nome" name="nome" value="<?php echo $perfil->getNome();?>" />
									</li>
								</ul>
							</fieldset>
							<fieldset>
								<legend>Módulos/Ações</legend>
								<?php 
									// LISTANDO TODAS OS MODULOS //
									try {
										$modulos = Modulo::listar();
										foreach($modulos as $modulo){
								?>
								<ul class="list-cadastro">
									<li><?php echo $modulo->getNome();?></li>
									<br />
									<li>
										<?php 
											try {
												$acoes = Acao::listar($modulo->getId());
												foreach($acoes as $acao){
													foreach($perfil->getAcoes() as $act){
														if(($act->getModulos()->getId())==($modulo->getId())&&($act->getCodigo())==($acao->getCodigo())){
															$check = "checked='checked'";
															break;
														}
														else{
															$check = '';
														}
													}
										?>
										<ul>
											<li>
												<label>
												<input <?php echo $check;?> type="checkbox" id="ch_<?php echo $modulo->getId()."_".$acao->getCodigo();?>" name="ch_<?php echo $modulo->getId()."_".$acao->getCodigo();?>" />
												<?php echo $acao->getNome();?>
												</label>
											</li>
										</ul>
										<?php 
												}
											}
											catch(ListaVazia $e){}
										?>
									</li>
								</ul>
								<?php 
										}
									}
									catch(ListaVazia $e){}
								?>
							</fieldset>
							<ul id="bts">
								<li>
									<input type="submit" class="button right" value=" Editar " />
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
</div><!--fim div wrap-->