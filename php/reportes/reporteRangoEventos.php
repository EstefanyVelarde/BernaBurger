<?php
	include 'plantillaEventos.php';
	require_once '../conexion.php';

	$obj = new conectar();
	$con = $obj->conexion();
	
	$sql = "SELECT * FROM evento WHERE edo = 0 AND fecha
       BETWEEN '".$_POST['min']."' AND '".$_POST['max']."';";

	$res = mysqli_query($con, $sql);	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetXY(45,50);
	$pdf->Cell(120,10, $_POST['min'].' - '.$_POST['max'],0,1,'C');
	$pdf->Ln(5);
	$pdf->SetX(40);
	$pdf->Cell(30,6,'IDEVENTO',1,0,'C',1);
	$pdf->Cell(30,6,'CLIENTE',1,0,'C',1);
	$pdf->Cell(40,6,'FECHA',1,0,'C',1);
	$pdf->Cell(30,6,'IMPORTE',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);

	$total = 0;
	
	while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
	{	$pdf->SetX(40);
		$pdf->Cell(30,6,utf8_decode($row['idevento']),1,0,'C');
		$pdf->Cell(30,6,$row['idcliente'],1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['fecha']),1,0,'C');
		$pdf->Cell(30,6,'$'.utf8_decode($row['importe']),1,1,'C');

		$total+=$row['importe'];
	}

	$pdf->Ln(20);

	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(110);
	$pdf->Cell(30,10, 'Total:',0,0,'R');
	$pdf->Cell(30,10,'$'.utf8_decode($total),0,1,'C');




	$pdf->Output();
?>