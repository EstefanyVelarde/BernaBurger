<?php
	require_once '../conexion.php';

	class crud{
		public function add($idorden, $usuario, $platillos, $mesa, $inst, $imp){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "INSERT INTO orden (usuario, mesa, instrucciones, estado, importe)
				VALUES ('$usuario', 
						'$mesa', 
						'$inst',
						'pendiente',
						'$imp'
					)";


			$res = mysqli_query($con, $sql);	

			if($res == 1) {
				
				foreach ($platillos as $plat) {

					$productos = $this->getPlatilloDetalles($plat[0]);

					foreach($productos as $prod) {
						$exist = $this->getExistProducto($prod[2]);

						$exist -= $prod[3] * $plat[2];

					   	$sqlProd = "UPDATE producto set exist='$exist' where idproducto = '$prod[2]'";

						mysqli_query($con, $sqlProd);
					}

					$detalle = "INSERT INTO ordendetalle (idorden, idplatillo, costo, cantidad, importe)
					VALUES ($idorden, 
							$plat[0], 
							$plat[1], 
							$plat[2], 
							$plat[3])";

					mysqli_query($con, $detalle);
				}
			}

			return $res;				
		}

		public function checkProd($platillos) {
			$prodtemp = $this->getProdTemp($idplatillo);

			foreach ($platillos as $plat) {
				$productos = $this->getPlatilloDetalles($idplatillo);

				foreach($productos as $prod) {
					
				}
			}

		}

		public function getProdTemp($platillos){	
			$obj = new conectar();
			$con = $obj->conexion();

			$prodTemp = array();

			foreach ($platillos as $plat) {
				$productos = $this->getPlatilloDetalles($idplatillo);

				foreach($productos as $prod) {
					if(!in_array($prod[2], $prodTemp, true)){
				        array_push($prodTemp, $prod[2]);
				    }

				    $exist = $this->getExistProducto($prod[2]);
				}
			}

			return $prodTemp;
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

		public function getAll($idorden){	

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

		public function getDetails($idorden){	

			$obj = new conectar();
			$con = $obj->conexion();

			$orden = $this->getOrdenDetails($idorden);

			$output = "";
			foreach($orden as $row) { //foreach element in $arr
			    $output .= "<tr>
                        <td>".$row['idplatillo']."</td>
                        <td>".$row['costo']."</td>
                        <td>".$row['cantidad']."</td>
                        <td>".$row['importe']."</td>
                        </tr>";
				
			}

			return $output;
								
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

		public function edit($datos){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE producto set nombre='$datos[0]', exist='$datos[1]', punto='$datos[2]', costo='$datos[3]', costoProm='$datos[4]', unidad='$datos[5]' where idproducto = '$datos[6]'";
			echo $sql;
			return mysqli_query($con, $sql);					
		}

		public function del($idorden){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "UPDATE orden set estado='cancelada' where idorden='$idorden'";
							
			return mysqli_query($con, $sql);					
		}

		public function getMax($idplatillo){	
			$obj = new conectar();
			$con = $obj->conexion();

			$lim = -1;

			$productos = $this->getPlatilloDetalles($idplatillo);

			foreach($productos as $prod) {
			   $exist = $this->getExistProducto($prod[2]);

			   if($prod['cantidad'] > $exist) {
			   		return -1;
			   } else {
			   		$aux = $exist / $prod[3];
			   		if($lim == -1 || $lim > $aux) {
			   			$lim = $aux;	
			   		} 
			   }
			}				
			
			return $lim;
		}

		public function getPlatilloDetalles($idplatillo){	

			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT * from platillodetalle where idplatillo = '$idplatillo'";

			$result = mysqli_query($con, $sql);

			$productos = array();

			while($row = mysqli_fetch_array($result))
			{
			   $productos[] = $row;
			}

			return $productos;					
		
		}

		public function getExistProducto($idproducto){	
			$obj = new conectar();
			$con = $obj->conexion();

			$sql = "SELECT exist from producto where idproducto = '$idproducto'";

			$result = mysqli_query($con, $sql);

		    $fetch = mysqli_fetch_row($result);

			return $fetch[0];	
		}
	}
