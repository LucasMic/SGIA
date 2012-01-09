<script type="text/javascript">
    $(document).ready(function(){
        $(".excluir").click(function(){
            if(confirm("Você tem certeza que deseja excluir esse registro? Essa operação não poderá ser desfeita.")){
                return true;
            } else {
                return false;
            }
        });

        $("#curso, #status").change(function(){
            $("#filtros").submit();
        });
    });

</script>
<?php
if(isset($_GET["curso"]) && $_GET['curso'] != 0){
    $filtroCurso = $_GET["curso"];
} else {
    $filtroCurso = "";
}

if(isset($_GET["status"])){
    $filtroStatus = $_GET["status"];
} else {
    $filtroStatus = "";
}


?>
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
             <form id="filtros" name="filtros" method="get">
                    <select id="curso" name="curso">
                        <option value="0">Todos os Cursos</option>
                        <?php
                            try{
                                $cursos = Curso::listar();
                                foreach($cursos as $curso){
                                    if($filtroCurso == $curso->getId()){
                                        $selected = "selected='selected'";
                                    } else {
                                        $selected = "";
                                    }
                                    ?>
                                    <option value="<?php echo $curso->getId(); ?>" <?php echo $selected; ?>><?php echo $curso->getNome(); ?></option>
                                    <?php
                                }
                            }catch(ListaVazia $e){}
                        ?>
                    </select>
                    <select id="status" name="status">
                        <option value="" <?php echo ($filtroStatus == "") ? "selected='selected'" : ""; ?>>Todos os Status</option>
                        <option value="0" <?php echo ($filtroStatus == "0") ? "selected='selected'" : ""; ?>>Matricula pendente de confirmação</option>
                        <option value="1" <?php echo ($filtroStatus == "1") ? "selected='selected'" : ""; ?>>Matriculado</option>
                        <option value="2" <?php echo ($filtroStatus == "2") ? "selected='selected'" : ""; ?>>Cancelada</option>
                    </select>
                </form>
			<div class="box">
				<?php
					/**
					 * Persistindo em listar os usuários
					 */	
					try {
						$matriculas = Matricula::listar($filtroCurso, $filtroStatus);	
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
								<td width="20%" align="left"><?php echo $matricula->getcursoValores()->getCurso()->getNome(); ?></td>
								<td width="30%" align="left">
                                
                                <?php   if(($matricula->getSituacao() == 0)){
                                            echo"<img src='img/icone-alerta.png' width='16px' height='16px'/>&nbsp;&nbsp;Matricula pendente de confirmação<br />";
                                        }
                                        elseif(($matricula->getSituacao() == 1)){                                            
                                            echo"Matrícula Efetuada";
                                        }
                                        else{
                                            echo"<img src='img/icone-alerta.png' width='16px' height='16px'/>&nbsp;&nbsp;Matrícula cancelada<br />";
                                        }                                
                                        //echo ((($matricula->getSituacao() == 0)&&($matricula->getContratoAssinado() == null)) ? "<img src='img/icone-alerta.png' width='16px' height='16px'/>&nbsp;&nbsp;Documentação Sob Análise" : "Matrícula Efetuada") ; 
                                ?>
                                        
                                </td>
                                        
								<td width="20%">
									<ul class="action">						
										<li><a href="matricula/ver/<?php echo $matricula->getId();?>"><img src="img/btn-visualizar.png" /></a></li> 
										<?php 
											if(Acao::checarPermissao(2,MatriculaControll::MODULO)){
										?>
										<li><a class="excluir" href="matricula/excluir/<?php echo $matricula->getId();?>"><img src="img/btn-excluir.png" /></a></li>
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
