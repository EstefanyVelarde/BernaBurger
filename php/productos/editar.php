<?php
	require_once "crud.php";

    $obj = new crud();

	$datos=array(	
		$_POST['nombreEditProd'],	
		$_POST['existEditProd'],
		$_POST['puntoEditProd'],
		$_POST['costoEditProd'],
		$_POST['costoPromEditProd'],
		$_POST['unidadEditProd'],
		$_POST['idproducto']
	);
	
	echo $obj->edit($datos);
?>