<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(80,10,'REPORTE DE PEDIDOS FACTURADOS',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(10,10,'ID',1,0,'C');
    $this->Cell(30,10,'CLAVE',1,0,'C');
    $this->Cell(30,10,'PAYPAL',1,0,'C');
    $this->Cell(60,10,'FECHA',1,0,'C');
    $this->Cell(50,10,'CORREO',1,1,'C');
    $this->Cell(35,10,'TOTAL',1,0,'C');
    $this->Cell(30,10,'STATUS',1,1,'C');
}
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}


include("cn.php");
$consulta = "SELECT * FROM pedidocabecera";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(10,10,$row['idPedidoCabecera'],1,0,'C');
    $pdf->Cell(30,10,$row['ClaveTransaccional'],1,0,'C');
    $pdf->Cell(30,10,$row['PaypalDatos'],1,0,'C');
    $pdf->Cell(60,10,$row['Fecha'],1,0,'C');
    $pdf->Cell(50,10,$row['Correo'],1,1,'C');
    $pdf->Cell(35,10,$row['Total'],1,0,'C');
    $pdf->Cell(30,10,$row['Status'],1,1,'C');
}
$pdf->Output();
?>