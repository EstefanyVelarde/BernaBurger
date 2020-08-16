<?php
	require "php/conexion.php";

	$con = new conectar();

	$sql = "SELECT * from orden where edo = 0";
	$result = mysqli_query($con->conexion(), $sql);
?>

<div>
	<p class="mt-4 ml-2 font-weight-bold" style="font-size: 25px">Ordenes</p>			

	<div style="height:750px;">
        <table class="table hover cell-border compact order-column" id="idtablaOrdenes">
            <thead class="thead">
                <tr>
                    <th scope="col">clave</th>
                    <th scope="col">usuario</th>
                    <th scope="col">mesa</th>
                    <th scope="col">instrucciones</th>
                    <th scope="col">estado</th>
                    <th scope="col">importe</th>
                    <th scope="col"></th>
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
                            <span class="btn btn-lg" style="background-color:transparent" data-toggle="modal" data-target="#modalInfoOrden" id="openInfoOrden"  onclick="getDetails('<?php echo $mostrar[0] ?>', '<?php echo $mostrar[2] ?>', '<?php echo $mostrar[3] ?>', '<?php echo $mostrar[5] ?>')">
                                <span class="fas fa-search" id="btn-tool"></span>
                            </span>

                            <span class="btn btn-lg" style="background-color:transparent" onclick="delOrden('<?php echo $mostrar[0] ?>')">
							<span class="fas fa-trash-alt" id="btn-del"></span>
						</span>
                        </td>
                    </tr>
                    <?php

                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript"> 
	$(document).ready(function() {

		// Setup - add a text input to each footer cell
        $('#idtablaOrdenes thead tr').clone(true).appendTo( '#idtablaOrdenes thead' );

        var c = $('#idtablaOrdenes thead tr:nth-child(2)').addClass("tsearch");

        $('#idtablaOrdenes thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();

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

	    $('#idtablaOrdenes').DataTable({
	    	orderCellsTop: true,
            fixedHeader: true,
            scrollY: "600px", 
            columnDefs: [
	            {
			        className: 'dt-body-center',
			        targets: '_all'
			    },
	            {
			        className: 'dt-head-center',
			        targets: '_all'
			    },
	            { width: '10%', targets: 0 }, // id
	            { width: '10%', targets: 6 } // boton
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
			
            "info":     true,
            "paging":   false,
			"order": [[ 0, "desc" ]]
		
		});

		var table = $('#idtablaOrdenes').DataTable();
		
	}); 

</script>