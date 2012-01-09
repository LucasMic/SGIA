<script type="text/javascript">
	$(document).ready(function($){
		$('#login').focus();
		$('form').validate( {
			messages: {
				login: { required: 'Digite um nome' },
				senha: { required: 'Digite uma senha' },
				perfil: { required: 'Selecione um perfil' }
			}
		});
	});
</script>
	<div class="header-content">
		<h2 class="left">Cadastro de Usuário</h2>
		<?php
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
										<p>Login</p>
										<input type="text" id="login" name="login" value="" class="required" />
									</li>
									<li>
										<p>Senha</p>
										<input type="password" id="senha" name="senha" value="" class="required" />
									</li>
									<li>
										<p>Perfil</p>
										<select id="perfil" name="perfil" class="required">
											<option value="">Selecione</option>
											<?php 
												try {
													$perfis = Perfil::listar($_SESSION["sede"]);
													foreach($perfis as $perfil){
											?>
                                                                                                        <option value="<?php echo $perfil->getId();?>"><?php echo $perfil->getNome();?></option>
											<?php 
													}
												}
												catch(ListaVazia $e){}
											?>
										</select>
									</li>				
								</ul>
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
