<?php
	require "php/conexion.php";

    $con = new conectar();

	$sql = "SELECT * from cliente where edo = 0";
	$result = mysqli_query($con->conexion(), $sql);
?>

<div>
    <table class = "table hover cell-border compact order-column" id="idtablaClientes">
	        <thead class="thead">
	            <tr>
	                <th>Clave</th>
	                <th>Nombre</th>
	                <th>Apellido</th>
	                <th>Dirección</th>
	                <th>Teléfono</th>
	                <th>Correo</th>
	                <th></th>
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
					<td class="text-center">
						<span class="btn btn-lg mr-1" style="background-color:transparent" data-toggle="modal" data-target="#modalEditCliente" id="openEditCliente" onclick="get('<?php echo $mostrar[0] ?>')">
							<span class="fas fa-edit" id="btn-tool"></span>
						</span>

						<span class="btn btn-lg" style="background-color:transparent" onclick="del('<?php echo $mostrar[0] ?>')">
							<span class="fas fa-trash-alt" id="btn-del"></span>
					</td>
	            </tr>
	            <?php

	        		}
	            ?>
	        </tbody>


	        <tfoot class="tfoot">
	            <tr>
					<td>Clave</td>
	                <td>Nombre</td>
	                <td>Apellido</td>
	                <td>Dirección</td>
	                <td>Teléfono</td>
	                <td>Correo</td>
	                <td></td>
	            </tr>
	        </tfoot>
    </table>
</div>

<script type="text/javascript"> 
	$(document).ready(function() {
	    
	    // Setup - add a text input to each footer cell
        $('#idtablaClientes thead tr').clone(true).appendTo( '#idtablaClientes thead' );

        var c = $('#idtablaClientes thead tr:nth-child(2)').addClass("tsearch");

        $('#idtablaClientes thead tr:eq(1) th').each( function (i) {
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


	    $('#idtablaClientes').DataTable({
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
	            { width: '7%', targets: 0 },
	            { width: '10%', targets: 6 }
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
            "paging":   false,
			
	    });


		var table = $('#idtablaClientes').DataTable();
	}); 
</script>