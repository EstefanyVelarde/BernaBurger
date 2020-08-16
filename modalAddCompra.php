
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalAddCompra" tabindex="-1" role="dialog" aria-labelledby="modalAddCompraLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalAddCompraLabel">Agregar producto</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      		<form class="needs-validation add" id="frmAddCompra" novalidate onsubmit="return false">
				 	<input type="text" hidden="" id="idproducto" name="idproducto">
				  	<div class="form-row mx-4" style="display: none;">
					    <div class="col-md-12">
					      	<label for="nombreAddCompra">Nombre</label>
						      <input type="text" class="form-control form-control-lg" id="nombreAddCompra" name="nombreAddCompra" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un nombre.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4" style="display: none;">

					    <div class="col-md-4 pr-3 mb-3">
						      <label for="existAddCompra">Existencia</label>
						      <input type="text" class="form-control form-control-lg" id="existAddCompra" name="existAddCompra" pattern="^(\d+)(\.\d+)?" autocomplete="off" onkeypress='validateNumber(event)'required>
						      <div class="invalid-feedback">
						        	Favor de ingresar una existencia.
						      </div>
					    </div>

						
						<div class="col-md-4 pl-3 mb-3">
						      <label for="puntoAddCompra">Punto de reorden</label>
						      <input type="text" class="form-control form-control-lg" id="puntoAddCompra" name="puntoAddCompra" pattern="^(\d+)(\.\d+)?" autocomplete="off" onkeypress='validateNumber(event)' required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un punto de reorden.
						      </div>
					    </div>
					</div>

					<div class="form-row mx-4 mb-4">
						<div class="col-md-6 pr-3 mb-3">
						      <label for="costoAddCompra">Costo</label>
						      <input type="text" class="form-control form-control-lg" id="costoAddCompra" name="costoAddCompra" pattern="^(\d+)(\.\d+)?" autocomplete="off" onkeypress='validateNumber(event)'required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un costo
						      </div>
					    </div>

					    <div class="col-md-6 pr-3 mb-3">
						      <label for="cantAddCompra">Cantidad</label>
						      <input type="text" class="form-control form-control-lg" id="cantAddCompra" name="cantAddCompra" pattern="^(\d+)(\.\d+)?" autocomplete="off" onkeypress='validateNumber(event)'required>
						      <div class="invalid-feedback">
						        	Favor de ingresar una cantidad.
						      </div>
					    </div>
						
						
						<div class="col-md-4 pl-3 mb-3" style="display: none;">
						      <label for="costoPromAddCompra">Costo promedio</label>
						      <input type="text" class="form-control form-control-lg" id="costoPromAddCompra" name="costoPromAddCompra" pattern="^(\d+)(\.\d+)?" autocomplete="off" onkeypress='validateNumber(event)'required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un costo promedio.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4" style="display: none;">
						<div class="col-md-4 pr-3 mb-3">
						      <label for="unidadAddProd">Unidad de medida</label>
						      <input type="text" class="form-control form-control-lg" id="unidadAddCompra" name="unidadAddCompra" pattern="^(.+)" autocomplete="off" required>
					    </div>
					</div>


				  	<div class="border-top p-4">
				  		<div class="row">
				  			<div class="col-9">
				  				<div class="row">
				  					<i class="col-1 icon-hint fas fa-info-circle pt-3"></i>

									<div class="col">
										<div class="modal-message-footer" id="message-footer"></div>
									</div>
				  				</div>
				  				
				  			</div>

				  			<div class="col-3">
				  				<button type="submit" class="btn btn-secondary btn-lg float-right" id="btnAddCompra">Agregar</button>
				  			</div>
				  		</div>
						
					</div>
					
				</form>
	      </div>
	    </div>
	  </div>
	</div>