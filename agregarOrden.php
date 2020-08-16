<?php
    require "php/conexion.php";

    session_start();

    $con = new conectar();

    /* PRODUCTOS */
    $sql = "SELECT * from platillo where edo = 0";
    $resultProducto = mysqli_query($con->conexion(), $sql);

    /* FOLIO */
    $sql2 = " SELECT MAX(idorden) FROM orden";
    $resultFolio = mysqli_query($con->conexion(), $sql2);
    $fetch = mysqli_fetch_row($resultFolio);
    $folio = $fetch[0];
    $folio++;
?>

<div>
    <div class="row">
        <div class="col-7 p-2  border-right">

            <p class="mt-4 ml-2 font-weight-bold" style="font-size: 25px">Platillos</p>

            <div class="border rounded bg-white m-2">

                <div class="p-2" style="height:790px;">
                    <table class="table hover compact cell-border" id="idtablaProductos">
                        <thead class="thead">
                            <tr>
                                <th scope="col">clave</th>
                                <th scope="col">nombre</th>
                                <th scope="col">precio</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($mostrar = mysqli_fetch_row($resultProducto)) {
                                ?>
                                <tr>
                                    <td><?php echo $mostrar[0] ?></td>
                                    <td><?php echo $mostrar[1] ?></td>
                                    <td><?php echo $mostrar[2] ?></td>
                                    <td class="text-center">
                                        <span class="btn btn-md mr-3" style="background-color:transparent" id="openAddPlatillo" onclick="get('<?php echo $mostrar[0] ?>','<?php echo $mostrar[1] ?>','<?php echo $mostrar[2] ?>')">
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
            <p class="font-weight-bold mt-4 ml-2" style="font-size: 25px">Datos de la orden</p>


            <div class="row mb-2 ml-2">
                <div class="col-9">
                    <div class="row">
                        <p class="px-2" style="font-size: 22px">Folio: <?php echo $folio ?></p>
                    </div>
                </div>


                    <div class="col-3">
                        <div class="row">
                            <p class="mr-2" style="font-size: 18px; line-height: 40px;">Mesa:</p>
                            <div class="input-group w-50 pr-2">
                                <select class="form-control"  id="mesa" name="mesa">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                 
            </div>

            <div class="border rounded bg-white mx-2 mb-1">		
                <div class="table-responsive" style="height:510px;">
                    <table class="table table-hover table-bordered" id="idtablaDetalles">
                        <thead class="theadDatos">
                            <tr>
                                <th scope="col">clave</th>
                                <th scope="col" width="50%">platillo</th>
                                <th scope="col">precio</th>
                                <th scope="col" width="20%">cant</th>
                                <th scope="col">importe</th>
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
                    <div class="col-8 mt-4">
                        <div class="ml-2">
                            <label for="inst">Instrucciones</label>
                            <textarea class="form-control" id="inst" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-4 mt-4">
                        <p class=" float-right px-2 font-weight-bold" style="font-size: 22px">Total: $<span id="sum"></span></p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-6">
                        <button class="btn text-uppercase btn-secondary float-left mt-4 mb-1 ml-2" type="button" onclick="loadTables()">Cancelar</button>
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
        $('#idtablaProductos thead tr').clone(true).appendTo( '#idtablaProductos thead' );

        var c = $('#idtablaProductos thead tr:nth-child(2)').addClass("tsearch");

        $('#idtablaProductos thead tr:eq(1) th').each( function (i) {
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


       $('#idtablaProductos').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            scrollY: "650px", 
            columnDefs: [
                {
                    className: 'dt-body-center',
                    targets: '_all'
                },
                {
                    className: 'dt-head-center',
                    targets: '_all'
                },
                { width: '13%', targets: 0 },
                { width: '7%', targets: 3 }

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
            "info":     false,
            "responsive": true
        });

        var table = $('#idtablaProductos').DataTable();


        document.getElementById("sum").innerHTML = sum;

   }); 


</script>