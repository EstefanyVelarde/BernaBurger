<?php
	require_once "crud.php";

    $obj = new crud();

	echo $obj->add($_POST['idcompra'],$_POST['productos'],$_POST['usuario'],$_POST['idproveedor'],$_POST['tipo'],$_POST['subtotal'],$_POST['iva'],$_POST['total']);
?>