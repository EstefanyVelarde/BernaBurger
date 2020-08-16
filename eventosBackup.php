<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'includes/head.php'; ?>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	
     <div class="row limiter mx-1 mt-4">

			<div class="col-3">
				<nav class="m-3 text-uppercase w-100" aria-label="breadcrumb">
				  <ol class="breadcrumb bg-warning">
				    <li class="breadcrumb-item"><a href="index.php" class="text-dark">Inicio</a></li>
				    <li class="breadcrumb-item active text-dark" aria-current="page">Eventos respaldo</li>
				  </ol>
				</nav>
	    	</div>	  

    	</div>
    
    <div class="limiter bg-light m-4">
    	<hr>
    	<div class="position-relative m-3" id="tablaEventoBackup"></div>

		<?php include 'includes/footer.php'; ?>
    </div>



	
	<?php include 'includes/scripts.php'; ?>

	<?php include 'modalAddEventos.php'; ?>
    <?php include 'modalEditEvento.php'; ?>
    <?php include 'modalSearchCliente.php'; ?>

	<script src="js/eventos.js"></script>
</body>
</html>
