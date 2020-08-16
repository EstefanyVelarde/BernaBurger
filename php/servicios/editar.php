<?php
	require_once "crud.php";

    $obj = new crud();

	$datos=array(	
		$_POST['idservicio'],
		$_POST['nombreEditServ'],	
		$_POST['descEditServ'],
		$_POST['costoEditServ'],
	);
	
	echo $obj->edit($datos);
?>