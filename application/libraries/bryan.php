<?php

class bryan extends FPDF
{

// Simple table
function Header()
{
    // Logo
	$logo = base_url() . 'assets/images/jcentre_mall_cebu.jpg';
    $this->Image($logo,10,6,50);
     $this->SetFont('Arial','',15);
      $this->Cell(170,10,'Department,','',0,'R');
      $this->Ln(7);
      $this->SetFont('Arial','',12);
      $this->Cell(170,10,'Name','',0,'R');
      $this->Ln(5);
      $this->Cell(170,10,'Id Number','',0,'R');
      $this->Ln(5);
      $this->Cell(170,10,'Date Recieved ','',0,'R');
      $this->Ln(5);
      $this->SetFont('Arial','',10);
      $this->Cell(170,10,'Signature','',0,'R');
      $this->Ln(5);
      $this->Line(10, 48, 195, 48);
      $this->Ln(9);

      $this->Cell(145,12,'Accountability Form','',0,'L');
      $this->Cell(40,12, "".date('F d, y'),'',0,'R');

      $this->Line(10, 55, 195, 55);

           $this->Ln(15);
      
}


function Footer(){
	$this->Ln(60);
	$this->SetFont('Arial','',15);
	$this->Cell(170,10,'Remarks','',0,'L');
	$this->Ln(20);	
	$this->Line(10, 170, 200, 170);
	$this->Ln(60);
	$this->SetFont('Arial','',12);
	$this->Cell(170,10,'Signature','',0,'L');
	$this->Cell(170,10,'Date','',0,'L');
	$this->Ln(10);
	$this->Cell(10,10,'Bryan Bojorque','',0,'e');
}



}


?>