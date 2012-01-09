<?php
/**
 * Description of RelatorioControll
 *
 * @author victor
 */
class RelatorioControll extends Controll {

    /**
     * Constante com o número do modulo
     */
    const MODULO = 11;

    /**
     * Acao index()
     */
    public function index(){
        // código da ação //
        static $acao = 1;
        // definindo a tela //
        $this->setTela('index', array('relatorio'));
        // guardando a url //
        $this->getPage();
    }

    public function pagamento(){
        // código da ação //
        static $acao = 1;
        // definindo a tela //
        $this->setTela('index', array('relatorio/pagamento'));
        // guardando a url //
        $this->getPage();
    }

    public function horaExtra(){
        // código da ação //
        static $acao = 1;
        // definindo a tela //
        $this->setTela('index', array('relatorio/horaExtra'));
        // guardando a url //
        $this->getPage();
    }

    public function remuneracao(){
        // código da ação //
        static $acao = 1;
        // definindo a tela //
        $this->setTela('lista', array('relatorio/remuneracao'));
        // guardando a url //
        $this->getPage();
    }

    public function selecionarDados(){
        // código da ação //
        static $acao = 1;
        // definindo a tela //
        $this->setTela('lista', array('relatorio/pagamento'));
        // guardando a url //
        $this->getPage();
    }

    public function selecionarPeriodo(){
        // código da ação //
        static $acao = 1;
        // definindo a tela //
        $this->setTela('lista', array('relatorio/horaExtra'));
        // guardando a url //
        $this->getPage();
    }

    public function periodoRelatorio(){
        // código da ação //
        static $acao = 1;
        // definindo a tela //
        $this->setDados($this->getDados('POST'), 'VIEW');
        $this->setTela('gastoProducaoPorPeriodo', array('relatorio'));
    }

    public function pdfPagamento() {
        // código da ação //
        static $acao = 1;
        // definindo a tela //
        if ($this->getDados('POST')) {
            $this->setTela('listaPdf', array('relatorio/pagamento'));
        }
    }

    public function pdfHoraExtra() {
        // código da ação //
        static $acao = 1;
        // definindo a tela //
        if ($this->getDados('POST')) {
            $this->setTela('listaPdf', array('relatorio/horaExtra'));
        }
    }

    public function pdfRemuneracao() {
        // código da ação //
        static $acao = 1;
        // definindo a tela //
        if ($this->getDados('POST')) {
            $this->setTela('listaPdf', array('relatorio/remuneracao'));
        }
    }
}
?>
