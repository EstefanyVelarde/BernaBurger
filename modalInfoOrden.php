
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalInfoOrden" tabindex="-1" role="dialog" aria-labelledby="modalInfoOrdenLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalInfoOrdenLabel">Detalles de la orden</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
            <div class="row">
                <div class="col-10">
                    <p class="px-2" style="font-size: 22px">Folio: <span id="idorden"></span> </p> 
                </div>
                <div class="col-2">
                    <p class="px-2" style="font-size: 22px">mesa: <span id="mesaInfo"></span> </p> 
                </div>
            </div>
            <div class="border rounded bg-white mx-2 mb-1">					

                <div class="table-responsive" style="height:510px;">
                    <table class="table table-hover table-bordered" id="idtablaOrdenDetalles">
                        <thead class="theadDatos">
                            <tr>
                                <th scope="col">Platillo</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Importe</th>
                            </tr>
                        </thead>
                        <tbody id="idbodyOrdenDetalles">
                        </tbody>
                    </table>
                </div>
            </div>

            <div>
                <div class="row mb-4">
                    <div class="col-6 mt-4">
                        <label for="inst">Instrucciones</label>
                        <textarea class="form-control" id="instInfo" rows="3"></textarea>
                    </div>
                    <div class="col-6 mt-4 ">
                        <p class=" float-right px-2 font-weight-bold" style="font-size: 25px">Total: $<span id="importeInfo"></span></p>
                    </div>
                </div>
                
	      </div>
	    </div>
	  </div>
	</div>