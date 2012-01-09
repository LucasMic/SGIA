<?php
// recebendo os dados do controlador
$aprovados = $this->getDados('APROVADOS');
$pesquisa = $this->getDados('PESQUISA');
?>
<div class=" header-content">
    <h2 class="left">Concursos</h2>
    <?php
    require_once VIEW . DS . "default" . DS . "sede.php";
    ?>
</div>
<hr class="mrg-bottom_20"/>
<div class="mrg-bottom_20">
</div>
<div id="dashboard-wrap">
    <div class="metabox"></div>
    <div class="clear"> </div>
    <div class="box-content">
        <div class="box">
            <h3 style="font-family: 'ArialRoundedMTBoldRegular'; font-size:22px; color:#5b656a; padding-top:8px;" class="mrg-bottom_20">Resultado</h3>
            <?php
            if ($aprovados) {
                $total = count($aprovados);
            ?>
            <h4 style="float: right;">Total de Aprovados = <?php echo $total; ?></h4>
            <br/>
                <div class="radius">
                    <table id="lista" border="0" cellpadding="0" cellspacing="0" width="745">
                        <thead>
                            <tr class="tr-header">
                                <th><?php echo $pesquisa['params'][0]; ?></th>
                                <th><?php echo $pesquisa['params'][1]; ?></th>
                                <th><?php echo $pesquisa['params'][2]; ?></th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count = 0;
                        foreach ($aprovados as $aprovado) {
                            $aluno = Aluno::buscar($aprovado[3]);
                            if ($count % 2 == 0) {
                                $class = "bgcolor='#e6eaec'";
                            } else {
                                $class = "";
                            }
                            $count++;
                        ?>
                            <tr <?php echo $class; ?> >
                                <td width="30%" align="left"><?php echo $aprovado[0]; ?></td>
                                <td width="30%" align="left"><?php echo $aprovado[1]; ?></td>
                                <td width="30%" align="left"><?php echo $aprovado[2]; ?></td>
                                <td width="5%">
                                    <ul class="action">
                                        <li><a href="aluno/ver/<?php echo $aluno->getId(); ?>"><img src="img/btn-visualizar.png" /></a></li>
                                    </ul>
                            </td>
                        </tr>
                        <?php
                                }
                        ?>
                            </tbody>
                            <tfoot>
                                <tr class="tr-footer" height="30">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!--fim div table-->
            <?php
                            } else {
            ?>
                                <div class="exception">
                                    <p>Nenhum aluno aprovado.</p>
                                </div>
            <?php
                            }
            ?>

        </div> <!--fim div box-->
    </div> <!--fim div box-content-->
</div><!--fim div dashboard-wrap-->
