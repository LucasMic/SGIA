<?php
include_once('../../../constantes.php');
require_once(LIB . DS . "Autoload.php");
require_once(LIB . DS . "Functions.php");

ini_set("memory_limit","64M");
ini_set("max_execution_time", "3600");

$sede = $_POST['sede'];

try {
    $remuneracoes = Relatorio::relatorioRemuneracao();
} catch (ListaVazia $e) {}

$sedeAtual = $remuneracoes[0]->getColaborador()->getSede()->getNome();

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

$pdf->SetTitle(utf8_decode("Gestor - Relatório de Remuneração"));
$pdf->AddPage('L', 'A4');

$pdf->SetFont('Arial','B',16);
$pdf->SetX(10);
$pdf->Write(5, utf8_decode("Gestor - Relatório de Remuneração"));
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
$pdf->SetX(10);
$pdf->Write(5, utf8_decode('Nome'));
$pdf->SetX(165);
$pdf->Write(5, utf8_decode('Valor'));
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
if ($remuneracoes) {
    foreach ($remuneracoes as $remuneracao) {
        $pdf->SetX(10);
        $pdf->Write(5, utf8_decode($remuneracao->getColaborador()->getNome()));
        $pdf->SetX(165);
        $pdf->Write(5, "R$ " . number_format($remuneracao->getValor(), 2, ",", "."));
        $pdf->Ln();
    }
}


$pdf->Output();
?>