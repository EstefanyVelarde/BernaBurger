<?php
	require_once '../conexion.php';

	class crud{
		public function add($idventa, $ordenes, $usuario, $importe){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "INSERT INTO venta (usuario, fecha, importe)
				VALUES ('$usuario', 
						NOW(), 
						$importe)";


			$res = mysqli_query($con, $sql);	

			if($res == 1) {
				
				foreach ($ordenes as $idorden) {
					$orden = "UPDATE orden set estado='terminado' where idorden = '$idorden'";

					mysqli_query($con, $orden);

					$detalle = "INSERT INTO ventadetalle (idventa, idorden)
					VALUES ($idventa, 
							$idorden)";

					mysqli_query($con, $detalle);
				}
			}

			return $res;				
		}


		public function addV($idventa, $usuario, $importe){	

			$obj = new conectar();
			$con = $obj->conexion();



			$sql = "INSERT INTO venta (usuario, fecha, importe)
				VALUES ('$usuario', 
						NOW(), 
						$importe)";

			echo $sql;

			$res = mysqli_query($con, $sql);	

			return $res;				
		}

		public function editOrden( ) {

			foreach ($ordenes as $idorden) {
				$orden = "UPDATE orden set estado='terminado' where idorden = '$idorden'";

				mysqli_query($con, $orden);
			}
		}

		public function getOrden($idorden){	

			$obj = new conectar();
			$con = $obj->conexion();

			$output = '';

			$hide = ' id="td0" style="display:none;"';
			$id = ' id="td1"';
			$id2 = ' id="td2"';
			
			$sql = "SELECT * from ordendetalle where idorden = '$idorden'";
			$result = mysqli_query($con, $sql);
			$count = mysqli_num_rows($result);
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$delete = '<span class="btn mr-3" style="background-color:transparent" onclick="del(this, '.$row['idorden'].')">
                            <span class="fas fa-minus" style="color:#dc3545" ></span>
                       </span>';

                $idplatillo = $row['idplatillo'];

                $sqlPlatillo = "SELECT nombre from platillo where idplatillo = '$idplatillo'";
                $resultPlatillo = mysqli_query($con, $sqlPlatillo);
                $nombrePlatillo = mysqli_fetch_row($resultPlatillo);

				$output .= "<tr>
							<td ".$hide.">".$row['idordendetalle']."</td>
                            <td ".$id.">".$row['idorden']."</td>
                            <td>".$nombrePlatillo[0]."</td>
                            <td>".$row['costo']."</td>
                            <td>".$row['cantidad']."</td>
                            <td ".$id2.">".$row['importe']."</td>
                            <td>".$delete."</td>
                            </tr>";
			}
			
			
			return $output;
								
		}

		public function getDetails($idventa){	

			$obj = new conectar();
			$con = $obj->conexion();

			$details = array();

			$sql = "SELECT * from ventadetalle where idventa = '$idventa'";
			$result = mysqli_query($con, $sql);

			$hide = ' id="td0" style="display:none;"';


			$output = "";

			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

				$idorden = $row['idorden'];

				$orden = $this->getOrdenDetails($idorden);

				foreach($orden as $row) { //foreach element in $arr
				    $output .= "<tr>
							<td ".$hide.">".$row['idordendetalle']."</td>
                            <td>".$row['idorden']."</td>
                            <td>".$row['idplatillo']."</td>
                            <td>".$row['costo']."</td>
                            <td>".$row['cantidad']."</td>
                            <td>".$row['importe']."</td>
                            </tr>";
				}

				
				/*
				$details = array_merge($details, $orden);*/
			}

			return $output;
								
		}
		public function checarInv(){
			$obj = new conectar();
			$con = $obj->conexion();
			
			$sql="SELECT exist FROM producto ORDER BY exist ASC";
			$result = mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);

			return $row['exist'];

		}
		public function getOrdenDetails($idorden) {
			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT * from ordendetalle where idorden = '$idorden'";
			$result = mysqli_query($con, $sql);

			$details = array();

			while($row = mysqli_fetch_array($result))
			{

				$idplatillo = $row['idplatillo'];

	            $sqlPlatillo = "SELECT nombre from platillo where idplatillo = '$idplatillo'";

	            $resultPlatillo = mysqli_query($con, $sqlPlatillo);
	            $nombrePlatillo = mysqli_fetch_row($resultPlatillo);

	            $row['idplatillo'] = $nombrePlatillo[0];

			   	$details[] = $row;
			}

			return $details;

		}
	}
