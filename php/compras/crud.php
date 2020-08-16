<?php
	require_once '../conexion.php';

	class crud{
		public function add($idcompra, $productos, $usuario, $idproveedor, $tipo, $subtotal, $iva, $total){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "INSERT INTO compra (usuario, fecha, idproveedor, tipo, subtotal, iva, total)
				VALUES ('$usuario', NOW(), '$idproveedor', '$tipo', '$subtotal', '$iva', '$total')";

			$res = mysqli_query($con, $sql);	

			if($res == 1) {
				
				foreach ($productos as $prod) {
					$cantidad = $this->getCantidad($prod[0]);
					$costoProm = $this->getCostoProm($prod[0]);

					$cantidad += $prod[1];
					$costoProm = ($costoProm + $prod[2]) / 2;

					$producto = "UPDATE producto set exist = '$cantidad', costo = '$prod[2]', costoProm = '$costoProm'  where idproducto = '$prod[0]'";

					mysqli_query($con, $producto);

					$detalle = "INSERT INTO compradetalle (idcompra, idproducto, cantidad, costo, subtotal)
					VALUES ($idcompra, 
							$prod[0], $prod[1], $prod[2], $prod[3])";

					mysqli_query($con, $detalle);


				}
			}

			return $res;				
		}
		public function edit($idcompra,$edo){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE compra SET status = $edo WHERE idcompra = $idcompra";

			$res = mysqli_query($con, $sql);	

			return $res;				
		}



		public function getCantidad($idproducto) {
			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT exist FROM producto WHERE idproducto = '$idproducto'";
			 
			$res = mysqli_query($con, $sql);
			$fetch = mysqli_fetch_row($res);
			return $fetch[0];	
		}

		public function getCostoProm($idproducto) {
			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT costoProm FROM producto WHERE idproducto = '$idproducto'";
			 
			$res = mysqli_query($con, $sql);
			$fetch = mysqli_fetch_row($res);
			return $fetch[0];	
		}

		public function getDetails($idcompra){	

			$obj = new conectar();
			$con = $obj->conexion();

			$details = array();

			$sql = "SELECT * from compradetalle where idcompra = '$idcompra'";
			$result = mysqli_query($con, $sql);


			$output = "";

			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

				$idproducto = $row['idproducto'];

				$nombre = $this->getProductoDetails($idproducto);

			    $output .= "<tr>
						<td>".$row['idproducto']."</td>
                        <td>".$nombre."</td>
                        <td>".$row['cantidad']."</td>
                        <td>".$row['costo']."</td>
                        <td>".$row['subtotal']."</td>
                        </tr>";
			}

			return $output;	
		}

		public function getProductoDetails($idproducto) {
			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT nombre from producto where idproducto = '$idproducto'";

			$result = mysqli_query($con, $sql);
			$fetch = mysqli_fetch_row($result);
    		$details = $fetch[0];

			return $details;

		}
	}
