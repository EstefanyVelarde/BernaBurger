<?php
	require_once '../conexion.php';

	class crud{
		public function add($datos){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "INSERT INTO usuario (usuario, roll, nombre, puesto, telefono, correo, contrasena)
					VALUES ('$datos[0]', 
							'$datos[1]', 
							'$datos[2]', 
							'$datos[3]', 
							'$datos[4]', 
							'$datos[5]', 
							'$datos[6]')";
	
			return mysqli_query($con, $sql);					
		}

		public function get($usuario){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT usuario, roll, nombre, puesto, telefono, correo, contrasena from usuario where usuario='$usuario'";

			$result = mysqli_query($con, $sql);

			$see = mysqli_fetch_row($result);

			$datos=array(
				'usuario'=> $see[0],
				'roll'=> $see[1],
				'nombre'=> $see[2],
				'puesto'=> $see[3],
				'telefono'=> $see[4],
				'correo'=> $see[5],
				'contrasena'=> $see[6],
			);
							
			return $datos;					
		}

		public function edit($datos){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE usuario set roll='$datos[0]', nombre='$datos[1]', puesto='$datos[2]', telefono='$datos[3]', correo='$datos[4]', contrasena='$datos[5]' where usuario = '$datos[6]'";
			
			return mysqli_query($con, $sql);					
		}

		public function editIva($usuario, $iva){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE usuario set iva='$iva' where usuario = '$usuario'";
			
			return mysqli_query($con, $sql);					
		}

		public function del($idusuario){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE usuario set edo='1' where usuario='$idusuario'";
							
			return mysqli_query($con, $sql);					
		}
	}
?>