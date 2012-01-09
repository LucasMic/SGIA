<script type="text/javascript">
$(document).ready(function($){
	
});
</script>
<?php
	$cheque = $this->getDados('VIEW');
?>
<div class="wrap">
	<div class=" header-content">
		<h2 class="left">Ver Cheque</h2>
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
								<form name="editar" method="post" action="cheque/editar/<?php echo $cheque->getId(); ?>">
									<input type="hidden" name="id" id="id" value="<?php echo $cheque->getId(); ?>">
									<fieldset>
										<legend>Dados</legend>
										<ul>
											<li style="margin-bottom:10px;">
												<p><strong>Número do Cheque:</strong></p>
												<p class="visualizar"><?php echo $cheque->getNumeroCheque();?></p>
											</li>
											<li style="margin-bottom:10px;">
												<p><strong>Agência:</strong></p>
												<p class="visualizar"><?php echo $cheque->getAgencia();?></p>
											</li>
											<li style="margin-bottom:10px;">
												<p><strong>Conta:</strong></p>
												<p class="visualizar"><?php echo $cheque->getConta();?></p>
											</li>
											<li style="margin-bottom:10px;">
												<p><strong>Aluno:</strong></p>
												<p class="visualizar"><?php echo Aluno::buscar(Matricula::buscar(MatriculaPagamentosFormas::buscar($cheque->getId())->getMatricula()->getId())->getAluno()->getId())->getNome(); ?></p>
											</li>
											<li style="margin-bottom:10px;">
												<p><strong>Curso:</strong></p>
												<p class="visualizar"><?php echo Curso::buscar(CursoValores::buscar(Matricula::buscar(MatriculaPagamentosFormas::buscar($cheque->getId())->getMatricula()->getId())->getCursoValores()->getId())->getCurso()->getId())->getNome();             ///$cheque->getMatricula()->getCurso()->getNome();?></p>
											</li>
											<li style="margin-bottom:10px;">
												<p><strong>Situação Atual:</strong></p>
												<p class="visualizar"><?php echo (($cheque->getSituacao() == 0) ? "Pendente" : "Sem fundos");?></p>
												<br />
												<a class="btn_1" style="margin-top:10px;" href="cheque/mudarSituacao/<?php echo $cheque->getId(); ?>">Sem Fundos </a>
											</li>
											<li style="margin-bottom:10px;">
												<p><strong>Baixa:</strong></p>
												<p class="visualizar"><?php echo (($cheque->getBaixa() == 0) ? "Pendente" : "Baixado");?></p>
												<br />
												<a class="btn_1" style="margin-top:10px;" href="cheque/darBaixa/<?php echo $cheque->getId(); ?>">Baixar </a>
											</li>
										</ul>
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