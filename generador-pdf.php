<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('logo/logo.png', 10, 10, 30);
        
        // Texto de cabecera
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Il. Municipalidad de Tu Municipio', 0, 1, 'L');
        $this->Cell(0, 10, 'XII Región "Magallanes y Antártica Chilena"', 0, 1, 'L');
        $this->Cell(0, 10, 'D.O.M.', 0, 1, 'L');
        
        // Salto de línea
        $this->Ln(20);
    }
    
    function Content()
    {
        // Contenido de la página
        $this->SetFont('Arial', '', 10);
        $this->SetX(40); // Ajustar la posición horizontal
        
        $this->Cell(10, 10, 'ORD', 0, 0, 'R');
        $this->Cell(10, 10, 'ANT', 0, 0, 'R');
        $this->Cell(10, 10, 'MAT', 0, 0, 'R');
        $this->Cell(10, 10, ':', 0, 0, 'R');
        $this->Ln();
        $this->SetX(40);
        $this->Cell(10, 10, ':', 0, 0, 'R');
        $this->Ln();
        $this->SetX(40);
        $this->Cell(10, 10, ':', 0, 0, 'R');
        $this->Ln();
        $this->SetX(40);
        $this->Cell(10, 10, 'Nº ${secuencial}', 0, 0, 'R');
        $this->Ln();
        $this->SetX(40);
        $this->MultiCell(0, 10, 'Ordenase la demolición dentro del plazo de 30 días del predio construido sin los permisos municipales ubicado en la Calle Arturo Prat 351.', 0, 'L');
        
        // Fecha
        $this->Ln(20);
        $this->Cell(0, 10, 'DE: DOM', 0, 1, 'C');
        
        // Lista de elementos
        $this->Ln(20);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, '1.- Ordenase la demolición dentro del plazo de 30 días del predio construido sin los permisos municipales ubicado en la Calle Arturo Prat 351.', 0, 1, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, '4.- A la espera de una respuesta favorable.', 0, 1, 'L');
        
        // Firmantes
        $this->Ln(20);
        $this->Cell(0, 10, 'Saluda atentamente a Ud.', 0, 1, 'R');
        $this->Cell(0, 10, '${firmante1}', 0, 1, 'R');
        $this->Cell(0, 10, '${firmanteCargo1}', 0, 1, 'R');
        $this->Cell(0, 10, '${firmante2}', 0, 1, 'R');
        $this->Cell(0, 10, '${firmanteCargo2}', 0, 1, 'R');
        
        // Distribución
        $this->SetY(-40);
        $this->Cell(0, 10, 'DISTRIBUCIÓN:', 0, 1, 'L');
        $this->Cell(0, 10, '- DESTINATARIO', 0, 1, 'L');
        $this->Cell(0, 10, '- DAF', 0, 1, 'L');
        $this->Cell(0, 10, '- UNIDAD TÉCNICA (DOM)', 0, 1, 'L');
        $this->Cell(0, 10, '- ARCHIVO', 0, 1, 'L');
        
        // Pie de página
        $this->SetY(-20);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Comuna Tu Municipio', 0, 0, 'L');
    }
}

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->Content();
$pdf->Output();
