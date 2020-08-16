
	
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalEditIva" tabindex="-1" role="dialog" aria-labelledby="modalEditIvaLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalEditIvaLabel">Modificar IVA</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      		<form class="needs-validation edit" id="frmEditIva" novalidate onsubmit="return false">
	      			<input type="text" hidden="" id="usuario" name="usuario">	
				  	<div class="m-2">
				  		<label for="cantAddPlatillo">IVA</label>
				        <input type="text" class="form-control form-control-lg" id="iva" name="iva" pattern="^(\d+)(\.\d+)?" autocomplete="off" onkeypress='validateNumber(event)'required>
				        <div class="invalid-feedback">
				        	Favor de ingresar un IVA.
				        </div>

				  	</div>
			        

				  	<div class="border-top mt-4 pt-3">
		  				<button type="submit" class="btn btn-secondary btn-lg float-right" id="btnEditIva">Aceptar</button>
					</div>
					
				</form>
	      </div>
	    </div>
	  </div>
	</div>