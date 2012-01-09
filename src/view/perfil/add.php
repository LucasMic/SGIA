<script type="text/javascript">
	$(document).ready(function($){
		$('#nome').focus();
		$('form').validate( {
			messages: {
				nome: { required: 'Digite um nome' }
			}
		});
	});
</script>
	<div class=" header-content">
    	<h2 class="left">Cadastro de Perfil</h2>
    	<?php
                //AQUI SERVE PRA EXIBIR O SELECT DE ACORDO COM A SEDE NO CASO PROJETO
    		//require_once VIEW . DS . "default" . DS . "sede.php";
    	?>	
	</div>
    <hr class="mrg-bottom_20"/>
	<div id="dashboard-wrap">
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
										<label for="nome">Nome</label>
										<input type="text" id="nome" name="nome" value="" class="required" />
									</li>
								</ul>
							</fieldset>
							<hr></hr>
							<fieldset>
								<legend>Módulos/Ações</legend>
								<?php 
									// LISTANDO TODAS OS MODULOS //
									try {
										$modulos = Modulo::listar();
										foreach($modulos as $modulo){
								?>
								<ul>
									<li><strong><?php echo $modulo->getNome();?></strong></li>
									<br />
									<li>
										<?php 
											try {
												$acoes = Acao::listar($modulo->getId());
												foreach($acoes as $acao){
										?>
										<ul>
											<li>
												<label>
												<input type="checkbox" id="ch_<?php echo $modulo->getId()."_".$acao->getCodigo();?>" name="ch_<?php echo $modulo->getId()."_".$acao->getCodigo();?>" />
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
	