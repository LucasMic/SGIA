	<div class=" header-content">
		<h2 class="left">Cheques</h2>
		<?php
    		require_once VIEW . DS . "default" . DS . "sede.php";
    	?>	
	</div>
	<hr class="mrg-bottom_20"/>
	<div id="dashboard-wrap">
		<div class="metabox"></div>
		<div class="clear"> </div>
		<div class="box-content">
			<div class="box">
				<?php
					/**
					 * Persistindo em listar os usuários
					 */	
					try {
						$cheques = Cheque::listar($_SESSION["sede"]);
						$paginacao = new Paginacao($cheques,20);
				?>
				<div class="radius">
					<table id="lista" border="0" cellpadding="0" cellspacing="0" width="745">
						<thead>
							<tr class="tr-header">
								<th>Número Cheque</th>
								<th>Data</th>
								<th>Vencimento</th>
								<th>Situacao</th>
								<th>Baixado</th>
								<th>Ações </th>
							</tr>
						</thead>
						<tbody>
						<?php
							$count = 0; 
							foreach($paginacao->getDados() as $cheque){
								if($count % 2 ==	 0){
									$class = "bgcolor='#e6eaec'";
								} else {
									$class = "";
								}
								$count++;
						?>
							<tr <?php echo $class; ?> >
								<td align="left"><?php echo $cheque->getNumeroCheque();?></td>
								<td align="left"><?php echo formataData($cheque->getData()); ?></td>
								<td align="left"><?php echo formataData($cheque->getVencimento());?></td>
								<td align="left"><?php echo (($cheque->getSituacao() == 0) ? "Pendente" : "Sem fundos") ;?></td>
								<td align="left"><?php echo (($cheque->getBaixa() == 0) ? "Pendente" : "Baixado") ;?></td>
								<td width="20%">
									<ul class="action">						
										<li><a href="cheque/ver/<?php echo $cheque->getId();?>"><img src="img/btn-visualizar.png" /></a></li> 
										<?php 
											if(Acao::checarPermissao(2,UsuarioControll::MODULO)){
										?>
										<li><a href="cheque/excluir/<?php echo $cheque->getId();?>"><img src="img/btn-excluir.png" /></a></li>
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
                                        <li class="btn-paginacao ativo"><?php echo $paginacao->getLinks();?></li>
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
