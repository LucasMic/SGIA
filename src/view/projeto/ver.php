<?php
    $projeto = $this->getDados('VIEW');
?>

	<div class=" header-content">
            <h2 class="left">Ver Projeto</h2>
            <?php
                //require_once VIEW . DS . "default" . DS . "sede.php";
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
                                                            <fieldset>
                                                                <legend>Dados</legend>
                                                                    <ul class="list-cadastro">
                                                                        <li style="margin-bottom:10px;">
                                                                            <p><strong>Nome</strong></p>
                                                                            <p class="visualizar">
                                                                                <?php echo $projeto->getNome();?>
                                                                            </p>
									</li>
                                                                        <li style="margin-bottom:10px;">
                                                                            <p><strong>Descrição</strong></p>
                                                                            <p class="visualizar">
                                                                                <?php echo $projeto->getDescricao();?>
                                                                            </p>                                                                            
                                                                        </li>                                                                        
									<li style="margin-bottom:10px;">
                                                                            <p><strong>Introdução</strong></p>
                                                                            <p class="visualizar">
                                                                                <?php echo $projeto->getIntroducao();?>
                                                                            </p>                                                                            
                                                                        </li>
                                                                        <li style="margin-bottom:10px;">
                                                                            <p><strong>Metodologia</strong></p>
                                                                            <p class="visualizar">
                                                                                <?php echo $projeto->getMetodologia();?>
                                                                            </p>                                                                            
                                                                        </li>                                                                        
                                                                        <li style="margin-bottom:10px;">
                                                                            <p><strong>Descrição da área da pesquisa</strong></p>
                                                                            <p class="visualizar">
                                                                                <?php echo $projeto->getDescricaoAreasPesquisa();?>
                                                                            </p>                                                                            
                                                                        </li>
                                                                        
                                                                        <li style="margin-bottom:10px;">
                                                                            <p><strong>Considerações gerais / recomendações</strong></p>
                                                                            <p class="visualizar">
                                                                                <?php echo $projeto->getConsideracoesGeraisRecomendacoes();?>
                                                                            </p>                                                                            
                                                                        </li>
                                                                        
                                                                    </ul>
								</fieldset>								
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
