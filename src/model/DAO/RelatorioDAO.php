<?php
/**
 * Description of RelatorioDAO
 *
 * @author victor
 */
class RelatorioDAO {

    private static $instancia;
    private $conexao;

    /**
     * Metodo construtor()
     */
    private function __construct() {
        $this->conexao = Connect::getInstancia();
    }

    /**
     * Metodo getInstancia()
     */
    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            self::$instancia = new RelatorioDAO();
        }
        return self::$instancia;
    }

    public function relatorioPagamento ($dataInicio, $dataFim, $tipoPagamento, $sede) {
        $where = "";
        if ($tipoPagamento == "") {
            $where = " ORDER BY p.data";
        } else {
            $where = " AND p.tipo = '" . $tipoPagamento . "' ORDER BY p.data";
        }
        $sql = "SELECT p.*, c.id as cId, c.nome, c.sedes_id FROM pagamentos p INNER JOIN colaboradores c ON (p.colaboradores_id = c.id) WHERE
                (p.data BETWEEN '" . $dataInicio . "' AND '" . $dataFim . "') AND c.sedes_id = '" . $sede . "'" . $where;

        $resultado = $this->conexao->fetchAll($sql);
        return $resultado;
    }

    public function relatorioHoraExtra ($dataInicio, $dataFim, $sede) {
        $sql = "SELECT he.*, c.id as cId, c.nome, c.sedes_id FROM horas_extras he INNER JOIN colaboradores c ON (he.colaboradores_id = c.id) WHERE
                (he.data BETWEEN '" . $dataInicio . "' AND '" . $dataFim . "') AND c.sedes_id = '" . $sede . "'";
       
        $resultado = $this->conexao->fetchAll($sql);
        return $resultado;
    }

    public function relatorioRemuneracao () {
        $sql = "SELECT colaboradores_id FROM salarios GROUP BY colaboradores_id";
        $colaboradores = $this->conexao->fetchAll($sql);

        foreach ($colaboradores as $colaborador) {
            $sql2 = "SELECT * FROM salarios WHERE colaboradores_id = '" .$colaborador['colaboradores_id'] . "' ORDER BY data DESC LIMIT 1";
            $resultado[] = $this->conexao->fetchAll($sql2);
        }

        return $resultado;
    }
    
}
?>
