<?php
    require "php/conexion.php";

    session_start();

    $con = new conectar();

    /* PRODUCTOS */
    $sql = "SELECT * from producto where edo = 0";
    $resultProducto = mysqli_query($con->conexion(), $sql);

    /* FOLIO COMPRA */
    $sql2 = " SELECT MAX(idcompra) FROM compra";
    $resultFolio = mysqli_query($con->conexion(), $sql2);
    $fetch = mysqli_fetch_row($resultFolio);
    $folio = $fetch[0];
    $folio++;

    /* IVA */
    $sql3 = " SELECT iva FROM usuario WHERE usuario = '" . $_SESSION['user'] . "';";
    $resultIva = mysqli_query($con->conexion(), $sql3);
    $fetch = mysqli_fetch_row($resultIva);
    $iva = $fetch[0];

?>

<div>
    <div class="row">
        <div class="col-7 p-2 border-right">

            <p class="mt-4 ml-2 font-weight-bold" style="font-size: 25px">Productos</p>

            <div class="border rounded bg-white m-2">

                <div class="p-2" style="height:765px;">
                    <table class="table hover compact cell-border" id="idtablaProductos">
                        <thead class="thead">
                            <tr>
                                <th scope="col">clave</th>
                                <th scope="col">nombre</th>
                                <th scope="col">existencia</th>
                                <th scope="col">unidad</th>
                                <th scope="col">p. reorden</th>
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
                                    <td><?php echo $mostrar[6] ?></td>
                                    <td><?php echo $mostrar[3] ?></td>
                                    <td class="text-center">
                                        <span class="btn btn-md mr-3" style="background-color:transparent" data-toggle="modal" data-target="#modalAddCompra" id="openAddCompra" onclick="get('<?php echo $mostrar[0] ?>')">
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
            <p class="font-weight-bold mt-4 ml-2" style="font-size: 25px">Datos de la compra</p>
            <div class="row">
                <div class="col-3">
                    <p class="px-2" style="font-size: 22px">Folio: <?php echo $folio ?></p>
                </div>
            </div>


            <div class="row mb-2 ml-2">
                <div class="col-9">
                    <div class="row">
                        <p style="font-size: 18px; line-height: 40px;">Proveedor:</p>
                    
                        <input type="text" name="prov" id="prov" class="form-control input-lg w-25 ml-2" autocomplete="off" placeholder="" disabled/>

                        <span class="btn btn-md" style="background-color:transparent" data-toggle="modal" data-target="#modalSearchProv" id="openSearchProv">
                            <span class="fas fa-search" id="btn-tool"></span>
                        </span>
                    </div>
                </div>


                    <div class="col-3">
                        <div class="input-group pr-2">
                            <select class="form-control"  id="tipo" name="tipo">
                              <option value="0">Contado</option>
                              <option value="1">Crédito</option>
                            </select>
                        </div>
                    </div> 
                 
            </div>

            <div class="border rounded bg-white mx-2 mb-1">		
                <div class="table-responsive" style="height:510px;">
                    <table class="table table-hover table-bordered" id="idtablaDetalles">
                        <thead class="theadDatos">
                            <tr>
                                <th scope="col">clave</th>
                                <th scope="col">Producto</th>
                                <th scope="col">cantidad</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Subtotal</th>
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
                        <div class="input-group ml-3">
                            <div class="input-group-prepend">
                                <p class="font-weight-bold pt-2" style="font-size: 15px">Iva</p>
                            </div>
                            <div class="text-uppercase ml-4">
                                <input type="text" class="form-control" style="width:100px" id="idTotalIva" disabled>
                            </div>
                            <div class="text-uppercase ml-4" style="display: none;">
                                <input type="text" class="form-control" style="width:100px" id="idIva" placeholder="<?php echo $iva ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-4">
                        <p class=" float-right px-2 font-weight-bold" style="font-size: 22px">Total: $<span id="sum"></span></p>
                    </div>
                </div>

                <div class="row mx-1">

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
            scrollY: "620px", 
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
                { width: '25%', targets: 1 },
                { width: '7%', targets: 5 }

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