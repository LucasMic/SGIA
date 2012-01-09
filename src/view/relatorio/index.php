<div class=" header-content">
    <h2 class="left">Relatórios</h2>
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
            <div class="radius">
                <ul class="nav-relatorios">
                    <?php
                        if(Acao::checarPermissao(1,RelatorioControll::MODULO)){
                    ?>
                    <li class="pagamentos">
                        <a href="relatorio/pagamento">Relatório de Pagamentos</a>
                    </li>
                    <?php
                        }
                        if(Acao::checarPermissao(1,RelatorioControll::MODULO)){
                    ?>
                    <li class="hora-extra">
                        <a href="relatorio/horaExtra">Relatório de Horas-Extras</a>
                    </li>
                    <?php
                        }
                        if(Acao::checarPermissao(1,RelatorioControll::MODULO)){
                    ?>
                    <li class="remuneracao">
                        <a href="relatorio/remuneracao">Relatório de Remuneração</a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div> <!--fim div box-->
    </div> <!--fim div box-content-->
</div><!--fim div dashboard-wrap-->