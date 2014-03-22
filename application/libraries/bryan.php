<?php

class bryan extends FPDF
{

// Simple table


function Footer(){
	$this->Ln(30);
	$this->SetFont('Arial','',15);
	$this->Cell(170,10,'Remarks','',0,'L');
	$this->Ln(20);	
	$this->SetFont('Arial','',12);
	$this->Cell(170,10,'Issued By','',0,'L');
	$this->Ln(10);
	$this->Cell(10,10,'Vicente Murillo','',0,'e');
}



}


?>