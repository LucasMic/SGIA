<script type="text/javascript">
	$(document).ready(function($){
		$('form').validate( {
			messages: {
				nome: { required: 'Digite um nome' },
				dataEncerramento: { required: 'Digite uma data' },
				valor: { required: 'Digite um valor' }
			}
		});
	});
</script>
<?php 
	$curso = $this->getDados('VIEW');
?>
<div class="wrap">
		<div class=" header-content">
		<h2 class="left">Editar Curso</h2>
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
						<form method="post" name="editar">
							<input type="hidden" id="id" name="id" value="<?php echo $curso->getId();?>" />
							<fieldset>
								<legend>Dados</legend>
								<ul class="list-cadastro">
									<li>
										<p>Nome</p>
										<input type="text" id="nome" name="nome" value="<?php echo $curso->getNome();?>" class="required" />
									</li>
									<li>
										<p>Data de Encerramento</p>
										<input type="type" id="data_encerramento" name="data_encerramento" value="<?php echo formataData($curso->getDataEncerramento()); ?>" class="required" alt="date"/>
									</li>
									<li>
										<p>Valor</p>
										<input type="type" id="valor" name="valor" value="<?php echo $curso->getValor(); ?>" class="required" alt="decimal"/>
									</li>
								</ul>
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