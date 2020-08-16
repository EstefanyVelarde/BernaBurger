<?php
	require "php/conexion.php";

	$con = new conectar();

	$sql = "SELECT * from venta where edo = 0";
	$result = mysqli_query($con->conexion(), $sql);
?>
<div>
	<p class="mt-4 ml-2 font-weight-bold" style="font-size: 25px">Ventas</p>	

	<div style="height:750px;">
        <table class="table hover cell-border compact order-column" id="idtablaVentas">
            <thead class="thead">
                <tr>
                    <th scope="col">clave</th>
                    <th scope="col">usuario</th>
                    <th scope="col">fecha</th>
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
                        <td class="text-center">
                            <span class="btn btn-md mr-3" style="background-color:transparent" data-toggle="modal" data-target="#modalInfoVenta" id="openInfoVenta"  onclick="getDetails('<?php echo $mostrar[0] ?>', '<?php echo $mostrar[1] ?>', '<?php echo $mostrar[2] ?>', '<?php echo $mostrar[3] ?>')">
                                <span class="fas fa-search" id="btn-tool"></span>
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
        $('#idtablaVentas thead tr').clone(true).appendTo( '#idtablaVentas thead' );

        var c = $('#idtablaVentas thead tr:nth-child(2)').addClass("tsearch");

        $('#idtablaVentas thead tr:eq(1) th').each( function (i) {
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

	    $('#idtablaVentas').DataTable({
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
	            { width: '7%', targets: 0 },
	            { width: '20%', targets: 3 },
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
            "dom": 'Bfrtip',
	        "buttons": [
	            {
	            	"text": 'Reporte',
	                "extend": 'pdfHtml5',
	                exportOptions: {
				         columns: ':visible'
				    },
				    customize: function (doc) {
				        doc.pageMargins = [10,10,10,10];
				        doc.defaultStyle.fontSize = 12;
				        doc.styles.tableHeader.fontSize = 12;
				        doc.styles.title.fontSize = 14;
				        // Remove spaces around page title
				        doc.content[0].text = doc.content[0].text.trim();
				        // Create a footer
				        doc['footer']=(function(page, pages) {
				            return {
				                columns: [
				                    'This is your left footer column',
				                    {
				                        // This is the right column
				                        alignment: 'right',
				                        text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
				                    }
				                ],
				                margin: [10, 0]
				            }
				        });
				    }
				}
	        ]
		
		});

		var table = $('#idtablaVentas').DataTable();
		
	}); 

</script>