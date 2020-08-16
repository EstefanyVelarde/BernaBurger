<?php
	require_once "crud.php";

    $obj = new crud();

	$datos=array(	
		$_POST['contactoAddProv'],	
		$_POST['empresaAddProv'],
		$_POST['direccionAddProv'],
		$_POST['telefonoAddProv'],
		$_POST['correoAddProv'],
		$_POST['codigoAddProv'],
		$_POST['rfcAddProv']
	);
	
	echo $obj->add($datos);
?>