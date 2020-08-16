
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalInfoCompra" tabindex="-1" role="dialog" aria-labelledby="modalInfoCompraLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalInfoCompraLabel">Detalles de la compra</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
            <div class="row">
                <div class="col-3">
                    <p class="px-2" style="font-size: 22px">Folio: <span id="idcompraInfo"></span> </p> 
                </div>
                <div class="col-9">
                    <p class="px-2" style="float: right; font-size: 22px"><span id="fechaInfo"></span></p> 
                </div>
            </div>
            <div class="border rounded bg-white mx-2 mb-1">		

                <div class="table-responsive" style="height:510px;">
                    <table class="table table-hover table-bordered" id="idtablaCompraDetalles">
                        <thead class="theadDatos">
                            <tr>
                                <th scope="col">Clave</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="idbodyCompraDetalles">
                        </tbody>
                    </table>
                </div>
            </div>

            <div>
                <div class="row">
                    <div class="col-6 mt-4">

                    </div>
                    <div class="col-6 mt-4 ">
                        <p class=" float-right px-2 font-weight-bold" style="font-size: 25px">Total: $<span id="totalInfo"></span></p>
                    </div>
                </div>
                
	      </div>
	    </div>
	  </div>
	</div>