<?php
	require "php/conexion.php";

	$con = new conectar();

	$sql = "SELECT * from proveedor where estado = 1";
	$result = mysqli_query($con->conexion(), $sql);
?>

<div>
    <table class = "table table-hover table-bordered" id="idtablaProveedores">
	        <thead style="background-color: #dc3545; color: white; font-weight: bold;">
	            <tr>
	                <td>Clave</td>
	                <td>Contacto</td>
	                <td>Empresa</td>
	                <td>Correo</td>
	                <td>Teléfono</td>
	            </tr>
	        </thead>
	        <tfoot style="background-color: #ccc; color: white; font-weight: bold;">
	            <tr>
	                <td>Clave</td>
	                <td>Contacto</td>
	                <td>Empresa</td>
	                <td>Correo</td>
	                <td>Telefono</td>
	            </tr>
	        </tfoot>
	        <tbody>
	        	<?php
	        		while($mostrar = mysqli_fetch_row($result)) {
	        	?>
	            <tr>
	                <td><?php echo $mostrar[0] ?></td>
	                <td><?php echo $mostrar[3] ?></td>
	                <td><?php echo $mostrar[1] ?></td>
	                <td><?php echo $mostrar[4] ?></td>
	                <td><?php echo $mostrar[2] ?></td>
	            <?php

	        		}
	            ?>
	        </tbody>
    </table>
</div>

<script type="text/javascript"> 
	$(document).ready(function() {
	    $('#idtablaProveedores').DataTable({
	    	"language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
	    });
	} ); 
</script>