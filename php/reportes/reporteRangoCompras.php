<?php
	include 'plantillaCompras.php';
	require_once '../conexion.php';

	$obj = new conectar();
	$con = $obj->conexion();
	
	$sql = "SELECT * FROM compra WHERE edo = 0 AND fecha
       BETWEEN '".$_POST['min']."' AND '".$_POST['max']."';";


	$res = mysqli_query($con, $sql);	
	
	$pdf = new PDF('L');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetXY(85,50);
	$pdf->Cell(120,10, $_POST['min'].' - '.$_POST['max'],0,1,'C');
	$pdf->Ln(5);
	$pdf->Cell(10,6,'#',1,0,'C',1);
	$pdf->Cell(30,6,'USUARIO',1,0,'C',1);
	$pdf->Cell(40,6,'FECHA',1,0,'C',1);
	$pdf->Cell(30,6,'PROVEEDOR',1,0,'C',1);
	$pdf->Cell(30,6,'TIPO',1,0,'C',1);
	$pdf->Cell(30,6,'STATUS',1,0,'C',1);
	$pdf->Cell(30,6,'SUBTOTAL',1,0,'C',1);
	$pdf->Cell(30,6,'IVA',1,0,'C',1);
	$pdf->Cell(30,6,'IMPORTE',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);

	$total = 0;
	
	while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
	{	
		$pdf->Cell(10,6,utf8_decode($row['idcompra']),1,0,'C');
		$pdf->Cell(30,6,$row['usuario'],1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['fecha']),1,0,'C');
		$pdf->Cell(30,6,$row['idproveedor'],1,0,'C');
		$pdf->Cell(30,6,$row['tipo'],1,0,'C');
		$pdf->Cell(30,6,$row['status'],1,0,'C');
		$pdf->Cell(30,6,$row['subtotal'],1,0,'C');
		$pdf->Cell(30,6,$row['iva'],1,0,'C');
		$pdf->Cell(30,6,'$'.utf8_decode($row['total']),1,1,'C');

		$total+=$row['total'];
	}

	$pdf->Ln(20);

	$pdf->SetFont('Arial','B',12);
	$pdf->SetX(210);
	$pdf->Cell(30,10, 'Total:',0,0,'R');
	$pdf->Cell(30,10,'$'.utf8_decode($total),0,1,'C');




	$pdf->Output();
?>