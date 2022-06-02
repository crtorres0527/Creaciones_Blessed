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
    $this->Cell(80,10,'REPORTE DEL INVENTARIO',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(15,10,'ID',1,0,'C');
    $this->Cell(30,10,'CODIGO',1,0,'C');
    $this->Cell(30,10,'STOCK',1,0,'C');
    $this->Cell(30,10,'SALIDA',1,0,'C');
    $this->Cell(27,10,'ENTRADA',1,0,'C');
    $this->Cell(20,10,'SALDO',1,0,'C');
    $this->Cell(45,10,'IDPRODUCTO',1,1,'C');
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
}

include("cn.php");
$consulta = "SELECT * FROM inventario";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(15,10,$row['idInventario'],1,0,'C');
    $pdf->Cell(30,10,$row['CodigoProducto'],1,0,'C');
    $pdf->Cell(30,10,$row['StockProducto'],1,0,'C');
    $pdf->Cell(30,10,$row['salida'],1,0,'C');
    $pdf->Cell(27,10,$row['Entrada'],1,0,'C');
    $pdf->Cell(20,10,$row['Saldo'],1,0,'C');
    $pdf->Cell(45,10,$row['idProducto'],1,1,'C');
}
$pdf->Output();
?>