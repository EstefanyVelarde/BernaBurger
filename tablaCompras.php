<?php
	require "php/conexion.php";

	$con = new conectar();

	$sql = "SELECT idcompra, usuario, fecha, idproveedor, tipo, status, total from compra where edo = 0";
	$result = mysqli_query($con->conexion(), $sql);
?>

<div>
	<p class="mt-4 ml-2 font-weight-bold" style="font-size: 25px">Compras</p>			

	<div style="height:750px;">
        <table class="table hover cell-border compact order-column" id="idtablaCompras">
            <thead class="thead">
                <tr>
                    <th scope="col">folio</th>
                    <th scope="col">usuario</th>
                    <th scope="col">fecha</th>
                    <th scope="col">proveedor</th>
                    <th scope="col">tipo</th>
                    <th scope="col">estado</th>
                    <th scope="col">total</th>
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
                        <td><?php 

	                        if($mostrar[4] == 0)
	                        	echo "contado";
	                        else
	                        	echo "crédito";

                        ?></td>
                        <td><?php 

                        	if($mostrar[4] == 1) {
	                        	if($mostrar[5] == 0)
									echo "pendiente";
									else
										echo "pagado";
                        	} else
	                        	echo "-";

                        ?></td>
                        <td><?php echo $mostrar[6] ?></td>
						<td class="text-right">
								<?php if($mostrar[4] == 1){
									if($mostrar[5] == 0){?>
									<span class="btn btn-md mr-3" style="background-color:transparent" data-toggle="modal" data-target="#modalEditCompra" id="openEditCompra"  onclick="getDetails('<?php echo $mostrar[0] ?>', '<?php echo $mostrar[2] ?>', '<?php echo $mostrar[6] ?>')">
                                
									<span class="fas fa-edit" id="btn-tool"></span>
									</span>
									
								<?php }}?>
								
                            <span class="btn btn-md mr-3" style="background-color:transparent" data-toggle="modal" data-target="#modalInfoCompra" id="openInfoCompra"  onclick="getDetails('<?php echo $mostrar[0] ?>', '<?php echo $mostrar[2] ?>', '<?php echo $mostrar[6] ?>')">
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
<?php include 'modalEditCompra.php'; ?>
<script type="text/javascript"> 
	$(document).ready(function() {

		// Setup - add a text input to each footer cell
        $('#idtablaCompras thead tr').clone(true).appendTo( '#idtablaCompras thead' );

        var c = $('#idtablaCompras thead tr:nth-child(2)').addClass("tsearch");

        $('#idtablaCompras thead tr:eq(1) th').each( function (i) {
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

	    $('#idtablaCompras').DataTable({
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
	            { width: '20%', targets: 2 },
	            { width: '10%', targets: 7 }
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

		var table = $('#idtablaCompras').DataTable();
		
	}); 

</script>