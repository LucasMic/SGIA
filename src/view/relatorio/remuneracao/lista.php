<script type="text/javascript">
    $(document).ready(function($){

        $("#imprimir").click(function(){
            document.pdfRemuneracao.action = "view/relatorio/remuneracao/listaPdf.php";
            document.pdfRemuneracao.method = "post";
            document.pdfRemuneracao.target = "_blank";
            document.pdfRemuneracao.submit();
        });

    });

</script>
<div class=" header-content">
    <h2 class="left">Relatório de Remuneração</h2>
    <?php
    require_once VIEW . DS . "default" . DS . "sede.php";
    ?>
</div>

<div id="dashboard-wrap">
    <div class="metabox"></div>
    <div class="clear"> </div>
    <div class="box-content">
        <div class="box">
            <?php
            //Recebendo os Dados
            $sede = $_SESSION['sede'];
            /**
             * Persistindo em listar os perfis
             */
            try {
                $remuneracoes = Relatorio::relatorioRemuneracao();
            ?>
            <div class="radius">
                <form name="pdfRemuneracao" id="pdfRemuneracao" method="post">
                    <input id="imprimir" type="button" class="button left" value=" Imprimir " title="imprimir" name="imprimir" />
                    <input type="hidden" name="sede" id="sede" value="<?php echo $sede; ?>" />
                    <br /><br /><br />
                    <table border="0" cellpadding="0" cellspacing="0" width="745">
                        <thead>
                            <tr class="tr-header">
                                <th>Nome</th>
                                <th>Salário</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            foreach($remuneracoes as $remuneracao){
                                if($count % 2 ==	 0){
                                    $class = "bgcolor='#e6eaec'";
                                } else {
                                    $class = "";
                                }
                                $count++;
                            ?>
                                <tr <?php echo $class; ?> >
                                    <td width="75%" align="left">
                                        <?php echo $remuneracao->getColaborador()->getNome(); ?>
                                    </td>
                                    <td width="25%">
                                        R$ <?php echo number_format($remuneracao->getValor(), 2, ",", "."); ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <?php
                } catch(ListaVazia $e){
            ?>
            <div class="exception">
                <?php echo $e->getMessage();?>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>