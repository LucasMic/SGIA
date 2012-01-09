<?php
include_once('../../../constantes.php');
require_once(LIB . DS . "Autoload.php");
require_once(LIB . DS . "Functions.php");

ini_set("memory_limit","64M");
ini_set("max_execution_time", "3600");

$dataInicio = $_POST['dataInicio'];
$dataFim = $_POST['dataFim'];
$sede = $_POST['sede'];

try {
    $horaExtra = Relatorio::relatorioHoraExtra($dataInicio, $dataFim, $sede);
} catch (ListaVazia $e) {}

$sedeAtual = $horaExtra[0]->getColaborador()->getSede()->getNome();

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

$pdf->SetTitle(utf8_decode("Gestor - Relatório de Horas-Extra"));
$pdf->AddPage('L', 'A4');

$pdf->SetFont('Arial','B',16);
$pdf->SetX(10);
$pdf->Write(5, utf8_decode("Gestor - Relatório de Horas-Extra"));
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
$pdf->SetX(50);
$pdf->Write(5, utf8_decode('Nome'));
$pdf->SetX(165);
$pdf->Write(5, utf8_decode('Quantidade de Horas'));
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
if ($horaExtra) {
    foreach ($horaExtra as $hora) {
        $pdf->SetX(10);
        $pdf->Write(5, formataData($hora->getData()));
        $pdf->SetX(50);
        $pdf->Write(5, utf8_decode($hora->getColaborador()->getNome()));
        $pdf->SetX(180);
        $pdf->Write(5, $hora->getPendentes() + $hora->getPagas() . " hs");
        $pdf->Ln();
    }
}


$pdf->Output();
?>