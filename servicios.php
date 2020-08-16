<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'includes/head.php'; ?>
</head>
<body>
    <?php $page='servicios'; include 'includes/navbar.php'; ?>

    <div class="row limiter mx-1 mt-4">

			<div class="col-3">
				<nav class="m-3 text-uppercase w-100" aria-label="breadcrumb">
				  <ol class="breadcrumb bg-light">
				    <li class="breadcrumb-item"><a href="index.php" class="text-dark">Inicio</a></li>
				    <li class="breadcrumb-item">Inventario</li>
				    <li class="breadcrumb-item active text-dark" aria-current="page">Servicios</li>
				  </ol>
				</nav>
	    	</div>	  

	    	<div class="col-9 text-right">
	    		<span class="btn btn-secondary btn-lg m-3" data-toggle="modal" data-target="#modalAddServ" id="openAddServicio"> 
	    		<span class="fa fa-plus"></span> Agregar </span>
	    	</div>

    	</div>
    
    <div class="limiter bg-light m-4">
    	<hr>
    	<div class="position-relative m-3" id="tablaServicios"></div>

		<?php include 'includes/footer.php'; ?>
    </div>


    <?php include 'modalAddServ.php'; ?>
    <?php include 'modalEditServ.php'; ?>

	<?php include 'includes/scripts.php'; ?>

	<script src="js/servicios.js"></script>
</body>
</html>