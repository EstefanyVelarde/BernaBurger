<?php
	require_once '../conexion.php';

	class crud{
		public function add($datos){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "INSERT INTO cliente (nombre, apellido, direccion, telefono, correo)
					VALUES ('$datos[0]', 
							'$datos[1]', 
							'$datos[2]', 
							'$datos[3]', 
							'$datos[4]')";
							
			return mysqli_query($con, $sql);					
		}

		public function get($idcliente){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT idcliente, nombre, apellido, direccion, telefono, correo from cliente where idcliente='$idcliente'";

			$result = mysqli_query($con, $sql);

			$see = mysqli_fetch_row($result);

			$datos=array(
				'idcliente'=> $see[0],
				'nombre'=> $see[1],
				'apellido'=> $see[2],
				'direccion'=> $see[3],
				'telefono'=> $see[4],
				'correo'=> $see[5],
			);
							
			return $datos;					
		}

		public function edit($datos){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE cliente set nombre='$datos[0]', apellido='$datos[1]', direccion='$datos[2]', telefono='$datos[3]', correo='$datos[4]' where idcliente = '$datos[5]'";
			
			return mysqli_query($con, $sql);					
		}

		public function del($idcliente){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE cliente set edo='1' where idcliente='$idcliente'";
							
			return mysqli_query($con, $sql);					
		}
	}
?>