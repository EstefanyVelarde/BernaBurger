<?php
	require_once "crud.php";

    $obj = new crud();

	$datos=array(
			
		$_POST['nombreEditCliente'],	
		$_POST['apellidoEditCliente'],
		$_POST['direccionEditCliente'],
		$_POST['telefonoEditCliente'],
		$_POST['correoEditCliente'],
		$_POST['idcliente']
	);

	echo $obj->edit($datos);
?>