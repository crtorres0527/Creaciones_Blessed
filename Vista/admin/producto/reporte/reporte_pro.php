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
    $this->Cell(80,10,'REPORTE DE PRODUCTOS',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(20,10,'ID',1,0,'C');
    $this->Cell(60,10,'NOMBRE',1,0,'C');
    $this->Cell(30,10,'PRECIO',1,0,'C');
    $this->Cell(30,10,'CODIGO',1,0,'C');
    $this->Cell(30,10,'CLAS',1,0,'C');
    $this->Cell(25,10,'UNIDAD',1,1,'C');
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
$consulta = "SELECT * FROM producto";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(20,10,$row['idProducto'],1,0,'C');
    $pdf->Cell(60,10,$row['NombreP'],1,0,'C');
    $pdf->Cell(30,10,$row['Precio'],1,0,'C');
    $pdf->Cell(30,10,$row['Codigo'],1,0,'C');
    $pdf->Cell(30,10,$row['idClasificacion'],1,0,'C');
    $pdf->Cell(25,10,$row['Unidad'],1,1,'C');
}
$pdf->Output();
?>