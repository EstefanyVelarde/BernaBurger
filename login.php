<?php include 'php/conexion.php'; ?>

<?php 

	$error = false;
	if (isset($_GET['error'])) {
		$error =  true;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Iniciar Sesión</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
	
	<link href="librerias/bootstrap/bootstrap.min.css"  type="text/css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
	<div class="limiter">
		<div class="container-login">
			<div class="wrap-login">

				<form action="validacion.php" method="POST" class="login-form validate-form" id="formLogin">
					<span class="login-form-title">
						Iniciar Sesión
					</span>

					<div class="wrap-input validate-input" data-validate = "Usuario requerido">
						<input class="input" type="text" name="user" placeholder="Usuario">
						<span class="focus-input"></span>
						<span class="symbol-input">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input validate-input" data-validate = "Contraseña requerida">
						<input class="input" type="password" name="pass" placeholder="Contraseña">
						<span class="focus-input"></span>
						<span class="symbol-input">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login-form-btn">
						<button class="login-form-btn">
							Entrar
						</button>
					</div>
                </form>
                
                
				<div class="login-pic" style="background-image: url('img/side.jpg'); background-size: cover;">
                    <div class="logo">
                        <img src="img/logo.png" class="logo-img js-tilt">
                        <span class="logo-title js-tilt">BERNA BURGER</span>
                    </div>
				</div>
			</div>
		</div>
	</div>



	<?php if($error):?>

	  <script>setTimeout(() => {$('#modalLoginError').modal('show');}, 100);

	  </script>

	<?php endif;?>
	<?php include 'includes/scripts.php'; ?>
	
    <?php include 'modalLoginError.php'; ?>
	<script src="librerias/jquery.min.js"></script> 
	<script src="librerias/bootstrap/bootstrap.min.js"></script> 
	<script src="librerias/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/login.js"></script>

</body>
</html>