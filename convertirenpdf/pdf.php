<?php

require "fpdflib/fpdf.php";

class monPDF extends FPDF{
    function header(){
        $this->Image('judomoirans.png', 10,20, 40, 40);
        // Select Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Framed title
        $this->Cell(276,10,utf8_decode('FORMULAIRE D\'ADHÉSION'),1,0,'C');
        // Line break
        $this->Ln(20);
    }
    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-10);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print centered page number
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
    function headerTable(){
        $this->SetY(60);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(40,10,'Nom',1,0,'C');
        $this->Cell(40,10,utf8_decode('Prénom'),1,0,'C');
        $this->Cell(50,10,utf8_decode('Téléphone'),1,0,'C');
        $this->Cell(80,10,'Adresse e-mail',1,0,'C');
        $this->Ln();
        $this->Cell(40,10,$_POST['nom'],1,0,'C');
        $this->Cell(40,10,$_POST['prenom'],1,0,'C');
        $this->Cell(50,10,$_POST['tel'],1,0,'C');
        $this->Cell(80,10,$_POST['mail'],1,0,'C');
    }
}

$pdf = new monPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->Output();

?>