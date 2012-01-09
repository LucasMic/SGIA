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
	$usuario = $this->getDados('VIEW');
?>
<div class="wrap">
	<div class=" header-content">
		<h2 class="left">Ver Usuário</h2>
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
								<form name="editar" method="post" action="usuario/editar/<?php echo $usuario->getId(); ?>">
									<input type="hidden" name="id" id="id" value="<?php echo $usuario->getId(); ?>">
									<fieldset>
										<legend>Dados</legend>
										<?php 
										if(Acao::checarPermissao(2,UsuarioControll::MODULO)){
											?>
											<span><img title="editar" src="img/btn-editar.png" id="editar" style="float:right;" /></span>
											<?php 
										}
										?>
										<ul>
											<li style="margin-bottom:10px;">
												<p><strong>Login</strong></p>
												<p class="visualizar"><?php echo $usuario->getLogin();?></p>
												<input type="text" id="login" name="login" value="<?php echo $usuario->getLogin();?>" class="editar">
											</li>
											<li style="margin-bottom:10px;" class="editar">
												<p><strong>Senha</strong></p>
												<input type="password" id="senha" name="senha" value="<?php echo $usuario->getSenha();?>" class="editar">
											</li>
											<li style="background:#f5f5f5;margin-bottom:10px;">
												<p><strong>Perfil</strong></p>
												<p class="visualizar"><?php echo $usuario->getPerfil()->getNome();?></p>
												<select name="perfil" id="perfil" class="editar">
													<?php
													$perfis = Perfil::listar($_SESSION["sede"]);
													foreach($perfis as $perfil){
														if($perfil->getId() == $usuario->getPerfil()->getId()){
															$selected = "selected='selected'";
														} else {
															$selected = "";
														}
														?>
														<option <?php echo $selected; ?> id="<?php echo $perfil->getId(); ?>" value="<?php echo $perfil->getId(); ?>"><?php echo $perfil->getNome(); ?></option>
														<?php
													}
													?>
												</select>
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