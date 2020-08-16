<?php
	require_once "crud.php";

    $obj = new crud();

	echo $obj->add(
		$_POST['idevento'],
		$_POST['servicios'],
		$_POST['idcliente'],
		$_POST['fecha'],
		$_POST['total'],
		$_POST['dir']
	);
?>