	<div class=" header-content">
		<h2 class="left">Matrículas</h2>
		<?php
    		require_once VIEW . DS . "default" . DS . "sede.php";
    	?>	
	</div>
	<hr class="mrg-bottom_20"/>
	 <div class="mrg-bottom_20">
    	<a class="btn_1" href="matricula/add">cadastrar matrícula</a>
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
						$matriculas = Matricula::listar($_SESSION["sede"]);
						$paginacao = new Paginacao($matriculas,20);
				?>
				<div class="radius">
					<table id="lista" border="0" cellpadding="0" cellspacing="0" width="745">
						<thead>
							<tr class="tr-header">
								<th>Aluno</th>
								<th>Curso</th>
								<th>Situação</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$count = 0; 
							foreach($paginacao->getDados() as $matricula){
								if($count % 2 ==	 0){
									$class = "bgcolor='#e6eaec'";
								} else {
									$class = "";
								}
								$count++;
						?>
							<tr <?php echo $class; ?> >
								<td width="30%" align="left"><?php echo $matricula->getAluno()->getNome();?></td>
								<td width="20%" align="left"><?php echo $matricula->getCurso()->getNome(); ?></td>
								<td width="30%" align="left"><?php echo (($matricula->getSituacao() == 0) ? "<img src='img/icone-alerta.png' width='16px' height='16px'/>&nbsp;&nbsp;Documentação Sob Análise" : "Matrícula Efetuada") ; ?></td>
								<td width="20%">
									<ul class="action">						
										<li><a href="matricula/ver/<?php echo $matricula->getId();?>"><img src="img/btn-visualizar.png" /></a></li> 
										<?php 
											if(Acao::checarPermissao(2,MatriculaControll::MODULO)){
										?>
										<li><a href="matricula/excluir/<?php echo $matricula->getId();?>"><img src="img/btn-excluir.png" /></a></li>
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
