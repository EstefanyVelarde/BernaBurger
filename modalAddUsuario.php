
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalAddUsuario" tabindex="-1" role="dialog" aria-labelledby="modalAddUsuarioLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalAddUsuarioLabel">Agregar Usuario</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      		<form class="needs-validation add" id="frmAddUsuario" novalidate onsubmit="return false">
				  	<div class="form-row m-4">
					    <div class="col-md-6 pr-3 mb-3" id="nombreInput">
					      	<label for="usuarioAddUsuario">usuario</label>
						      <input type="text" class="form-control form-control-lg" id="usuarioAddUsuario" name="usuarioAddUsuario" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un usuario.
						      </div>
					    </div>
					    <div class="col-md-6 pl-3 mb-3" id="apellidoInput">
						      <label for="rolAddUsuario">rol</label>
						      <select class="form-control form-control-lg" id="unidadAddProd" name="rolAddUsuario" required>
                              <option>cajero</option>
                              <option>mesero</option>
							  <option>admin</option>
                            </select>
							 <div class="invalid-feedback">
						        	Favor de ingresar un rol.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4">
					    <div class="col-md-6 mb-3" id="apellidoInput">
						      <label for="nombreAddUsuario">nombre</label>
						      <input type="text" class="form-control form-control-lg" id="nombreAddUsuario" name="nombreAddUsuario" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un nombre.
						      </div>
					    </div>

					    <div class="col-md-6 pl-3 mb-3" id="apellidoInput">
						      <label for="puestoAddUsuario">puesto</label>
						      <input type="text" class="form-control form-control-lg" id="puestoAddUsuario" name="puestoAddUsuario" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un puesto.
						      </div>
					    </div>
					</div>

					<div class="form-row m-4">
					  	<div class="col-md-3 pr-3 mb-3" id="telefonoInput">
						      <label for="telefonoAddUsuario">Teléfono</label>
						      <input type="text" class="form-control form-control-lg" id="telefonoAddUsuario" name="telefonoAddUsuario" pattern="^[\d](\d){9}" autocomplete="off"required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un teléfono válido.
						      </div>
					    </div>

					    <div class="col-md-6 pl-3 mb-3" id="correoInput">
						      <label for="correoAddUsuario">Correo</label>
						      <input type="text" class="form-control form-control-lg" id="correoAddUsuario" name="correoAddUsuario" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar un correo válido.
						      </div>
					    </div>
				  	</div>

				  	<div class="form-row m-4">
					    <div class="col-md-6 mb-3" id="apellidoInput">
						      <label for="contraAddUsuario">contraseña</label>
						      <input type="text" class="form-control form-control-lg" id="contraAddUsuario" name="contraAddUsuario" pattern="^(.+)" autocomplete="off" required>
						      <div class="invalid-feedback">
						        	Favor de ingresar una contraseña.
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
				  				<button type="submit" class="btn btn-secondary btn-lg float-right" id="btnAddUsuario">Guardar</button>
				  			</div>
				  		</div>
						
					</div>
					
				</form>
	      </div>
	    </div>
	  </div>
	</div>