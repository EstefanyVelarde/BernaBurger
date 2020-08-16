
	<?php include 'includes/sesion.php'; ?>
 
<nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top m-4 rounded-lg text-uppercase">
    <div class="container-fluid">
        <!-- Brand --->
        <a class="navbar-brand" href="index.php">
            <img class="js-tilt" src="img/logo.png"> 
            <span class="brand-name"> Berna Burger </span>
        </a> 
        <!-- End Brand --->

        <!--- Catalogue -->
        <button class="navbar-toggler" data-target="#navbarResponsive" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'ventas'){echo 'active';}?>" href="ventas.php">Ventas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'ordenes'){echo 'active';}?>" href="ordenes.php">Ordenes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'platillos'){echo 'active';}?>"<?php if($_SESSION['tipo']!='admin') {?> style="display:none" <?php } ?> href="platillos.php">Platillos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link <?php if($page == 'inv'){echo 'active';}?> dropdown-toggle"<?php if($_SESSION['tipo']!='admin') {?> style="display:none" <?php } ?> href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Inventario
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" <?php if($_SESSION['tipo']!='admin') {?> style="display:none" <?php } ?>href="compras.php">Compras</a>
                        <a class="dropdown-item" <?php if($_SESSION['tipo']!='admin') {?> style="display:none" <?php } ?>href="productos.php">Productos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"<?php if($_SESSION['tipo']!='admin') {?> style="display:none" <?php } ?> href="proveedores.php">Proveedores</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'clientes'){echo 'active';}?>" <?php if($_SESSION['tipo']!='admin') {?> style="display:none" <?php } ?> href="clientes.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'eventos'){echo 'active';}?>"  <?php if($_SESSION['tipo']!='admin') {?> style="display:none" <?php } ?> href="eventos.php" role="button"> Eventos </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page == 'servicios'){echo 'active';}?>"<?php if($_SESSION['tipo']!='admin') {?> style="display:none" <?php } ?> href="servicios.php" role="button"> Servicios </a>
                </li>
            </ul>
        </div>
        <!--- End Catalogue -->
    </div>
</nav>


