<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'includes/head.php'; ?>
	<?php include 'includes/sesion.php'; ?>

	<link href="css/index.css" rel="stylesheet">
</head>
<body>
	<?php $page='index'; include 'includes/navbar.php'; ?>

	<!--- Image Slider -->
	<div class="carousel slide position-fixed" data-ride="carousel" style="width: 100%">
		<div class="carousel-inner">
			<div class="carousel-item active"><img src="img/burger.jpg"></div>
			<div class="carousel-item"><img src="img/dogos.jpg"></div>
			<div class="carousel-item"><img src="img/fries.jpg"></div>
		</div>
	</div>
	<!--- End Image Slider -->

	<!--- Vista Principal -->

	<div class="indexLimiter container-fluid">
		<div class="bg my-4 mx-2  rounded-lg ">
			<div class="container-fluid text-uppercase p-4">

				<div class="row">
					<div class="col-4">
						<div class="title bg-danger font-weight-bold my-4 ml-4 mr-1 p-3 rounded-lg ">
							Usuario
						</div>
						<div class="user my-4 ml-4 mr-1 p-3 rounded-lg ">
							<div class="user-name bg-light text-center">
								<?php echo $_SESSION['user'] ?>
							</div>

							<div class="user-actions bg-light mt-4">
								<div class="float_center">
									<div class="child">
										<div class="row mt-4 mb-4">
											<a class="btn btn-gr"<?php if($_SESSION['tipo']!='admin') {?> style="display:none" <?php } ?> href="usuarios.php">Usuarios</a>
										</div>
										<div class="row mb-4">
											<?php
										    require "php/conexion.php";

										    $con = new conectar();
										    
										    /* IVA */
										    $sql3 = " SELECT iva FROM usuario WHERE usuario = '" . $_SESSION['user'] . "';";
										    $resultIva = mysqli_query($con->conexion(), $sql3);
										    $fetch = mysqli_fetch_row($resultIva);
										    $iva = $fetch[0];
										?>
										<a class="btn btn-gr" <?php if($_SESSION['tipo']!='admin') {?> style="display:none" <?php } ?>href="" data-toggle="modal" data-target="#modalEditIva" id="openEditIva" onclick="get('<?php echo $_SESSION['user'] ?>', '<?php echo $iva ?>')">Modificar IVA</a>
										</div>
										<div class="row">
											<a class="btn btn-gr" onclick="cerrarSesion()">Cerrar Sesión</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					

					<div <?php if($_SESSION['tipo']!='admin') {?> style="display:none" <?php } ?> class="col-8">
						<div class="title bg-secondary font-weight-bold my-4 mr-4 p-3  rounded-lg ">
							Utilidades
						</div>
						<div class="utilities font-weight-bold my-4 mr-4 p-3 rounded-lg ">
							<div class="bg-light font-weight-bold mt-2 mb-4  mr-4 p-3  rounded-lg " style="font-size: 20px">
								Reportes
							</div>
							<input type="hidden" id="fechaActual" value="Test Test Tes">
							<div class="row my-3 ml-4">

								<div class="col-4">
									<span class="btn btn-red bg-danger " style="width:300px"  id="ventasReport">
			                            Ventas general
			                        </span>

			                        <span class="btn btn-red bg-danger  mt-4" style="width:300px"  id="comprasReport">
			                            Compras general
			                        </span>


									<a class="btn btn-red bg-danger mt-4" style="width:300px;" href="php/reportes/reporteEventos.php" target="_blank">Eventos General</a>

								</div>
								<div class="col-4">


									<span class="btn btn-red bg-danger " style="width:300px" data-toggle="modal" data-target="#modalRango" id="openRango" onclick="set('ventas')">
			                            Ventas Periodo
			                        </span>

									<span class="btn btn-red bg-danger mt-4" style="width:300px" data-toggle="modal" data-target="#modalRango" id="openRango" onclick="set('compras')">
			                            Compras Periodo
			                        </span>



									<span class="btn btn-red bg-danger mt-4" style="width:300px" data-toggle="modal" data-target="#modalRango" id="openRango" onclick="set('eventos')">
			                            Eventos Periodo
			                        </span>

									
								</div>

								<div class="col-4">
									

									<a class="btn btn-red bg-danger" style="width:300px;" href="php/reportes/reporteProductos.php" target="_blank">Inventario</a>
									
								</div>
								

							</div>
							<div class="row my-2">

								<div class="col-">
									
								</div>
								

							</div>
							

							<div class="bg-light font-weight-bold mt-4 mb-4 mr-4 p-3  rounded-lg " style="font-size: 20px">
								Respaldo
							</div>

							<div class="row my-4 ml-4">
								<div class="col-4">
									<a class="btn btn-red bg-danger" style="width:300px;" href="proveedoresBackup.php">Proveedores respaldo</a>
									<a class="btn btn-red bg-danger mt-4 mb-1" style="width:300px;" href="php/backup.php?backup=true">DB BACKUP</a>
								</div>
								<div class="col-4">
									<a class="btn btn-red bg-danger" style="width:300px;" href="productosBackup.php">Productos respaldo</a>
									<a class="btn btn-red bg-danger mt-4 mb-1" style="width:300px;" href="eventosBackup.php">Eventos respaldo</a>
								</div>
								
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="mx-4 fixed-bottom">
		<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>

    <?php include 'modalEditIva.php'; ?>

    <?php include 'modalRango.php'; ?>

    <?php include 'php/backup.php'; ?>

	<script type="text/javascript">
		function cerrarSesion(){
			$.ajax({
		type:"POST",
		data:{},
		url:"php/cerrarsesion.php",
		success:function(r) {
			window.location.replace("login.php");
		}
	});
		}
		function get(usuario, iva) {
		  var form = document.getElementById('frmEditIva');  
		  
		  setTimeout(() => {reset(form);}, 100);
		  $('#usuario').val(usuario);
		  $('#iva').val(iva);
		}

		function set(id) {
		  $('#idreport').val(id);
		}

		function ventas() {
			var form = document.getElementById('frmReportVentas');  

			setTimeout(() => {reset(form);}, 100);

			var id = $('#idreport').val();
			var min = $('#minVenta').val();
			var max = $('#maxVenta').val();

			if(id == 'ventas')
	            gotoUrl("php/reportes/reporteRangoVentas.php", {'min':min, 'max':max});
	        else 
	        	if(id == 'eventos')
	            	gotoUrl("php/reportes/reporteRangoEventos.php", {'min':min, 'max':max});
	            else
	            	if(id == 'compras')
	            		gotoUrl("php/reportes/reporteRangoCompras.php", {'min':min, 'max':max});
		}

		/**
		 * Function that will redirect to a new page & pass data using submit
		 * @param {type} path -> new url
		 * @param {type} params -> JSON data to be posted
		 * @param {type} method -> GET or POST
		 * @returns {undefined} -> NA
		 */
		function gotoUrl(path, params, method) {
		    //Null check
		    method = method || "post"; // Set method to post by default if not specified.

		    // The rest of this code assumes you are not using a library.
		    // It can be made less wordy if you use one.
		    var form = document.createElement("form");
		    form.setAttribute("method", method);
		    form.setAttribute("action", path);

		    //Fill the hidden form
		    if (typeof params === 'string') {
		        var hiddenField = document.createElement("input");
		        hiddenField.setAttribute("type", "hidden");
		        hiddenField.setAttribute("name", 'data');
		        hiddenField.setAttribute("value", params);
		        form.appendChild(hiddenField);
		    }
		    else {
		        for (var key in params) {
		            if (params.hasOwnProperty(key)) {
		                var hiddenField = document.createElement("input");
		                hiddenField.setAttribute("type", "hidden");
		                hiddenField.setAttribute("name", key);
		                if(typeof params[key] === 'object'){
		                    hiddenField.setAttribute("value", JSON.stringify(params[key]));
		                }
		                else{
		                    hiddenField.setAttribute("value", params[key]);
		                }
		                form.appendChild(hiddenField);
		            }
		        }
		    }

		    document.body.appendChild(form);
		    form.submit();
		}

		function validateNumber(evt) {
		  var theEvent = evt || window.event;
		  var key = theEvent.keyCode || theEvent.which;
		  key = String.fromCharCode( key );
		  var regex = /[0-9]|\./;
		  if( !regex.test(key) ) {
		    theEvent.returnValue = false;
		    if(theEvent.preventDefault) theEvent.preventDefault();
		  }
		}

		function edit() {
		  alertify.set('notifier','position', 'top-right');

		  datos = $('#frmEditIva').serialize();
		  
		  $.ajax({
		    type:"POST",
		    data:datos,
		    url:"php/usuarios/editarIva.php",
		    success:function(r) {
		      if(r == 1) {
		        alertify.success("Actualizado con exito");
		        setTimeout(() => {location.reload();}, 1000);
		                
		      } else {
		        alertify.error("No se pudo actualizar cliente");
		      }
		    }
		  });
		}



		function reset(form) { 
		    form.classList.remove('was-validated');               
		}

		$(document).on('click', '#ventasReport', function(){
			var today = new Date();
			var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
			var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

			var dateTime = date+' '+time;

		    window.open('php/reportes/reporteVentas.php?fechaActual='+dateTime);
		  });

		$(document).on('click', '#comprasReport', function(){
			var today = new Date();
			var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
			var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

			var dateTime = date+' '+time;

		    window.open('php/reportes/reporteCompras.php?fechaActual='+dateTime);
		  });

		$(document).ready(function(){
		  /* BOOTSTRAP VALIDATION */
		  // Fetch all the forms we want to apply custom Bootstrap validation styles to
		  var forms = document.getElementsByClassName('needs-validation');

		  // Loop over them and prevent submission
		  var validation = Array.prototype.filter.call(forms, function(form) {
		    form.addEventListener('submit', function(event) {
		      if (form.checkValidity() === false) {
		        event.preventDefault();
		        event.stopPropagation();
		      } else {
		        if(form.classList.contains("creaReporteVentas")) {
		        	ventas();	    
		          	$('#modalReportVentas').modal('toggle');      
		        } else {
		          edit();
		          $('#modalEditIva').modal('toggle');
		        }
		      }

		      form.classList.add('was-validated');
		    }, false);
		  });
		    
		  /* END BOOTSTRAP VALIDATION */
		  
		});


	</script>
</body>
</html>


<?php define('RAIZ', dirname(__FILE__)); ?>