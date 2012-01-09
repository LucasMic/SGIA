<script type="text/javascript">
    $(document).ready(function($){

        $("#imprimir").click(function(){
            document.pdfPagamento.action = "view/relatorio/pagamento/listaPdf.php";
            document.pdfPagamento.method = "post";
            document.pdfPagamento.target = "_blank";
            document.pdfPagamento.submit();
        });

    });

</script>
<div class=" header-content">
    <h2 class="left">Relatório de Pagamentos</h2>
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
            $dataInicio = formataData($_POST['dataInicio']);
            $dataFim = formataData($_POST['dataFim']);
            $tipoPagamento = $_POST['tipoPagamento'];
            $sede = $_SESSION['sede'];
            /**
             * Persistindo em listar os perfis
             */
            try {
                $pagamentos = Relatorio::relatorioPagamento($dataInicio, $dataFim, $tipoPagamento, $sede);
            ?>
            <div class="radius">
                <form name="pdfPagamento" id="pdfPagamento" method="post">
                    <input id="imprimir" type="button" class="button left" value=" Imprimir " title="imprimir" name="imprimir" />
                    <input type="hidden" name="dataInicio" id="dataInicio" value="<?php echo $dataInicio; ?>" />
                    <input type="hidden" name="dataFim" id="dataFim" value="<?php echo $dataFim; ?>" />
                    <input type="hidden" name="tipoPagamento" id="tipoPagamento" value="<?php echo $tipoPagamento; ?>" />
                    <input type="hidden" name="sede" id="sede" value="<?php echo $sede; ?>" />
                    <br /><br /><br />
                    <table border="0" cellpadding="0" cellspacing="0" width="745">
                        <thead>
                            <tr class="tr-header">
                                <th>Data</th>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Tipo de Pagamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            foreach($pagamentos as $pagamento){
                                switch ($pagamento->getTipo()) {
                                    case "0":
                                        $tipo = "Salário";
                                        break;
                                    case "1":
                                        $tipo = "Gratificação";
                                        break;
                                    case "2":
                                        $tipo = "Auxílio Transporte";
                                        break;
                                    case "3":
                                        $tipo = "Auxílio Alimentação";
                                        break;
                                    case "4":
                                        $tipo = "Hora Extra";
                                        break;
                                    default:
                                        break;
                                }

                                if($count % 2 ==	 0){
                                    $class = "bgcolor='#e6eaec'";
                                } else {
                                    $class = "";
                                }
                                $count++;
                            ?>
                                <tr <?php echo $class; ?> >
                                    <td width="15%" align="left">
                                        <?php echo formataData($pagamento->getData());?>
                                    </td>
                                    <td width="40%">
                                        <?php echo $pagamento->getColaborador()->getNome();?>
                                    </td>
                                    <td width="20%">
                                        R$ <?php echo number_format($pagamento->getValor(), 2, ",", "."); ?>
                                    </td>
                                    <td width="20%">
                                        <?php echo $tipo;?>
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