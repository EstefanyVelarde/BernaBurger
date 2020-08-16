
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalEditProv" tabindex="-1" role="dialog" aria-labelledby="modalEditProvLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalEditProvLabel">Editar proveedor</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      		<form class="needs-validation edit" id="frmEditProv" novalidate onsubmit="return false">
				 	<input type="text" hidden="" id="idproveedor" name="idproveedor">	
				  	<div class="form-row m-4">
					    <div class="col-md-6 pr-3 mb-3" id="contactoInput">
					      	<label for="contactoEditProv">Contacto</label>
						      <input type="text" class="form-control form-control-lg" id="contactoEditProv" name="contactoEditProv" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un nombre.
						      </div>
					    </div>
					    <div class="col-md-6 pl-3 mb-3" id="empresaInput">
						      <label for="empresaEditProv">Empresa</label>
						      <input type="text" class="form-control form-control-lg" id="empresaEditProv" name="empresaEditProv" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar una empresa.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4">
						<div class="col-md-9 mb-3" id="direccionInput">
						      <label for="direccionEditProv">Dirección</label>
						      <input type="text" class="form-control form-control-lg" id="direccionEditProv" name="direccionEditProv" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar una dirección.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4">
					  	<div class="col-md-3 pr-3 mb-3" id="telefonoInput">
						      <label for="telefonoEditProv">Teléfono</label>
						      <input type="text" class="form-control form-control-lg" id="telefonoEditProv" name="telefonoEditProv" pattern="^[\d](\d){9}" autocomplete="off" onkeypress='validateNumber(event)' required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un teléfono válido.
						      </div>
					    </div>

					    <div class="col-md-6 pl-3 mb-3" id="correoInput">
						      <label for="correoEditProv">Correo</label>
						      <input type="text" class="form-control form-control-lg" id="correoEditProv" name="correoEditProv" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un correo válido.
						      </div>
					    </div>
				  	</div>

					  <div class="form-row m-4">
					    <div class="col-md-3 pr-3 mb-3" id="codigoInput">
						      <label for="codigoEditProv">Código postal</label>
						      <input type="text" class="form-control form-control-lg" id="codigoEditProv" name="codigoEditProv" pattern="^\d{5}$" autocomplete="off" onkeypress='validateNumber(event)' required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un código postal.
						      </div>
					    </div>
						<div class="col-md-4 pl-3 mb-3" id="rfcInput">
						      <label for="rfcEditProv">RFC</label>
						      <input type="text" class="form-control form-control-lg" id="rfcEditProv" name="rfcEditProv" pattern="^[A-ZÑ&]{3,4}\d{6}(?:[A-Z\d]{3})?$" autocomplete="off" required>
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
				  				<button type="submit" class="btn btn-secondary btn-lg float-right" id="btnEditProv">Guardar</button>
				  			</div>
				  		</div>
						
					</div>
					
				</form>
	      </div>
	    </div>
	  </div>
	</div>

	