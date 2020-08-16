<?php
	require "php/conexion.php";

	$con = new conectar();

	$sql = "SELECT * from servicio where edo = 0";
	$result = mysqli_query($con->conexion(), $sql);
?>


<div>
    <table class = "table hover cell-border compact order-column" id="idtablaServicios">
	        <thead class="thead">
	            <tr>
	                <th>clave</th>
	                <th>nombre</th>
	                <th>descripcion</th>
	                <th>precio</th>
	                
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
	               
					<td class="text-center">
						<span class="btn btn-lg mr-1" style="background-color:transparent" data-toggle="modal" data-target="#modalEditServ" id="openEditServicio" onclick="get('<?php echo $mostrar[0] ?>')">
							<span class="fas fa-edit" id="btn-tool"></span>
						</span>

						<span class="btn btn-lg" style="background-color:transparent" onclick="del('<?php echo $mostrar[0] ?>')">
							<span class="fas fa-trash-alt" id="btn-del"></span>
						</span>
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
	                <td>Descripcion</td>
	                <td>Costo</td>
					<td></td>
	            </tr>
	        </tfoot>
    </table>
</div>

<script type="text/javascript"> 
	$(document).ready(function() {

	    // Setup - add a text input to each footer cell
        $('#idtablaServicios thead tr').clone(true).appendTo( '#idtablaServicios thead' );

        var c = $('#idtablaServicios thead tr:nth-child(2)').addClass("tsearch");

        $('#idtablaServicios thead tr:eq(1) th').each( function (i) {
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


	    $('#idtablaServicios').DataTable({
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
	            { width: '10%', targets: 4 }
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


		var table = $('#idtablaServicios').DataTable();
	}); 


</script>