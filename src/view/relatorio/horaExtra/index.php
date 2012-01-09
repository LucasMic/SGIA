<script type="text/javascript">

    function validarCamposObrigatorios(){
        if(($.trim($("#dataInicio").val()) == '') || ($.trim($("#dataFim").val()) == '')){
            alert("Preencha todos os campos.");
            return false;
        }
        return true;
    }

</script>
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
            <div class="table">
                <div class="inside">
                    <fieldset>
                        <legend>Selecionar Dados</legend>
                        <form name="selecionarPeriodo" id="selecionarPeriodo" method="post" action="relatorio/selecionarPeriodo" onsubmit="return validarCamposObrigatorios();">
                            <ul>
                                <li>
                                    <ul>
                                        <li>
                                            <label for="dataInicio">Data Início</label>
                                        </li>
                                        <li>
                                            <input type="text" name="dataInicio" id="dataInicio" alt="date" />
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li>
                                            <label for="dataFim">Data Fim</label>
                                        </li>
                                        <li>
                                            <input type="text" name="dataFim" id="dataFim" alt="date" />
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li>
                                            <input id="ok" type="submit" class="button left" value=" OK " name="ok" />
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div> <!--fim div box-->
    </div> <!--fim div box-content-->
</div><!--fim div dashboard-wrap-->