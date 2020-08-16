<?php
	require_once "crud.php";

    $obj = new crud();

	echo $obj->add(
		$_POST['idorden'],
		$_POST['usuario'],
		$_POST['platillos'],
		$_POST['mesa'],
		$_POST['inst'],
		$_POST['imp']
	);
?>