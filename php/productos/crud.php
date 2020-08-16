<?php
	require_once '../conexion.php';

	class crud{
		public function add($datos){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "INSERT INTO producto (nombre, exist, punto, costo, costoProm, unidad)
					VALUES ('$datos[0]', 
							'$datos[1]', 
							'$datos[2]', 
							'$datos[3]', 
							'$datos[4]', 
							'$datos[5]')";
							
			return mysqli_query($con, $sql);					
		}

		public function get($idproducto){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT idproducto, nombre, exist, punto, costo, costoProm, unidad from producto where idproducto='$idproducto'";
			$result = mysqli_query($con, $sql);

			$see = mysqli_fetch_row($result);

			$datos=array(
				'idproducto'=> $see[0],
				'nombre'=> $see[1],
				'exist'=> $see[2],
				'punto'=> $see[3],
				'costo'=> $see[4],
				'costoProm'=> $see[5],
				'unidad'=> $see[6],
			);
							
			return $datos;					
		}

		public function edit($datos){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE producto set nombre='$datos[0]', exist='$datos[1]', punto='$datos[2]', costo='$datos[3]', costoProm='$datos[4]', unidad='$datos[5]' where idproducto = '$datos[6]'";
			
			return mysqli_query($con, $sql);					
		}

		public function del($idproducto){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE producto set edo='1' where idproducto='$idproducto'";
							
			return mysqli_query($con, $sql);					
		}
	}
?>