<script type="text/javascript">
$(document).ready(function($){
	$("#confirmarMatricula").click(function(){
        id = $("#idMatricula").val();

        $.get("matricula/confirmarMatricula", {id: id},
        function(data, status){
            if(status == 'success' && $.trim(data) == 'ok') {
                location.reload();                
            } else {
                alert("Não foi possível realizar essa ação");

            }
        });
    });

	$("#regerarMatricula").click(function(){
		idCurso = parseInt($("#idCurso").val());
		idAluno = parseInt($("#idAluno").val());

		$.get("matricula/gerarContratoMatriculaGet", {idCurso: idCurso, idAluno: idAluno},
				function(data, status){                            
					if(status == 'success' ){//&& $.trim(data) == 'ok'
							alert("Contrato gerado com sucesso");
							return true;
						}
					else{
							alert("Falha ao gerar contrato");
							return false;
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
                                
                                <fieldset>
                                    <legend>Dados</legend>
                                    <ul>
                                        <li style="margin-bottom:10px;">
                                            <strong>Curso</strong><br />
                                            <p class="visualizar"><?php echo $matricula->getCursoValores()->getCurso()->getNome();?></p>
                                            
                                        </li>
                                        <li style="margin-bottom:10px;">
                                            <strong>Aluno</strong><br />
                                            <p  class="visualizar"><?php echo $matricula->getAluno()->getNome();?></p>
                                            
                                        </li>
                                        <li style="margin-bottom:10px;">
                                            <strong>Situação</strong><br />
                                            <p class="visualizar">

                                                <?php
                                                    /*if(($matricula->getSituacao() == 0) && ($matricula->getContratoAssinado() == null)) {
                                                        echo"<img src='img/icone-alerta.png' width='16px' height='16px'/>&nbsp;&nbsp;Documentação Pendente<br />";
                                                    }*/
                                                    
                                                    /*if(($matricula->getSituacao() == 0)&& ($matricula->getContratoAssinado() <> null)){                                                        
                                                        echo"<img src='img/icone-alerta.png' width='16px' height='16px'/>&nbsp;&nbsp;Documentação Sob Análise<br />";
                                                    }*/    
                                                    //if((Acao::checarPermissao(7, MatriculaControll::MODULO)) && ($matricula->getContratoAssinado() <> null)){
                                                    if((Acao::checarPermissao(7, MatriculaControll::MODULO)) && ($matricula->getSituacao() == 0)){    
                                                            echo "<input id='confirmarMatricula' style='margin-top:13px;' type='button' class='btn_1' value='Confirmar Matrícula'/>";
                                                            echo "<input id='idMatricula' style='margin-top:13px;' type='hidden' value='".$matricula->getId()."'/>";
                                                    
                                                    } else {
                                                        echo "Matrícula efetuada (autorizada por : <strong>".Usuario::buscar($matricula->getAutorizadoPor())->getLogin()."</strong>)";
                                                    }
                                                ?>
                                            </p>
                                        </li>
                                        <li style="margin-bottom:10px;">
                                            <strong>Formas de Pagamento</strong><br />
                                            <table>
                                                <tr>
                                                    <td>Forma</td>
                                                    <td>Valor</td>
                                                    <td>Quantidade de Parcelas</td>

                                                </tr>
                                                    <?php
                                                    $pagamentos = MatriculaPagamentosFormas::listar($matricula->getId());

                                                    foreach($pagamentos as $pagamento){

                                                        if($pagamento->getPagamentosForma()->getNome() == "Bolsa de estudos"){
                                                        echo "<tr>";
                                                        echo "<td>".$pagamento->getPagamentosForma()->getNome() . "</td><td>" . $pagamento->getValor() . "%</td><td></td>";
                                                        echo "</tr>";
                                                        }
                                                        else{
                                                        echo "<tr>";
                                                        echo "<td>".$pagamento->getPagamentosForma()->getNome() . "</td><td>R$ " . number_format($pagamento->getValor(),2,",", ".") . "</td><td>" . $pagamento->getQuantidaDeParcelas() . "</td>";
                                                        echo "</tr>";
                                                        }
                                                        
                                                        
                                                    }
                                                    ?>
                                            </table>
                                            <ul>
                                                <li>
                                                    <?php
                                                    $pagamentos = MatriculaPagamentosFormas::listar($matricula->getId());

                                                    foreach($pagamentos as $pagamento){

                                                        if ($pagamento->getCaminhoArquivo() != null){
                                                            $download = "<br><strong>Anexo Carta de Crédito</strong><br><a href=". BASE . '/download.php?caminho=anexos/anexosCartaCredito/&file=' . $pagamento->getCaminhoArquivo() ."><input type='button' class='btn_1' style='margin-top:13px;' value='Baixar Anexo Carta de Crédito'/></a>";
                                                        }else{$download = "";}

                                                        if($download != ""){
                                                            echo $download;
                                                        }
                                                    }
                                                    ?>
                                                </li>
                                            </ul>
                                        </li>
                                        <li style="margin-bottom:10px;">
                                            <strong>Valor do Curso</strong><br />
                                            <p class="visualizar">R$ <?php

                                                        //identifica a data em que foi feito a matricula em cursos_valores
                                                        $dataCadastroCurso = CursoValores::buscar($matricula->getCursoValores()->getId())->getData();
                                                        $dataPromocaoCurso = Curso::buscar($matricula->getCursoValores()->getCurso()->getId())->getDataEncerramentoPromocional();

                                                        //if data do cadastro <= a data promocao entao pega o valor da promocao se não pega o valor do curso
                                                        if($dataCadastroCurso<=$dataPromocaoCurso){
                                                            $valor = Curso::buscar($matricula->getCursoValores()->getCurso()->getId())->getValorPromocional();

                                                            //$valor = Curso::buscarValorPromocional($matricula->getCursoValores()->getCurso()->getId())-> ->getValorPromocional();
                                                        }else{
                                                            $valor = Curso::buscar($matricula->getCursoValores()->getCurso()->getId())->getValor();
                                                        }

                                                        echo number_format($valor, 2, ",", ".")

                                                        ?></p> <!--  //echo Curso::buscarValorPromocional($matricula->getCursoValores()->getCurso()->getId());   echo number_format(Curso::buscarValorPromocional($matricula->getCursoValores()->getCurso()->getId()), 2, ",", ".");?></p>-->
                                        </li>

                                        <li style="margin-bottom:10px;">
                                            <?php
                                            //if((Acao::checarPermissao(8, MatriculaControll::MODULO)) && ($matricula->getContratoAssinado() == null)){
                                            if((Acao::checarPermissao(8, MatriculaControll::MODULO))){    
                                                ?>
                                                <strong>Gerar Contrato de Matrícula</strong><br />
                                                <form name='regerarMatricula' method='get' action='matricula/gerarContratoMatriculaGet'>
                                                    <input type='hidden' name='idCurso' id='idCurso' value="<?php echo $matricula->getCursoValores()->getCurso()->getId(); ?>">
                                                    <input type='hidden' name='idAluno' id='idAluno' value="<?php echo $matricula->getAluno()->getId(); ?>">
                                                    <input  type='submit' class='btn_1' value='Gerar contrato de Matrícula'/>
                                                </form>
                                                <?php
                                                }                                              
                                            ?>
                                        </li>
                                        
                                        <!--<li style="margin-bottom:10px;"> 
                                        
                                        <fieldset>
                                            <legend><strong>Anexo do Contrato de Matrícula</strong></legend>                              
                                            <?php
                                            if($matricula->getContratoAssinado() == null){?>
                                            
                                            
                                                <form method='post' name='anexarContratoAssinado' action='matricula/anexarContratoAssinado' enctype='multipart/form-data'>
                                                <input type='hidden' name='id' id='id' value="<?php echo $matricula->getId();?>">
                                                Contrato: <input class='contratoAnexo' type='file' name='contratoAnexo' id='contratoAnexo' size='chars'/><br>
                                                <input  type='submit' class='btn_1' value='Enviar contrato'/></form><?php
                                            } else{
                                                
                                                echo "<a href= ". BASE . "/download.php?caminho=anexos/anexosContratoAssinado/&file=". $matricula->getContratoAssinado() ."><input type='button' class='btn_1' style='margin-top:13px;' value='Download do Contrato ".$matricula->getContratoAssinado()."'/></a>";
                                            }                                           
                                            ?>
                                        </fieldset>
                                        </li>-->
                                        
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
</div><!--fim div wrap-->

