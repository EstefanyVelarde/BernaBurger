<?php
	require_once "crud.php";

    $obj = new crud();

	echo $obj->add(
		$_POST['idventa'],
		$_POST['ordenes'],
		$_POST['usuario'],
		$_POST['importe']
	);
?>