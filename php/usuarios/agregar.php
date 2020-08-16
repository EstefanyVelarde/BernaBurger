<?php
	require_once "crud.php";

    $obj = new crud();

	$datos=array(	
		$_POST['usuarioAddUsuario'],	
		$_POST['rolAddUsuario'],
		$_POST['nombreAddUsuario'],
		$_POST['puestoAddUsuario'],
		$_POST['telefonoAddUsuario'],
		$_POST['correoAddUsuario'],
		$_POST['contraAddUsuario']
	);

	echo $obj->add($datos);
?>