
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalEditCompra" tabindex="-1" role="dialog" aria-labelledby="modalEditCompraLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalEditCompraLabel">Detalles de la compra</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
          
	      <div class="modal-body">
          <form class="needs-validation edit" id="frmEditCompra" novalidate onsubmit="return false">

            <div class="row">
                <div class="col-3">
                    <p class="px-2" style="font-size: 22px">Folio: <span id="idcompra"></span> </p> 
                </div>
                <div class="col-9">
                    <p class="px-2" style="float: right; font-size: 22px"><span id="fecha"></span></p> 
                </div>
           
         	

                <div class="col-9">
                    <p class="px-2" style="float: left; font-size: 22px">Estado</span></p>
                   
                    <select class="col-8 form-control" id="estadoCompra" name="estadoCompra" required>
                              <option value=0>Pendiente</option>
                              <option value=1>Pagado</option>
                            </select>
                    </div>

            </div>
                <div class="row">
                    <div class="col-6 mt-4">

                    </div>
                    <div class="col-6 mt-4 ">
                        <p class=" float-right px-2 font-weight-bold" style="font-size: 25px">Total: $<span id="total"></span></p>
                    </div>
                </div>
                <div class="col-12">
				  				<button onclick="edit()" class="btn btn-secondary btn-lg float-right" id="btnEditCompra">Guardar</button>
				  			</div>
                
	      </div>
          </form>
	    </div>
	  </div>
	</div>