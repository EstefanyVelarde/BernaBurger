<?php
	require_once "crud.php";

    $obj = new crud();

	$datos=array(	
		$_POST['contactoEditProv'],	
		$_POST['empresaEditProv'],
		$_POST['direccionEditProv'],
		$_POST['telefonoEditProv'],
		$_POST['correoEditProv'],
		$_POST['codigoEditProv'],
		$_POST['rfcEditProv'],
		$_POST['idproveedor']
	);

	echo $obj->edit($datos);
?>