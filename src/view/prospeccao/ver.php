<?php
$prospeccao = $this->getDados('VIEW');
?>

	<div class=" header-content">
            <h2 class="left">Ver Prospecção</h2>            
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
                                                                            <p><strong>Elevação</strong></p>
                                                                            <p class="visualizar">
                                                                                <?php echo $prospeccao->getElevacao();?>
                                                                            </p>
									</li>
                                                                        <li style="margin-bottom:10px;">
                                                                            <p><strong>Latitude</strong></p>
                                                                            <p class="visualizar">
                                                                                <?php echo $prospeccao->getCoordenada_UTM_N();?>
                                                                            </p>                                                                            
                                                                        </li>                                                                        
									<li style="margin-bottom:10px;">
                                                                            <p><strong>Longitude</strong></p>
                                                                            <p class="visualizar">
                                                                                <?php echo $prospeccao->getCoordenada_UTM_E();?>
                                                                            </p>                                                                            
                                                                        </li>
                                                                        <li style="margin-bottom:10px;">
                                                                            <p><strong>Ponto de</strong></p>
                                                                            <p class="visualizar">
                                                                                <?php if($prospeccao->getPontoDe()==1){echo"Caminhamento";}else{echo"Sondagem";}?>
                                                                            </p>                                                                            
                                                                        </li>                                                                        
                                                                        <li style="margin-bottom:10px;">
                                                                            <p><strong>Observação</strong></p>
                                                                            <p class="visualizar">
                                                                                <?php echo $prospeccao->getObs();?>
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
