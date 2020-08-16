<?php
	require "php/conexion.php";

	$con = new conectar();

	$sql = "SELECT * from producto where edo = 1";
	$result = mysqli_query($con->conexion(), $sql);
?>


<div>
    <table class = "table hover cell-border compact order-column" id="idtablaProductosBackup">
	        <thead class="thead">
	            <tr>
	                <th>clave</th>
	                <th>nombre</th>
	                <th>existencia</th>
	                <th>punto de reorden</th>
	                <th>costo</th>
	                <th>costo promedio</th>
	                <th>unidad de medida</th>
	            </tr>
	        </thead>

	        <tbody>
	        	<?php
	        		while($mostrar = mysqli_fetch_row($result)) {
	        	?>
	            <tr>
	                <td><?php echo $mostrar[0] ?></td>
	                <td><?php echo $mostrar[1] ?></td>
	                <td><?php echo $mostrar[2] ?></td>
	                <td><?php echo $mostrar[3] ?></td>
	                <td><?php echo $mostrar[4] ?></td>
	                <td><?php echo $mostrar[5] ?></td>
	                <td><?php echo $mostrar[6] ?></td>
	            </tr>
	            <?php

	        		}
	            ?>
	        </tbody>

	        <tfoot class="tfoot">
	            <tr>
					<td>Clave</td>
	                <td>Nombre</td>
	                <td>Existencia</td>
	                <td>Punto de reorden</td>
	                <td>Costo</td>
	                <td>Costo promedio</td>
	                <td>Unidad de medida</td>
	            </tr>
	        </tfoot>
    </table>
</div>

<script type="text/javascript"> 
	$(document).ready(function() {

	    // Setup - add a text input to each footer cell
        $('#idtablaProductosBackup thead tr').clone(true).appendTo( '#idtablaProductosBackup thead' );

        var c = $('#idtablaProductosBackup thead tr:nth-child(2)').addClass("tsearch");

        $('#idtablaProductosBackup thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();

            $(this).addClass("text-center");

            if(title) {
	            $(this).html( '<input class="form-control-sm" type="text" placeholder="Buscar '+title+'" />' );
	     
	            $( 'input', this ).on( 'keyup change', function () {
	                if ( table.column(i).search() !== this.value ) {
	                    table
	                        .column(i)
	                        .search( this.value )
	                        .draw();
	                }
	            } );
        	}
        } );


	    $('#idtablaProductosBackup').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            scrollY:        "500px", 
            columnDefs: [
	            {
			        className: 'dt-body-center',
			        targets: '_all'
			    },
	            {
			        className: 'dt-head-center',
			        targets: '_all'
			    },
	            { width: '7%', targets: 0 }
	        ],
	        fixedColumns: true,
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
			},

			"order": [[ 0, "desc" ]],

            "info":     true,
            "paging":   false
	    });


		var table = $('#idtablaProductosBackup').DataTable();
	}); 


</script>