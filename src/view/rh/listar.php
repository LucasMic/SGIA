	<div class=" header-content">
    	<h2 class="left">Recursos Humanos</h2>
		<?php
    		require_once VIEW . DS . "default" . DS . "sede.php";
    	?>	
    </div>
     <hr class="mrg-bottom_20"/>
    
    <div class="mrg-bottom_20">
    	<a class="btn_1" href="recursosHumanos/add">cadastrar colaborador</a>
    </div>
	<div id="dashboard-wrap">
		<div class="metabox"></div>
		<div class="clear"> </div>
		<div class="box-content">
			<div class="box">
				<?php
					/**
					 * Persistindo em listar os perfis
					 */	
					try {
						$colaboradores = Colaborador::listar($_SESSION["sede"]);	
						$paginacao = new Paginacao($colaboradores,20);
				?>
				<div class="radius">
                    <table border="0" cellpadding="0" cellspacing="0" width="745">
                    	<thead>
							<tr class="tr-header">
								<th>Nome</th>
								<th>Tipo</th>
								<th>Função</th>
                                <th>Situação</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$count = 0; 
							foreach($paginacao->getDados() as $colaborador){
								if($count % 2 ==	 0){
									$class = "bgcolor='#e6eaec'";
								} else {
									$class = "";
								}
								$count++;
								
						?>
							<tr <?php echo $class; ?> >
								<td width="30%" align="left"><?php echo $colaborador->getNome();?></td>
								<td width="20%" align="left"><?php if($colaborador->getTipo() == 0) { echo "Funcionário"; } else { echo "Estagiário" ;}?></td>
								<td width="10%" align="left"><?php echo $colaborador->getFuncao();?></td>
                                <td width="20%" align="left"><?php if($colaborador->getPendente()==1){ echo "Pendente"; } else { echo "Completo"; }?></td>
								<td width="20%">
									<ul class="action">						
										<li><a href="recursosHumanos/ver/<?php echo $colaborador->getId();?>"><img src="img/btn-visualizar.png" /></a></li> 
										<?php 
											if(Acao::checarPermissao(2,PerfilControll::MODULO)){
										?>
										<li><a href="recursosHumanos/excluir/<?php echo $colaborador->getId();?>"><img src="img/btn-excluir.png" /></a></li>
										<?php 
											}
										?>
									</ul>
								</td>
							</tr>
						<?php 
							}
						?>
						</tbody>
						<tfoot>
							<tr class="tr-footer" height="30">
                                <td>
                                	<ul class="paginacao">
                                        <li class="btn-paginacao ativo">
                                            <?php echo $paginacao->getLinks();?>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr>
						</tfoot>
					</table>
				</div><!--fim div table-->
				<?php 
					}
					catch(ListaVazia $e){
				?>
				<div class="exception">
					<?php echo $e->getMessage();?>
				</div>
				<?php
					}
				?>
			</div> <!--fim div box-->
		</div> <!--fim div box-content-->
	</div><!--fim div dashboard-wrap-->
