	<div class=" header-content">
    	<h2 class="left">Perfis</h2>
    	<?php
                //AQUI SERVE PRA EXIBIR O SELECT DE ACORDO COM A SEDE NO CASO PROJETO
    		//require_once VIEW . DS . "default" . DS . "sede.php";
        
    	?>	
    </div>
     <hr class="mrg-bottom_20"/>
    <div class="mrg-bottom_20">
    	<a class="btn_1" href="perfil/add">cadastrar perfil</a>
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
						//$perfis = Perfil::listar($_SESSION["sede"]); SERVIA PRA PEGAR O PERFIL DE ACORDO COM A SEDE
                                                $perfis = Perfil::listar();
						$paginacao = new Paginacao($perfis,20);
				?>
				<div class="radius">
                    <table border="0" cellpadding="0" cellspacing="0" width="745">
                    	<thead>
							<tr class="tr-header">
								<th>Nome</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$count = 0; 
							foreach($paginacao->getDados() as $perfil){
								if($count % 2 ==	 0){
									$class = "bgcolor='#e6eaec'";
								} else {
									$class = "";
								}
								$count++;
								
						?>
							<tr <?php echo $class; ?> >
								<td width="78%" align="left"><?php echo $perfil->getNome();?></td>
								<td width="20%">
									<ul class="action">						
										<li><a href="perfil/ver/<?php echo $perfil->getId();?>"><img src="img/btn-visualizar.png" /></a></li> 
										<?php 
											if(Acao::checarPermissao(2,PerfilControll::MODULO)){
										?>
										<li><a href="perfil/editar/<?php echo $perfil->getId();?>"><img src="img/btn-editar.png" width="20px" height="20px"/></a></li>
										<li><a href="perfil/excluir/<?php echo $perfil->getId();?>"><img src="img/btn-excluir.png" /></a></li>
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