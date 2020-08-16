<?php
	require_once "crud.php";

    $obj = new crud();

	$datos=array(	
		$_POST['nombreAddServ'],	
		$_POST['descAddServ'],
		$_POST['costoAddServ'],
	);
	
	echo $obj->add($datos);
?>