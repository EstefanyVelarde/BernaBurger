
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalRango" tabindex="-1" role="dialog" aria-labelledby="modalRangoLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalRangoLabel">Seleccionar rango</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      		<form class="needs-validation creaReporteVentas" id="frmReportVentas" novalidate onsubmit="return false">
	      			<input type="text" hidden="" id="idreport" name="idreport">

					<div class="form-row m-4">

					     <div class="input-group ml-2">
                            <div class="input-group-prepend">
                                <p class="pt-2" style="font-size: 20px">De</p>
                            </div>
                            <div class="text-uppercase ml-2">
                                <input type="date" class="form-control" id="minVenta" name="minVenta" required>
                            </div>
                    	</div>
					</div>

					<div class="form-row mx-4 mb-4">
						<div class="input-group ml-2">
                            <div class="input-group-prepend">
                                <p class="pt-2" style="font-size: 20px">Al</p>
                            </div>
                            <div class="text-uppercase ml-2">
                                <input type="date" class="form-control" id="maxVenta" name="maxVenta" required>
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
				  				<button type="submit" class="btn btn-secondary btn-lg float-right" id="btnReportVentas">Generar</button>
				  			</div>
				  		</div>
						
					</div>
					
				</form>
	      </div>
	    </div>
	  </div>
	</div>