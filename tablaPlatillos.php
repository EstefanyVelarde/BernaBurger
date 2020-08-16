<?php
	require "php/conexion.php";

	$con = new conectar();

	$sql = "SELECT idplatillo, nombre, precio from platillo where edo = 0";
	$result = mysqli_query($con->conexion(), $sql);
?>

<div>
	<p class="mt-4 ml-2 font-weight-bold" style="font-size: 25px">Platillos</p>			

	<div style="height:750px;">
        <table class="table hover cell-border compact order-column" id="idtablaPlatillos">
            <thead class="thead">
                <tr>
                    <th scope="col">clave</th>
                    <th scope="col">nombre</th>
                    <th scope="col">precio</th>
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
                        <td class="text-center">
                            <span class="btn btn-lg" style="background-color:transparent" data-toggle="modal" data-target="#modalEditPlatillo" id="openEditPlatillo"  onclick="getDetails('<?php echo $mostrar[0] ?>', '<?php echo $mostrar[1] ?>', '<?php echo $mostrar[2] ?>')">
                                <span class="fas fa-edit" id="btn-tool"></span>
                            </span>

                            <span class="btn btn-lg" style="background-color:transparent" onclick="delPlatillo('<?php echo $mostrar[0] ?>')">
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
        $('#idtablaPlatillos thead tr').clone(true).appendTo( '#idtablaPlatillos thead' );

        var c = $('#idtablaPlatillos thead tr:nth-child(2)').addClass("tsearch");

        $('#idtablaPlatillos thead tr:eq(1) th').each( function (i) {
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

	    $('#idtablaPlatillos').DataTable({
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
	            { width: '10%', targets: 0 },
	            { width: '10%', targets: 3 }
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

		var table = $('#idtablaPlatillos').DataTable();
		
	}); 

</script>