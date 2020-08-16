<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'includes/head.php'; ?>
</head>
<body>
    <?php $page='clientes'; include 'includes/navbar.php'; ?>

    <div class="row limiter mx-1 mt-4">

			<div class="col-2">
				<nav class="m-3 text-uppercase w-100" aria-label="breadcrumb">
				  <ol class="breadcrumb bg-light">
				    <li class="breadcrumb-item"><a href="index.php" class="text-dark">Inicio</a></li>
				    <li class="breadcrumb-item active text-dark" aria-current="page">Clientes</li>
				  </ol>
				</nav>
	    	</div>	  

	    	<div class="col-10 text-right">
	    		<span class="btn btn-secondary btn-lg m-3" data-toggle="modal" data-target="#modalAddCliente" id="openAddCliente"> 
	    		<span class="fa fa-plus"></span> Agregar </span>
	    	</div>

    	</div>
    
    <div class="limiter bg-light m-4">
    	<hr>
    	<div class="position-relative m-3" id="tablaClientes"></div>

		<?php include 'includes/footer.php'; ?>
    </div>

	<?php include 'modalAddCliente.php'; ?>
    <?php include 'modalEditCliente.php'; ?>

	<?php include 'includes/scripts.php'; ?>

	<script src="js/clientes.js"></script>
</body>
</html>