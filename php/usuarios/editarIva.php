<?php
	require_once "crud.php";

    $obj = new crud();

	echo $obj->editIva($_POST['usuario'],$_POST['iva']);
?>