
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalAddEvento" tabindex="-1" role="dialog" aria-labelledby="modalAddEventoLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalAddEventoLabel">Agregar evento</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      		<form class="needs-validation add" id="frmAddEvento" novalidate onsubmit="return false">
				 	<input type="text" hidden="" id="idservicio" name="idservicio">
				 	<input type="text" hidden="" id="nombreServ" name="nombreServ">
				  	<div class="m-2">
				  		<label for="cantAddEvento">Cantidad</label>
				        <input type="text" class="form-control form-control-lg" id="cantAddEvento" name="cantAddEvento" pattern="^(\d+)(\.\d+)?" autocomplete="off" onkeypress='validateNumber(event)'required>
				        <div class="invalid-feedback">
				        	Favor de ingresar una cantidad.
				        </div>

				  	</div>
			        

				  	<div class="border-top mt-4 pt-3">
		  				<button type="submit" class="btn btn-secondary btn-lg float-right" id="btnAddEvento">Agregar</button>
					</div>
					
				</form>
	      </div>
	    </div>
	  </div>
	</div>