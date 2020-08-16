<?php
	require_once "crud.php";

    $obj = new crud();
	
	echo $obj->edit($_POST['idcompra'],$_POST['edo']);
?>