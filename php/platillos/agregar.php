<?php
	require_once "crud.php";

    $obj = new crud();

	echo $obj->add(
		$_POST['idplatillo'],
		$_POST['productos'],
		$_POST['nombre'],
		$_POST['precio']
	);
?>