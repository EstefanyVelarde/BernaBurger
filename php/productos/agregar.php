<?php
	require_once "crud.php";

    $obj = new crud();

	$datos=array(	
		$_POST['nombreAddProd'],	
		$_POST['existAddProd'],
		$_POST['puntoAddProd'],
		$_POST['costoAddProd'],
		$_POST['costoPromAddProd'],
		$_POST['unidadAddProd']
	);
	
	echo $obj->add($datos);
?>