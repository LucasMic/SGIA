<?php
/**
 * Description of Relatorio
 *
 * @author victor
 */
class Relatorio {

    public function relatorioPagamento ($dataInicio, $dataFim, $tipoPagamento, $sede) {
        $instancia = RelatorioDAO::getInstancia();
        $pagamentos = $instancia->relatorioPagamento($dataInicio, $dataFim, $tipoPagamento, $sede);

        if (!$pagamentos) {
            throw new ListaVazia(ListaVazia::RELATORIOS);
        }

        foreach ($pagamentos as $pagamento) {
            $objetos[] = new Pagamento($pagamento['id'], $pagamento['data'], $pagamento['descricao'], $pagamento['valor'], $pagamento['tipo'], null, Colaborador::buscar($pagamento['colaboradores_id']));
        }
        return $objetos;
    }

    public function relatorioHoraExtra ($dataInicio, $dataFim, $Sede) {
        $instancia = RelatorioDAO::getInstancia();
        $horaExtra = $instancia->relatorioHoraExtra($dataInicio, $dataFim, $Sede);

        if (!$horaExtra) {
            throw new ListaVazia(ListaVazia::RELATORIOS);
        }
       
        foreach ($horaExtra as $hora) {
            $objetos[] = new HoraExtra($hora['id'], $hora['data'], $hora['pendentes'], $hora['pagas'], Colaborador::buscar($hora['colaboradores_id']));
        }
        return $objetos;
    }

    public function relatorioRemuneracao () {
        $instancia = RelatorioDAO::getInstancia();
        $remuneracao = $instancia->relatorioRemuneracao();

        if (!$remuneracao) {
            throw new ListaVazia(ListaVazia::RELATORIOS);
        }

        foreach ($remuneracao as $campo) {
            $objetos[] = new Remuneracao($campo[0]['id'], $campo[0]['data'], $campo[0]['valor'], Colaborador::buscar($campo[0]['colaboradores_id']));
        }
        return $objetos;
    }

}
?>
