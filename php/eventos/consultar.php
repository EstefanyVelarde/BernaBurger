<?php
	require_once "crud.php";

	$obj = new crud();

	echo $obj->getDetails($_POST['idevento']);
?>