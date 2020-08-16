<?php
	require_once "crud.php";

    $obj = new crud();

	$datos=array(	
		$_POST['rolEditUsuario'],
		$_POST['nombreEditUsuario'],
		$_POST['puestoEditUsuario'],
		$_POST['telefonoEditUsuario'],
		$_POST['correoEditUsuario'],
		$_POST['contraEditUsuario'],
		$_POST['usuarioEditUsuario'],
	);

	echo $obj->edit($datos);
?>