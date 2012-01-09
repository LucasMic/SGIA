<?php
include_once('../../../constantes.php');
require_once(LIB . DS . "Autoload.php");
require_once(LIB . DS . "Functions.php");

ini_set("memory_limit","64M");
ini_set("max_execution_time", "3600");

$dataInicio = $_POST['dataInicio'];
$dataFim = $_POST['dataFim'];
$tipoPagamento = $_POST['tipoPagamento'];
$sede = $_POST['sede'];

try {
    $pagamentos = Relatorio::relatorioPagamento($dataInicio, $dataFim, $tipoPagamento, $sede);
} catch (ListaVazia $e) {}

$sedeAtual = $pagamentos[0]->getColaborador()->getSede()->getNome();
class PDF extends FPDF{

    function Footer() {
        //Position at 1.5 cm from bottom
        $this->SetY(-15);
        $this->SetX(250);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        //Page number
        $this->Write(5, date("d/m/Y H:i:s"));
        $this->SetX(125);
        $this->Write(5, utf8_decode('Página ' . $this->PageNo()));
    }

}

$pdf = new PDF();

$pdf->SetTitle(utf8_decode("Gestor - Relatório de Pagamentos"));
$pdf->AddPage('L', 'A4');

$pdf->SetFont('Arial','B',16);
$pdf->SetX(10);
$pdf->Write(5, utf8_decode("Gestor - Relatório de Pagamentos"));
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Write(5, utf8_decode('Sede: ' . utf8_decode($sedeAtual)));
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Write(5, utf8_decode('Data: ' . date("d/m/Y")));
$pdf->Ln();
$pdf->SetY(40);
$pdf->SetFont('Arial','B',13);
$pdf->Ln(10);
$pdf->Write(5, utf8_decode('Data'));
$pdf->SetX(65);
$pdf->Write(5, utf8_decode('Nome'));
$pdf->SetX(145);
$pdf->Write(5, utf8_decode('Valor'));
$pdf->SetX(200);
$pdf->Write(5, utf8_decode('Tipo de Pagamento'));
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
if ($pagamentos) {
    foreach ($pagamentos as $pagamento) {
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
        $pdf->SetX(10);
        $pdf->Write(5, formataData($pagamento->getData()));
        $pdf->SetX(65);
        $pdf->Write(5, utf8_decode($pagamento->getColaborador()->getNome()));
        $pdf->SetX(145);
        $pdf->Write(5, "R$ " . number_format($pagamento->getValor(), 2, ",", "."));
        $pdf->SetX(200);
        $pdf->Write(5, utf8_decode($tipo));
        $pdf->Ln();
    }
}


$pdf->Output();
?>