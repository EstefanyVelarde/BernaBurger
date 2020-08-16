<?php
	require_once '../conexion.php';

	class crud{
		public function add($idevento, $servicios, $idcliente, $fecha, $total, $dir){	

			$obj = new conectar();
			$con = $obj->conexion();

			$day1 = strtotime($fecha);
			$day1 = date('Y-m-d H:i:s', $day1); //now you can save in DB

			$sql = "INSERT INTO evento (idcliente, fecha, importe)
				VALUES ('$idcliente', '$fecha', '$total')";

			$res = mysqli_query($con, $sql);	

			if($res == 1) {
				
				foreach ($servicios as $serv) {

					$detalle = "INSERT INTO eventodetalle (idevento, idservicio, costo)
					VALUES ($idevento, 
							$serv[0],$serv[1])";

					mysqli_query($con, $detalle);
				}

				$cli = "UPDATE cliente set direccion='$dir' where idcliente = '$idcliente'";
			
				mysqli_query($con, $cli);
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

			$sql = "UPDATE evento set edo='1' where idevento='$idplatillo'";
							
			return mysqli_query($con, $sql);					
		}

		public function getDetails($idevento){	

			$obj = new conectar();
			$con = $obj->conexion();

			$details = array();

			$sql = "SELECT * from eventodetalle where idevento = '$idevento'";

			$result = mysqli_query($con, $sql);

			$output = "";


			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

				$idservicio = $row['idservicio'];
				$costo = $row['costo'];

				$nombre = $this->getProductoDetails($idservicio);

				$span = '<span class="btn mr-3" style="background-color:transparent" onclick="del(this, '.$idservicio.')"> <span class="fas fa-minus" id="btn-del" ></span> </span>';

			    $output .= "<tr>
						<td>".$idservicio."</td>
                        <td>".$nombre."</td>
                        <td>".$costo."</td>
                        </tr>";
			}

			return $output;	
		}

		public function getProductoDetails($idproducto) {
			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT nombre from servicio where idservicio = '$idproducto'";

			$result = mysqli_query($con, $sql);
			$fetch = mysqli_fetch_row($result);
    		$details = $fetch[0];

			return $details;

		}
	}
