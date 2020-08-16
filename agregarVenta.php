<?php
    require "php/conexion.php";

    $con = new conectar();

    $sql = "SELECT * from orden where edo = 0 AND estado = 'pendiente'";
    $resultOrden = mysqli_query($con->conexion(), $sql);


    $sql2 = " SELECT MAX(idventa) FROM venta";
    $resultFolio = mysqli_query($con->conexion(), $sql2);
    $fetch = mysqli_fetch_row($resultFolio);
    $folio = $fetch[0];
    $folio++;

    $ordenesSelect = '';

    session_start();
?>

<div>
    <div class="row">
        <div class="col-7 p-2 border-right">

            <p class="mt-4 ml-2 font-weight-bold" style="font-size: 25px">Ordenes</p>

            <div class="border rounded bg-white m-2">
                <div class="p-2" style="height:745px;">
                    <table class="table hover compact cell-border" id="idtablaOrdenes">
                        <thead class="thead">
                            <tr>
                                <th scope="col">Núm.</th>
                                <th scope="col">Mesa</th>
                                <th scope="col">Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($mostrar = mysqli_fetch_row($resultOrden)) {
                                ?>
                                <tr>
                                    <td><?php echo $mostrar[0] ?></td>
                                    <td><?php echo $mostrar[2] ?></td>
                                    <td><?php echo $mostrar[4] ?></td>
                                    <td class="text-center">
                                        <span class="btn btn-md mr-3" style="background-color:transparent" onclick="getAll('<?php echo $mostrar[0] ?>')">
                                            <span class="fas fa-plus" id="btn-tool"></span>
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
        </div>


        <div class="col-5 p-2">
            <p class="font-weight-bold mt-4 ml-2" style="font-size: 25px">Datos de la venta</p>
            <div class="row">
                <div class="col-12">
                    <p class="px-2" style="font-size: 22px">Folio: <?php echo $folio ?></p>
                </div>
            </div>
            <div class="border rounded bg-white mx-2 mb-1">					

                <div class="table-responsive" style="height:510px;">
                    <table class="table table-hover table-bordered" id="idtablaDetalles">
                        <thead class="theadDatos">
                            <tr>
                                <th scope="col">Orden</th>
                                <th scope="col">Platillo</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Importe</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="idbodyDetalles">
                        </tbody>
                    </table>
                </div>
            </div>

            <div>
                <div class="row">
                    <div class="col-6 mt-4">
                        <div class="input-group ml-2">
                            <div class="input-group-prepend">
                                <p class="font-weight-bold pt-2" style="font-size: 15px">Monto</p>
                            </div>
                            <div class="text-uppercase ml-4">
                                <input type="text" class="form-control" style="width:100px" oninput="monto()" onkeypress='validateNumber(event)' id="idMonto">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-4">
                        <p class=" float-right px-2 font-weight-bold" style="font-size: 22px">Total: $<span id="sum"></span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group ml-2">
                            <div class="input-group-prepend">
                                <p class="font-weight-bold pt-2" style="font-size: 15px">Cambio</p>
                            </div>
                            <div class="text-uppercase px-3">
                                <input type="text" class="form-control" style="width:100px" onkeypress='validateNumber(event)' id="idCambio" disabled>
                            </div>
                        </div>
                    </div>	

                </div>

                <div class="row mb-4">
                    <div class="col-6">
                        <button class="btn text-uppercase btn-secondary float-left mt-4 mb-1 ml-2" type="button" onclick="reset()">Cancelar</button>
                    </div>
                    <div class="col-6">
                        <button class="btn text-uppercase btn-secondary float-right mt-4 mb-1 mr-2" type="button" onclick="add('<?php echo $folio ?>', '<?php echo $_SESSION['user'] ?>')">Agregar</button>
                    </div>
                </div>
            </div>
        </div>

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
            scrollY: "590px", 
            columnDefs: [
                {
                    className: 'dt-body-center',
                    targets: '_all'
                },
                {
                    className: 'dt-head-center',
                    targets: '_all'
                },
                { width: '20%', targets: 0 },
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

            "paging":   false,
            "info":     false
        });

        var table = $('#idtablaOrdenes').DataTable();

        document.getElementById("sum").innerHTML = sum;

   }); 


</script>