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
	$curso = $this->getDados('VIEW');
?>
<div class="wrap">
	<div class=" header-content">
		<h2 class="left">Ver Curso</h2>
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
								<form name="editar" method="post" action="curso/editar/<?php echo $curso->getId(); ?>">
									<input type="hidden" name="id" id="id" value="<?php echo $curso->getId(); ?>">
									<fieldset>
										<legend>Dados</legend>
										<?php 
										if(Acao::checarPermissao(2,CursoControll::MODULO)){
											?>
											<span><img title="editar" src="img/btn-editar.png" id="editar" style="float:right;" /></span>
											<?php 
										}
										?>
										<ul>
											<li style="margin-bottom:10px;">
												<strong>Nome</strong><br />
												<p class="visualizar"><?php echo $curso->getNome();?></p>
												<input type="text" id="nome" name="nome" value="<?php echo $curso->getNome();?>" class="editar">
											</li>
											<li style="margin-bottom:10px;">
												<strong>Data Encerramento</strong><br />
												<p class="visualizar"><?php echo formataData($curso->getDataEncerramento());?></p>
												<input type="text" id="data_encerramento" name="data_encerramento" value="<?php echo formataData($curso->getDataEncerramento());?>" class="editar" alt="date">
											</li>
											<li style="margin-bottom:10px;">
												<strong>Valor</strong><br />
												<p class="visualizar"><?php echo number_format($curso->getValor(), 2, ",", ".");?></p>
												<input type="text" class="editar" alt="decimal"  id="valor" name="valor" value="<?php echo number_format($curso->getValor(), 2, ",", "."); ?>" >
											</li>
                                            <li style="margin-bottom:10px;">
												<strong>Data Encerramento Promocional</strong><br />
												<p class="visualizar"><?php echo formataData($curso->getDataEncerramentoPromocional());?></p>
												<input type="text" id="data_encerramento_promocional" name="data_encerramento_promocional" value="<?php echo formataData($curso->getDataEncerramentoPromocional());?>" class="editar" alt="date">
											</li>
											<li style="margin-bottom:10px;">
												<strong>Valor Promocional</strong><br />
												<p class="visualizar"><?php echo number_format($curso->getValorPromocional(), 2, ",", ".");?></p>
												<input type="text" class="editar" alt="decimal" id="valor" name="valor_promocional" value="<?php echo number_format($curso->getValorPromocional(), 2, ",", "."); ?>" >
											</li>
                                            <li>
                                                <p><strong>Convênios Cadastrados</strong></p>
                                                <?php
                                                    try{
                                                        $convenios = Convenio::listar($curso->getId());
                                                        foreach($convenios as $convenio){
                                                            echo "<br />";
                                                            echo "<hr></hr>";
                                                            echo "<p><strong>Nome: </strong>" . $convenio->getNome() . "</p>";
                                                            echo "<p><strong>Valor: </strong>" . $convenio->getDesconto() . "</p>";
                                                            echo "<br />";
                                                        }


                                                    }catch(ListaVazia $e){}
                                                ?>

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