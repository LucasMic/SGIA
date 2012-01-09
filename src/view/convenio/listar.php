	<div class=" header-content">
		<h2 class="left">Convênios</h2>
		<?php
    		require_once VIEW . DS . "default" . DS . "sede.php";
    	?>	
	</div>
	<hr class="mrg-bottom_20"/>
	 <div class="mrg-bottom_20">
    	<a class="btn_1" href="convenio/add">cadastrar convênio</a>
    </div>
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
						$convenios = Convenio::listar($_SESSION["sede"]);
						$paginacao = new Paginacao($convenios,20);
				?>
				<div class="radius">
					<table id="lista" border="0" cellpadding="0" cellspacing="0" width="745">
						<thead>
							<tr class="tr-header">
								<th>Nome</th>
								<th>Desconto</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$count = 0; 
							foreach($paginacao->getDados() as $convenio){
								if($count % 2 ==	 0){
									$class = "bgcolor='#e6eaec'";
								} else {
									$class = "";
								}
								$count++;
						?>
							<tr <?php echo $class; ?> >
								<td width="50%" align="left"><?php echo $convenio->getNome();?></td>
								<td width="20%" align="left"><?php echo $convenio->getDesconto(); ?> %</td>
								<td width="20%">
									<ul class="action">						
										<li><a href="convenio/ver/<?php echo $convenio->getId();?>"><img src="img/btn-visualizar.png" /></a></li> 
										<?php 
											if(Acao::checarPermissao(2,UsuarioControll::MODULO)){
										?>
										<li><a href="convenio/excluir/<?php echo $convenio->getId();?>"><img src="img/btn-excluir.png" /></a></li>
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
