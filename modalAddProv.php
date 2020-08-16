
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalAddProv" tabindex="-1" role="dialog" aria-labelledby="modalAddProvLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalAddProvLabel">Agregar proveedor</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      		<form class="needs-validation add" id="frmAddProv" novalidate onsubmit="return false">
				  	<div class="form-row m-4">
					    <div class="col-md-6 pr-3 mb-3" id="contactoInput">
					      	<label for="contactoAddProv">Contacto</label>
						      <input type="text" class="form-control form-control-lg" id="contactoAddProv" name="contactoAddProv" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un nombre.
						      </div>
					    </div>
					    <div class="col-md-6 pl-3 mb-3" id="empresaInput">
						      <label for="empresaAddProv">Empresa</label>
						      <input type="text" class="form-control form-control-lg" id="empresaAddProv" name="empresaAddProv" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar una empresa.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4">
						<div class="col-md-9 mb-3" id="direccionInput">
						      <label for="direccionAddProv">Dirección</label>
						      <input type="text" class="form-control form-control-lg" id="direccionAddProv" name="direccionAddProv" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar una dirección.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4">
					  	<div class="col-md-3 pr-3 mb-3" id="telefonoInput">
						      <label for="telefonoAddProv">Teléfono</label>
						      <input type="text" class="form-control form-control-lg" id="telefonoAddProv" name="telefonoAddProv" pattern="^[\d](\d){9}" autocomplete="off" onkeypress='validateNumber(event)' required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un teléfono válido.
						      </div>
					    </div>

					    <div class="col-md-6 pl-3 mb-3" id="correoInput">
						      <label for="correoAddProv">Correo</label>
						      <input type="text" class="form-control form-control-lg" id="correoAddProv" name="correoAddProv" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un correo válido.
						      </div>
					    </div>
				  	</div>

					  <div class="form-row m-4">
					    <div class="col-md-3 pr-3 mb-3" id="codigoInput">
						      <label for="codigoAddProv">Código postal</label>
						      <input type="text" class="form-control form-control-lg" id="codigoAddProv" name="codigoAddProv" pattern="^\d{5}$" autocomplete="off" onkeypress='validateNumber(event)' required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un código postal.
						      </div>
					    </div>
						<div class="col-md-4 pl-3 mb-3" id="rfcInput">
						      <label for="rfcAddProv">RFC</label>
						      <input type="text" class="form-control form-control-lg" id="rfcAddProv" name="rfcAddProv" pattern="^[A-ZÑ&]{3,4}\d{6}(?:[A-Z\d]{3})?$" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar RFC.
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
				  				<button type="submit" class="btn btn-secondary btn-lg float-right" id="btnAddProv">Guardar</button>
				  			</div>
				  		</div>
						
					</div>
					
				</form>
	      </div>
	    </div>
	  </div>
	</div>