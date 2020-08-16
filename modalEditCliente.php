
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalEditCliente" tabindex="-1" role="dialog" aria-labelledby="modalEditClienteLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalEditClienteLabel">Editar cliente</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      		<form class="needs-validation edit" id="frmEditCliente" novalidate onsubmit="return false">
				 	<input type="text" hidden="" id="idcliente" name="idcliente">	
				  	<div class="form-row m-4">
					    <div class="col-md-6 pr-3 mb-3" id="nombreInput">
					      	<label for="nombreEditCliente">Nombre</label>
						      <input type="text" class="form-control form-control-lg" id="nombreEditCliente" name="nombreEditCliente" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un nombre.
						      </div>
					    </div>
					    <div class="col-md-6 pl-3 mb-3" id="apellidoInput">
						      <label for="apellidoEditCliente">Apellido</label>
						      <input type="text" class="form-control form-control-lg" id="apellidoEditCliente" name="apellidoEditCliente" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un apellido.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4">
						<div class="col-md-9 mb-3" id="direccionInput">
						      <label for="direccionEditCliente">Dirección</label>
						      <input type="text" class="form-control form-control-lg" id="direccionEditCliente" name="direccionEditCliente" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar una dirección.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4">
					  	<div class="col-md-3 pr-3 mb-3" id="telefonoInput">
						      <label for="telefonoEditCliente">Teléfono</label>
						      <input type="text" class="form-control form-control-lg" id="telefonoEditCliente" name="telefonoEditCliente" pattern="^[\d](\d){9}" autocomplete="off"required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un teléfono válido.
						      </div>
					    </div>

					    <div class="col-md-6 pl-3 mb-3" id="correoInput">
						      <label for="correoEditCliente">Correo</label>
						      <input type="text" class="form-control form-control-lg" id="correoEditCliente" name="correoEditCliente" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un correo válido.
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
				  				<button type="submit" class="btn btn-secondary btn-lg float-right" id="btnEditCliente">Guardar</button>
				  			</div>
				  		</div>
						
					</div>
					
				</form>
	      </div>
	    </div>
	  </div>
	</div>

	