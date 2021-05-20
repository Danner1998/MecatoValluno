<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
    // Logo
    $this->Image('https://raw.githubusercontent.com/Danner1998/MecatoValluno/main/images/detalles-empresariales.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    #$this->Cell(60);
    // T�tulo
    $this->Cell(0,10,'Mecato Valluno',0,0,'C');
    // Salto de l�nea
    
    $this->Ln(20);
}

// Pie de p�gina
function Footer()
{
    // Posici�n: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // N�mero de p�gina
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',1,0,'C');
}
}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=100;$i++)
    $pdf->Cell(0,10,'Imprimiendo l�nea n�mero '.$i,0,1);
$pdf->Output();


?>