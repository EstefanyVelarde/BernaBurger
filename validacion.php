<?php
require_once 'php/conexion.php';

$obj = new conectar();
$conexion = $obj->conexion();
session_start();

$user = $_POST['user'];
$pass = $_POST['pass'];

$q = "SELECT COUNT(*) as contar from usuario where usuario = '$user' and contrasena = '$pass'";
$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);
$sql = "SELECT * from usuario where usuario = '$user' and contrasena= '$pass'";
$consulta2 = mysqli_query($conexion,$sql);
$array2 = mysqli_fetch_array($consulta2);
$tipo = $array2['roll'];
if($array['contar'] > 0) {

	session_start();

    $_SESSION['user'] = $user;
    $_SESSION['tipo'] = $tipo;
    header("location: ventas.php");
} else {
    header("location: login.php?error=true");
}


?>

