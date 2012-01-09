<script type="text/javascript">
$(document).ready(function($){
	$("#confirmarMatricula").click(function(){
        id = $("#id").val();
        $.get("matricula/confirmarMatricula", {id: id},
        function(data, status){
            if(status == 'success' && $.trim(data) == 'ok') {
                alert("Matrícula Confirmada com sucesso");
                alert(data);
            } else {
                alert("Não foi possível realizar essa ação");
                alert(data);
            }

        });

    });
	
});
</script>
<?php
	$matricula = $this->getDados('VIEW');
?>
<div class="wrap">
	<div class=" header-content">
		<h2 class="left">Ver Matrícula</h2>
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
								<form name="editar" method="post" action="matricula/editar/<?php echo $matricula->getId(); ?>">
									<input type="hidden" name="id" id="id" value="<?php echo $matricula->getId(); ?>">
									<fieldset>
										<legend>Dados</legend>
										<ul>
											<li style="margin-bottom:10px;">
												<strong>Curso</strong><br />
												<p class="visualizar"><?php echo $matricula->getCurso()->getNome();?></p>
											</li>
											<li style="margin-bottom:10px;">
												<strong>Aluno</strong><br />
												<p class="visualizar"><?php echo $matricula->getAluno()->getNome();?></p>
											</li>
											<li style="margin-bottom:10px;">
												<strong>Situação</strong><br />
                                                <p class="visualizar">
                                                    <?php
                                                        if($matricula->getSituacao() == 0) {
                                                            echo "<img src='img/icone-alerta.png' width='16px' height='16px'/>&nbsp;&nbsp;Documentação Sob Análise<input id='confirmarMatricula' style='margin-top:13px;' type='button' class='btn_1' value='Confirmar Matrícula'/>";
                                                        } else {
                                                            echo "Matrícula Efetuada";
                                                        }
                                                    ?>
                                                </p>
											</li>
											<li style="margin-bottom:10px;">
												<strong>Forma de Pagamento</strong><br />
												<p class="visualizar"><?php echo $matricula->getFormaPagamento()->getNome();?></p>
											</li>
											<li style="margin-bottom:10px;">
												<strong>Parcelas</strong><br />
												<p class="visualizar"><?php echo $matricula->getParcelas();?></p>
											</li>
											<li style="margin-bottom:10px;">
												<strong>Valor</strong><br />
												<p class="visualizar">R$ <?php echo $matricula->getValor();?></p>
											</li>
											<li style="margin-bottom:10px;">
												<strong>Descontos</strong><br />
												<?php 
													try{
														$desconto = Matricula::buscarDesconto($matricula->getId());
														echo "Valor do desconto: ". $deconto->getValor();
														echo "<br />";
														echo "Autorizado por: ". $deconto->getNome();
													}catch(RegistroNaoEncontrado $e){
														echo "Essa matrícula não possui descontos.";
													}
												?>
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