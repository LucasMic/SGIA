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
	$aluno = $this->getDados('VIEW');
?>

	<div class=" header-content">
		<h2 class="left">Ver Aluno</h2>
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
								<form name="editar" method="post" action="aluno/editar/<?php echo $aluno->getId(); ?>">
									<input type="hidden" name="id" id="id" value="<?php echo $aluno->getId(); ?>">
									<fieldset>
										<legend>Dados</legend>
																					<span><img title="editar" src="img/btn-editar.png" id="editar" style="float:right;" /></span>
										
										<ul class="list-cadastro">
											<li style="margin-bottom:10px;">
												<p><strong>Nome</strong></p>
												<p class="visualizar"><?php echo $aluno->getNome();?></p>
												<input type="text"  size="91" id="nome" name="nome" value="<?php echo $aluno->getNome();?>" class="required editar"/>
											</li>
											<li style="margin-bottom:10px;">
												<p><strong>Sexo</strong></p>
												<p class="visualizar"><?php if($aluno->getSexo() == "M") { echo "Masculino"; }else{ echo "Feminino"; }?></p>
												<input type="radio"  <?php if($aluno->getSexo() == "M") { echo "checked='checked'"; } ?> name="sexo" value="M" class="required editar" /> <b class="editar">Masculino </b>
												<input type="radio"  <?php if($aluno->getSexo() == "F") { echo "checked='checked'"; } ?> name="sexo" value="F" class="required editar" /> <b class="editar">Feminino </b>
											</li>
											<li style="margin-bottom:10px;margin-right:47px;float:left;">
												<p><strong>RG</strong></p>
												<p class="visualizar"><?php echo $aluno->getRg(); ?></p>
												<input type="text"  id="rg" name="rg" value="<?php echo $aluno->getRg(); ?>" class="required editar" />
											</li>
											<li style="margin-bottom:10px;margin-right:47px;float:left;">
												<p><strong>Orgão Expedidor</strong></p>
												<p class="visualizar"><?php echo $aluno->getOrgaoExpedidor(); ?></p>
												<input type="text"  id="orgao_expedidor" name="orgao_expedidor" value="<?php echo $aluno->getOrgaoExpedidor(); ?>" class="required editar" />
											</li>
											<li style="margin-bottom:10px;">
												<p><strong>CPF</strong></p>
												<p class="visualizar"><?php echo $aluno->getCpf(); ?></p>
												<input type="text"  id="cpf" name="cpf" value="<?php echo $aluno->getCpf(); ?>" class="required editar" alt="cpf" />
											</li>
											<li style="margin-bottom:10px;">
												<p><strong>Endereço</strong></p>
												<p class="visualizar"><?php echo $aluno->getEndereco(); ?></p>
												<input type="text"  size="55" id="endereco" name="endereco" value="<?php echo $aluno->getEndereco(); ?>" class="required editar" />
											</li>
											<li style="margin-bottom:10px;margin-right:47px;float:left;">
												<p><strong>Bairro</strong></p>
												<p class="visualizar"><?php echo $aluno->getBairro(); ?></p>
												<input type="text"  id="bairro" name="bairro" value="<?php echo $aluno->getBairro(); ?>" class="required editar" />
											</li>
												<li style="margin-bottom:10px;margin-right:47px;float:left;">
												<p><strong>Cidade</strong></p>
												<p class="visualizar"><?php echo $aluno->getCidade(); ?></p>
												<input type="text"  id="cidade" name="cidade" value="<?php echo $aluno->getCidade(); ?>" class="required editar"  />
											</li>
											<li style="margin-bottom:10px;">
												<p><strong>Estado</strong></p>
												<p class="visualizar"><?php echo $aluno->getEstado(); ?></p>
												<input type="text"  id="estado" name="estado" value="<?php echo $aluno->getEstado(); ?>" class="required editar" />
											</li>
											<li style="margin-bottom:10px;margin-right:47px;float:left;">
												<p><strong>CEP</strong></p>
												<p class="visualizar"><?php echo $aluno->getCep(); ?></p>
												<input type="text"  id="cep" name="cep" value="<?php echo $aluno->getCep(); ?>" class="required editar" alt="cep" />
											</li>
											<li style="margin-bottom:10px;margin-right:47px;float:left;">
												<p><strong>Telefone</strong></p>
												<p class="visualizar"><?php echo $aluno->getTelefone1(); ?></p>
												<input type="text"  id="telefone_1" name="telefone_1" value="<?php echo $aluno->getTelefone1(); ?>" class="required editar" alt="phone" />
											</li>
											<li style="margin-bottom:10px;" >
												<p><strong>Celular</strong></p>
												<p class="visualizar"><?php echo $aluno->getTelefone2(); ?></p>
												<input type="text"  id="telefone_2" name="telefone_2" value="<?php echo $aluno->getTelefone2(); ?>" class="required editar" alt="phone" />
											</li>
											<li style="margin-bottom:10px;">
												<p><strong>E-mail</strong></p>
												<p class="visualizar"><?php echo $aluno->getEmail(); ?></p>
												<input type="text"  size="55" id="email" name="email" value="<?php echo $aluno->getEmail(); ?>" class="required editar" />
											</li>
											<li style="margin-bottom:10px;margin-right:47px;float:left;">
												<p><strong>Escolaridade</strong></p>
												<p class="visualizar"><?php echo $aluno->getEscolaridade(); ?></p>
												<input type="text"  id="escolaridade" name="escolaridade" value="<?php echo $aluno->getEscolaridade(); ?>" class="required editar"  />
											</li>
											<li style="margin-bottom:10px;margin-right:47px;float:left;">
												<p><strong>Profissão</strong></p>
												<p class="visualizar"><?php echo $aluno->getProfissao(); ?></p>
												<input type="text"  id="profissao" name="profissao" value="<?php echo $aluno->getProfissao(); ?>" class="required editar" />
											</li>
										</ul>
										<input type="submit" class="button right editar" value=" Editar " />
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
