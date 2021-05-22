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
    
    $this->Ln(30);
    
    
    $this->Cell(40,6,'Nombre',1,0,'C',0);
	$this->Cell(25,6,'Telefono',1,0,'C',0);
	$this->Cell(50,6,'Correo',1,0,'C',0);
    $this->Cell(40,6,'Fecha',1,0,'C',0);
	$this->Cell(20,6,'Total',1,1,'C',0);
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



require ("../php/conexion.php");
$consulta = "  select ventas.*, cliente.nombre, cliente.telefono, cliente.email
, cliente.pais , cliente.estado   from
ventas 
inner join cliente on ventas.id_cliente = cliente.id
order by id DESC";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('times','',12);

while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(40,6,$row['nombre'],1,0,'C',0);
	$pdf->Cell(25,6,$row['telefono'],1,0,'C',0);
    $pdf->Cell(50,6,$row['email'],1,0,'C',0);
    $pdf->Cell(40,6,$row['fecha'],1,0,'C',0);
    $pdf->Cell(20,6,$row['total'],1,1,'C',0);

} 


	$pdf->Output();
?>