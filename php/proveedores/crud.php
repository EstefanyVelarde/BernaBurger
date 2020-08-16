<?php
	require_once '../conexion.php';

	class crud{
		public function add($datos){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "INSERT INTO proveedor (contacto, empresa, direccion, telefono, correo, cp, rfc)
					VALUES ('$datos[0]', 
							'$datos[1]', 
							'$datos[2]', 
							'$datos[3]', 
							'$datos[4]', 
							'$datos[5]', 
							'$datos[6]')";
							
			return mysqli_query($con, $sql);					
		}

		public function get($idproveedor){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT idproveedor, contacto, empresa, direccion, telefono, correo, cp, rfc from proveedor where idproveedor='$idproveedor'";
			$result = mysqli_query($con, $sql);

			$see = mysqli_fetch_row($result);

			$datos=array(
				'idproveedor'=> $see[0],
				'contacto'=> $see[1],
				'empresa'=> $see[2],
				'direccion'=> $see[3],
				'telefono'=> $see[4],
				'correo'=> $see[5],
				'cp'=> $see[6],
				'rfc'=> $see[7]
			);
							
			return $datos;					
		}

		public function edit($datos){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE proveedor set contacto='$datos[0]', empresa='$datos[1]', direccion='$datos[2]', telefono='$datos[3]', correo='$datos[4]', cp='$datos[5]', rfc='$datos[6]' where idproveedor = '$datos[7]'";

			return mysqli_query($con, $sql);					
		}

		public function del($idproveedor){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE proveedor set estado='1' where idproveedor='$idproveedor'";
							
			return mysqli_query($con, $sql);					
		}

		public function autocompletar($request){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT * from proveedor where contacto LIKE '%".$request."%'";

			$result = mysqli_query($con, $sql);

			$data = array();

			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result)) {
				  	$data[] = $row["contacto"];
				}

				echo json_encode($data);
			}				
		}
	}
?>