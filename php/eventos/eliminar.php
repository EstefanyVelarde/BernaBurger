<?php
	require_once "crud.php";

	$obj = new crud();

	echo $obj->del($_POST['idevento']);
?>