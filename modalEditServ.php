
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalEditServ" tabindex="-1" role="dialog" aria-labelledby="modalEditServLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalEditServLabel">Editar servicio</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      		<form class="needs-validation edit" id="frmEditServ" novalidate onsubmit="return false">
				 	<input type="text" hidden="" id="idservicio" name="idservicio">
				  	<div class="form-row m-4">
					    <div class="col-md-8 mb-3">
					      	<label for="nombreEditServ">Nombre</label>
						      <input type="text" class="form-control form-control-lg" id="nombreEditServ" name="nombreEditServ" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un nombre.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4">

					    <div class="col-md-4 pr-3 mb-3" >
						      <label for="descEditServ">Descripción</label>
						      <textarea type="text" class="form-control form-control-lg" id="descEditServ" name="descEditServ" pattern="^(.+)" autocomplete="off"  required></textarea>
						      <div class="invalid-feedback">
						        	Favor de ingresar una descripción.
						      </div>
							  
					    </div>

						
						<div class="col-md-4 pl-3 mb-3">
						      <label for="costoEditServ">Costo</label>
						      <input type="text" class="form-control form-control-lg" id="costoEditServ" name="costoEditServ" pattern="^(\d+)(\.\d+)?" autocomplete="off" onkeypress='validateNumber(event)' required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un punto de reorden.
						      </div>
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
				  				<button type="submit" class="btn btn-secondary btn-lg float-right" id="btnEditServ">Guardar</button>
				  			</div>
				  		</div>
						
					</div>
				</form>
	      </div>
	    </div>
	  </div>
	</div>