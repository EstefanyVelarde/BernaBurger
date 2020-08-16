<?php
	require_once "crud.php";

    $obj = new crud();

	echo $obj->edit(
		$_POST['idevento'],
		$_POST['servicios'],
		$_POST['nombre'],
		$_POST['precio']
	);
?>