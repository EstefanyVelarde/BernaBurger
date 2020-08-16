<?php
	require_once '../conexion.php';

	class crud{
		public function add($idplatillo, $productos, $nombre, $precio){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "INSERT INTO platillo (nombre, precio)
				VALUES ('$nombre', '$precio')";

			$res = mysqli_query($con, $sql);	

			if($res == 1) {
				
				foreach ($productos as $prod) {

					$detalle = "INSERT INTO platillodetalle (idplatillo, idproducto, cantidad)
					VALUES ($idplatillo, 
							$prod[0], $prod[1])";

					mysqli_query($con, $detalle);
				}
			}

			return $res;				
		}

		public function edit($idplatillo, $productos, $nombre, $precio){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE platillo set nombre='$nombre', precio='$precio' where idplatillo = '$idplatillo'";
			
			$res = mysqli_query($con, $sql);	

			if($res == 1) {

				$del = "DELETE FROM platillodetalle where idplatillo = '$idplatillo'";
				 
				mysqli_query($con, $del);	
				
				foreach ($productos as $prod) {

					$detalle = "INSERT INTO platillodetalle (idplatillo, idproducto, cantidad)
					VALUES ($idplatillo, 
							$prod[0], $prod[1])";

					mysqli_query($con, $detalle);
				}
			}

			return $res;					
		}

		public function del($idplatillo){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE platillo set edo='1' where idplatillo='$idplatillo'";
							
			return mysqli_query($con, $sql);					
		}

		public function getDetails($idplatillo){	

			$obj = new conectar();
			$con = $obj->conexion();

			$details = array();

			$sql = "SELECT * from platillodetalle where idplatillo = '$idplatillo'";

			$result = mysqli_query($con, $sql);

			$output = "";


			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

				$idproducto = $row['idproducto'];
				$cantidad = $row['cantidad'];

				$nombre = $this->getProductoDetails($idproducto);

				$span = '<span class="btn mr-3" style="background-color:transparent" onclick="del(this, '.$idproducto.')"> <span class="fas fa-minus" id="btn-del" ></span> </span>';

			    $output .= "<tr>
						<td>".$idproducto."</td>
                        <td>".$nombre."</td>
                        <td>".$cantidad."</td>
                        <td>".$span."</td>
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
