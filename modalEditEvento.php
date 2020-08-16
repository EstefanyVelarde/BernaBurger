
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalEditEvento" tabindex="-1" role="dialog" aria-labelledby="modalEditEventoLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalEditEventoLabel">Detalles del evento</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p class="px-2" style="font-size: 22px">Folio: <span name="idevento" id="idevento"></span></p>
                    </div>
                </div>

             <div class="row mb-2 ml-2">
                <div class="col-6">
                    <div class="row">
                        <p style="font-size: 18px; line-height: 40px;">Cliente:</p>
                    
                        <input type="text" name="clienteEditEvento" id="clienteEditEvento" class="form-control input-lg w-25 ml-2" autocomplete="off" placeholder="" disabled/>
                    </div>
                </div>

                <div class="col-6">
                    <p class="px-2" style="float: right; font-size: 22px"><span id="fechaEvt"></span></p> 
                </div>
            </div>

            <div class="border rounded bg-white mx-2 mb-1">     
                <div class="table-responsive" style="height:510px;">
                    <table class="table table-hover table-bordered" id="idtablaEventoDetalles">
                        <thead class="theadDatos">
                            <tr>
                                <th scope="col" width="15%">clave</th>
                                <th scope="col">servicio</th>
                                <th scope="col">precio</th>
                            </tr>
                        </thead>
                        <tbody id="idbodyEventoDetalles">
                        </tbody>
                    </table>
                </div>
            </div>
 
                <div class="row mb-3">
                    <div class="col-6 mt-4">
                        <label class="mt-2" for="dirEvt">Dirección</label>
                        <textarea class="form-control" id="dirEvt" rows="3"></textarea>
                    </div>
                    <div class="col-6 mt-4">
                        <p class=" float-right px-2 font-weight-bold" style="font-size: 22px">Total: $<span id="totalEditEvento"></span></p>
                    </div>
                </div>
            </div>
	    </div>
	  </div>
	</div>