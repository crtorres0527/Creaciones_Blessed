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
    $this->Cell(80,10,'REPORTE DE PERSONAS',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(10,10,'ID',1,0,'C');
    $this->Cell(30,10,'NOMBRE',1,0,'C');
    $this->Cell(30,10,'APELLIDO',1,0,'C');
    $this->Cell(30,10,'TELEFONO',1,0,'C');
    $this->Cell(45,10,'DIRECCION',1,0,'C');
    $this->Cell(20,10,'IDDOC',1,0,'C');
    $this->Cell(30,10,'NumeroD',1,1,'C');
    
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
$consulta = "SELECT * FROM persona";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(10,10,$row['idPersona'],1,0,'C');
    $pdf->Cell(30,10,$row['Nombre'],1,0,'C');
    $pdf->Cell(30,10,$row['Apellido'],1,0,'C');
    $pdf->Cell(30,10,$row['Telefono'],1,0,'C');
    $pdf->Cell(45,10,$row['Direccion'],1,0,'C');
    $pdf->Cell(20,10,$row['idTipoDocumento'],1,0,'C');
    $pdf->Cell(30,10,$row['NumeroDocumento'],1,1,'C');
}
$pdf->Output();
?>