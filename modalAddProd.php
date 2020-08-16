
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalAddProd" tabindex="-1" role="dialog" aria-labelledby="modalAddProdLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalAddProdLabel">Agregar producto</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      		<form class="needs-validation add" id="frmAddProd" novalidate onsubmit="return false">
				  	<div class="form-row m-4">
					    <div class="col-md-8 mb-3">
					      	<label for="nombreAddProd">Nombre</label>
						      <input type="text" class="form-control form-control-lg" id="nombreAddProd" name="nombreAddProd" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un nombre.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4">

					    <div class="col-md-4 pr-3 mb-3" >
						      <label for="existAddProd">Existencia</label>
						      <input type="text" class="form-control form-control-lg" id="existAddProd" name="existAddProd" pattern="^(\d+)(\.\d+)?" autocomplete="off" onkeypress='validateNumber(event)' required>
						      <div class="invalid-feedback">
						        	Favor de ingresar una existencia.
						      </div>
					    </div>

						
						<div class="col-md-4 pl-3 mb-3">
						      <label for="puntoAddProd">Punto de reorden</label>
						      <input type="text" class="form-control form-control-lg" id="puntoAddProd" name="puntoAddProd" pattern="^(\d+)(\.\d+)?" autocomplete="off" onkeypress='validateNumber(event)' required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un punto de reorden.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4">
						<div class="col-md-4 pr-3 mb-3">
						      <label for="costoAddProd">Costo</label>
						      <input type="text" class="form-control form-control-lg" id="costoAddProd" name="costoAddProd" pattern="^(\d+)(\.\d+)?" autocomplete="off" onkeypress='validateNumber(event)' required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un costo
						      </div>
					    </div>
						
						<div class="col-md-4 pl-3 mb-3">
						      <label for="costoPromAddProd">Costo promedio</label>
						      <input type="text" class="form-control form-control-lg" id="costoPromAddProd" name="costoPromAddProd" pattern="^(\d+)(\.\d+)?" autocomplete="off"  onkeypress='validateNumber(event)'required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un costo promedio.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4">
						<div class="col-md-4 pr-3 mb-3">
						      <label for="unidadAddProd">Unidad de medida</label>
						      <select class="form-control form-control-lg" id="unidadAddProd" name="unidadAddProd" required>
                              <option>Kg</option>
                              <option>Gr</option>
                              <option>Pza</option>
                              <option>Lts</option>
                            </select>
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
				  				<button type="submit" class="btn btn-secondary btn-lg float-right" id="btnAddProd">Guardar</button>
				  			</div>
				  		</div>
						
					</div>
					
				</form>
	      </div>
	    </div>
	  </div>
	</div>