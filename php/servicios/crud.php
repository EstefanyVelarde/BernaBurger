<?php
	require_once '../conexion.php';

	class crud{
		public function add($datos){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "INSERT INTO servicio (nombre, descripcion, costo, edo)
					VALUES ('$datos[0]', 
							'$datos[1]', 
							$datos[2], 0)";
						
			return mysqli_query($con, $sql);					
		}

		public function get($idservicio){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT idservicio, nombre, descripcion, costo, edo from servicio where idservicio='$idservicio'";
			$result = mysqli_query($con, $sql);

			$see = mysqli_fetch_row($result);

			$datos=array(
				'idservicio'=> $see[0],
				'nombre'=> $see[1],
				'descripcion'=> $see[2],
				'costo'=> $see[3],
				'edo'=> $see[4],
			);
							
			return $datos;					
		}

		public function edit($datos){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE servicio set nombre='$datos[1]', descripcion='$datos[2]', costo='$datos[3]' where idservicio = $datos[0]";
			
			return mysqli_query($con, $sql);					
		}

		public function del($idservicio){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE servicio set edo='1' where idservicio=$idservicio";			
			return mysqli_query($con, $sql);					
		}
	}
?>