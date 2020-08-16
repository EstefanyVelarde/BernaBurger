<?php
	require_once "crud.php";

	$obj = new crud();

	echo $obj->getMax($_POST['idplatillo']);
?>