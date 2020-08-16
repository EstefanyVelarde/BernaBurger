<?php
	include 'plantillaProductos.php';
	require_once '../conexion.php';

	$obj = new conectar();
	$con = $obj->conexion();
	
	$sql = "SELECT * FROM producto where edo = 0";

	$res = mysqli_query($con, $sql);	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(15);
	$pdf->Cell(10,6,'#',1,0,'C',1);
	$pdf->Cell(40,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(20,6,'EXIST',1,0,'C',1);
	$pdf->Cell(20,6,'P/R',1,0,'C',1);
	$pdf->Cell(30,6,'COSTO',1,0,'C',1);
	$pdf->Cell(30,6,'COSTOPROM',1,0,'C',1);
	$pdf->Cell(30,6,'UNIDAD',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);

	$total = 0;
	
	while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
	{	$pdf->SetX(15);
		$pdf->Cell(10,6,utf8_decode($row['idproducto']),1,0,'C');
		$pdf->Cell(40,6,$row['nombre'],1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['exist']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['punto']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['costo']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['costoProm']),1,0,'C');
		$pdf->Cell(30,6,'$'.utf8_decode($row['unidad']),1,1,'C');
	}



	$pdf->Output();
?>