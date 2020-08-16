<?php
	require_once "crud.php";

    $obj = new crud();

	$datos=array(	
		$_POST['nombreAddCliente'],	
		$_POST['apellidoAddCliente'],
		$_POST['direccionAddCliente'],
		$_POST['telefonoAddCliente'],
		$_POST['correoAddCliente']
	);

	echo $obj->add($datos);
?>