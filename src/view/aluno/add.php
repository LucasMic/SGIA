<script type="text/javascript">
	$(document).ready(function($){
		$('#login').focus();
		$('form').validate( {
			messages: {
				nome: { required: 'Digite um nome' },
				desconto: { required: 'Digite uma senha' }
			}
		});
	});
</script>
	<div class=" header-content">
		<h2 class="left">Cadastro de Aluno</h2>
		<?php
    		require_once VIEW . DS . "default" . DS . "sede.php";
    	?>	
	</div>
	<br />
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
									<li style="margin-bottom:10px;">
										<p>Nome</p>
										<input type="text"  size="91" id="nome" name="nome" value="" class="required" />
									</li>
									<li style="margin-bottom:10px;">
										<p>Sexo</p>
										<input type="radio"  name="sexo" value="M" class="required" /> Masculino
										<input type="radio"  name="sexo" value="F" class="required" /> Feminino
									</li>
									<li style="margin-bottom:10px;margin-right:47px;float:left;">
										<p>RG</p>
										<input type="text"  id="rg" name="rg" value="" class="required" />
									</li>
									<li style="margin-bottom:10px;margin-right:47px;float:left;">
										<p>Orgão Expedidor</p>
										<input type="text"  id="orgao_expedidor" name="orgao_expedidor" value="" class="required" />
									</li>
									<li style="margin-bottom:10px;">
										<p>CPF</p>
										<input type="text"  id="cpf" name="cpf" value="" class="required" alt="cpf"/>
									</li>
									<li style="margin-bottom:10px;">
										<p>Endereço</p>
										<input type="text"  size="55" id="endereco" name="endereco" value="" class="required" />
									</li>
									<li style="margin-bottom:10px;margin-right:47px;float:left;">
										<p>Bairro</p>
										<input type="text"  id="bairro" name="bairro" value="" class="required" />
									</li>
										<li style="margin-bottom:10px;margin-right:47px;float:left;">
										<p>Cidade</p>
										<input type="text"  id="cidade" name="cidade" value="" class="required" />
									</li>
									<li style="margin-bottom:10px;">
										<p>Estado</p>
										<input type="text"  id="estado" name="estado" value="" class="required" />
									</li>
									<li style="margin-bottom:10px;margin-right:47px;float:left;">
										<p>CEP</p>
										<input type="text"  id="cep" name="cep" value="" class="required" alt="cep"/>
									</li>
									<li style="margin-bottom:10px;margin-right:47px;float:left;">
										<p>Telefone</p>
										<input type="text"  id="telefone_1" name="telefone_1" value="" class="required" alt="phone"/>
									</li>
									<li style="margin-bottom:10px;" >
										<p>Celular</p>
										<input type="text"  id="telefone_2" name="telefone_2" value="" class="required" alt="phone"/>
									</li>
									<li style="margin-bottom:10px;">
										<p>E-mail</p>
										<input type="text"  size="55" id="email" name="email" value="" class="required" />
									</li>
									<li style="margin-bottom:10px;margin-right:47px;float:left;">
										<p>Escolaridade</p>
										<input type="text"  id="escolaridade" name="escolaridade" value="" class="required" />
									</li>
									<li style="margin-bottom:10px;margin-right:47px;float:left;">
										<p>Profissão</p>
										<input type="text"  id="profissao" name="profissao" value="" class="required" />
									</li>
								</ul>
								<input type="submit" class="button right" value=" Cadastrar " />
							</fieldset>
							<ul id="bts">
								<li>
									<input type="button" style="margin-right:5px;" class="button-back right" value="Voltar" onclick="location.href='voltar'" />
								</li>
							</ul>
						</form>
					</div><!--fim div inside-->
				</div><!--fim div table-->
				<div class="table-footer"></div>
			</div><!--fim div box-->
		</div><!--fim div box-content-->
	</div><!--fim div dashboard-wrap-->
