<?php

/**
 * Classe ConcursoControll
 * Controlador do modulo de concurso
 * @package controll
 * @author Idealizza
 */
class ConcursoControll extends Controll {
    /**
     * Constante referente ao número do modulo
     */
    const MODULO = 12;

    /**
     * Acao index()
     */
    public function index() {
        // código da ação //
        static $acao = 1;
        // definindo a tela //
        $this->setTela('consulta', array('concurso'));
        // guardando a url //
        $this->getPage();
    }

    /**
     * Acao index()
     */
    public function consulta() {

        // recenendo os dados
        $dados = $this->getDados('POST');
        $pdf = $dados['pdf'];

        // verificando se foram escolhidas as opções
        if ((!$dados['seps'][0]) || (!$dados['seps'][1]) || (!$dados['params'][0]) || (!$dados['params'][1]) || (!$dados['params'][2])) {
            $this->setFlash('Por favor, verifique as opções escolhidas.');
            $this->setTela('consulta', array('concurso'));
        }

        $buscarPorCpf = false;
        foreach ($dados['params'] as $p) {
            if ($p == 'CPF') {
                $buscarPorCpf = true;
            }
        }

        // fazendo os tratamentos necessarios e quebrando pelos parametros
        $pdf = str_replace("\n", "", $pdf);

        $pessoas = explode($dados['seps'][0], $pdf);

        foreach ($pessoas as $indice => $pessoa) {
            $pessoas[$indice] = trim($pessoa);
        }

        $concurseiros = array();

        foreach ($pessoas as $indice => $pessoa) {
            $concurseiros[] = explode($dados['seps'][1], $pessoa);
        }

        foreach ($concurseiros as $indicePrinc => $concurseiro) {
            foreach ($concurseiro as $indice => $item) {
                $concurseiros[$indicePrinc][$indice] = trim($item);
            }
        }


        // lista os alunos e compara com os concurseiros para retornar
        $aprovados = array();

        $alunos = Aluno::listar($_SESSION['sede']);

        foreach ($alunos as $aluno) {
            foreach ($concurseiros as $concurseiro) {
                foreach ($concurseiro as $item) {
                    if ($buscarPorCpf) {
                        if ($item == $aluno->getCpf()) {
                            $aprovados[] = array($concurseiro[0], $concurseiro[1], $concurseiro[2], $aluno->getId());
                        }
                    } else {
                        if (strtoupper($item) == strtoupper($aluno->getNome())) {
                            $aprovados[] = array($concurseiro[0], $concurseiro[1], $concurseiro[2], $aluno->getId());
                        }
                    }
                }
            }
        }

        // removendo coisas desnecessárias e passando so dados para a view
        unset($dados['pdf']);
        $this->setDados($dados, 'PESQUISA');
        $this->setDados($aprovados, 'APROVADOS');
        $this->setTela('resultado', array('concurso'));
    }

}

?>