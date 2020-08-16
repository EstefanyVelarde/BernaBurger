<!DOCTYPE html>
<html lang="en">
<head>
	<?php $page='ventas'; include 'includes/head.php'; ?>

	<link href="css/ventas.css" rel="stylesheet">
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	
    <div class="limiter bg-light m-4">

		<div class="container-fluid text-uppercase row">
			<div class="nav flex-column nav-pills col-2 red bg-white" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<a class="nav-link nav-link-color active" id="v-pills-add-tab" data-toggle="pill" href="#v-pills-add" role="tab" aria-controls="v-pills-add" aria-selected="true">Agregar</a>
				<a class="nav-link nav-link-color" id="v-pills-search-tab" data-toggle="pill" href="#v-pills-search" role="tab" aria-controls="v-pills-search" aria-selected="false">Consultar</a>
				<!-- <div id="estado" class="rounded" style="background-color:black;"><p style="color:white;text-align:center;">Estado de inventario</p></div> -->
      </div>
			
			<div class="tab-content tabz" id="v-pills-tabContent">

				<div class="tab-pane fade show active" id="v-pills-add" role="tabpanel" aria-labelledby="v-pills-add-tab">
					
					<div class="ml-4" id="agregarVenta"></div>

				</div>

				<div class="tab-pane fade" id="v-pills-search" role="tabpanel" aria-labelledby="v-pills-search-tab">
					<div class="container-fluid p-2">
						<div class="m-3" id="tablaVentas"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

		
	<?php include 'includes/footer.php'; ?>
	</div>
	
    <?php include 'modalInfoVenta.php'; ?>
	<?php include 'includes/scripts.php'; ?>

	<script src="js/ventas.js"></script>
</body>
</html>
