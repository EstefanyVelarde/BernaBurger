<?php
	require_once "crud.php";

	$obj = new crud();

	echo json_encode($obj->get($_POST['idproducto']));
?>