<?php
	require "php/conexion.php";

    $con = new conectar();

	$sql = "SELECT * from usuario where edo = 0";
	$result = mysqli_query($con->conexion(), $sql);
?>

<div>
    <table class = "table hover cell-border compact order-column" id="idtablaUsuarios">
	        <thead class="thead">
	            <tr>
	                <th>usuario</th>
	                <th>rol</th>
	                <th>nombre</th>
	                <th>puesto</th>
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
	                <td><?php echo $mostrar[1] ?></td>
	                <td><?php echo $mostrar[3] ?></td>
	                <td><?php echo $mostrar[4] ?></td>
	                <td><?php echo $mostrar[5] ?></td>
	                <td><?php echo $mostrar[6] ?></td>
	                <td><?php echo $mostrar[7] ?></td>
					<td class="text-center">
						<span class="btn btn-lg mr-1" style="background-color:transparent" data-toggle="modal" data-target="#modalEditUsuario" id="openEditUsuario" onclick="get('<?php echo $mostrar[1] ?>')">
							<span class="fas fa-edit" id="btn-tool"></span>
						</span>

						<span class="btn btn-lg" style="background-color:transparent" onclick="del('<?php echo $mostrar[1] ?>')">
							<span class="fas fa-trash-alt" id="btn-del"></span>
					</td>
	            </tr>
	            <?php

	        		}
	            ?>
	        </tbody>


	        <tfoot class="tfoot">
	            <tr>
					
	                <th>usuario</th>
	                <th>rol</th>
	                <th>nombre</th>
	                <th>puesto</th>
	                <th>Teléfono</th>
	                <th>Correo</th>
	                <th></th>
	            </tr>
	        </tfoot>
    </table>
</div>

<script type="text/javascript"> 
	$(document).ready(function() {
	    
	    // Setup - add a text input to each footer cell
        $('#idtablaUsuarios thead tr').clone(true).appendTo( '#idtablaUsuarios thead' );

        var c = $('#idtablaUsuarios thead tr:nth-child(2)').addClass("tsearch");

        $('#idtablaUsuarios thead tr:eq(1) th').each( function (i) {
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


	    $('#idtablaUsuarios').DataTable({
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


		var table = $('#idtablaUsuarios').DataTable();
	}); 
</script>