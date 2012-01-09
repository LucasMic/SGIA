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
		<h2 class="left">Cadastro de Convênio</h2>
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
									<li>
										<label for="nome">Nome:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="text" style="margin-top:12px;" id="nome" name="nome" value="" class="required" />
									</li>
									<li>
										<label for="desconto">Desconto:</label>&nbsp;&nbsp;
										<input type="text" style="margin-top:12px;" id="desconto" name="desconto" value="" class="required" alt="decimal" /> %	
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
