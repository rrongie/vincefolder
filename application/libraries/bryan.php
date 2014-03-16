<?php

class bryan extends FPDF
{

// Simple table


function Footer(){
	$this->Ln(60);
	$this->SetFont('Arial','',15);
	$this->Cell(170,10,'Remarks','',0,'L');
	$this->Ln(20);	
	$this->Line(10, 170, 200, 170);
	$this->Ln(60);
	$this->SetFont('Arial','',12);
	$this->Cell(170,10,'Issued By','',0,'L');
	$this->Cell(170,10,'Date','',0,'L');
	$this->Ln(10);
	$this->Cell(10,10,'Vicente Murillo','',0,'e');
}



}


?>