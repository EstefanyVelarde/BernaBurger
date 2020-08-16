<?php
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../../img/BBL.png', 80, 5, 50 );
			$this->SetFont('Arial','B',15);
			$this->SetXY(45,40);
			$this->Cell(120,10, 'Reporte De Eventos',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>