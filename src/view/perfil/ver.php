<?php
	$perfil = $this->getDados('VIEW');
	$modulos = array();
	foreach($perfil->getAcoes() as $acao){		
		if(!in_array($acao->getModulos(),$modulos))
			$modulos[] = $acao->getModulos();
		$acoes[$acao->getModulos()->getId()][] = $acao;
	}
?>
<div class="wrap">
	<div class=" header-content">
    	<h2 class="left">Ver Perfil</h2>
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
								<fieldset>
									<legend>Dados</legend>
									<ul>
										<li>
											<strong>Nome: &nbsp;</strong>
											<?php echo $perfil->getNome();?>
										</li>
									</ul>
								</fieldset>
							</li>
						</ul>
						<ul>
							<li>
								<fieldset>
									<legend>Módulos / Ações</legend>
									<ul>
										<?php 
											foreach($modulos as $modulo){
										?>
										<li style="color:#333333;"><strong><?php echo $modulo->getNome();?></strong></li>
										<li>
											<ol>
												<?php 
													foreach($acoes[$modulo->getId()] as $acao){
												?>
												<li><?php echo $acao->getNome();?></li>
												<?php 
													}
												?>
											</ol>
										</li>
										<?php 
											}
										?>
									</ul>
								</fieldset>
							</li>
						</ul>
					<hr> </hr>
					<ul id="bts">
						<li>
							<input type="button" class="button right" value="Voltar" onclick="location.href='voltar'" />
						</li>
					</ul>
					</div> <!--fim div inside-->
				</div><!--fim div table-->
				<div class="table-footer"></div>
			</div> <!--fim div box-->
		</div> <!--fim div box-content-->
	</div><!--fim div dashboard-wrap-->
</div><!--fim div wrap-->