<?php
	require_once "crud.php";

	$obj = new crud();

	echo $obj->getOrden($_POST['idorden']);
?>