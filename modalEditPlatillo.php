
	<!-- Modal -->
	<link rel="stylesheet" href="css/modal.css">
	<div class="modal fade text-uppercase" id="modalEditPlatillo" tabindex="-1" role="dialog" aria-labelledby="modalEditPlatilloLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalEditPlatilloLabel">Detalles del platillo</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
            <form class="needs-validation edit" id="frmEditPlatillo" novalidate onsubmit="return false">
                <input type="text" hidden="" id="idplatillo" name="idplatillo">
                <div class="row">
                    <div class="col-6">
                        <div class="m-2">
                            <label for="nombreEditPlatillo">Nombre</label>
                            <input type="text" class="form-control form-control-lg" id="nombreEditPlatillo" name="nombreEditPlatillo" pattern="^(.+)" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Favor de ingresar un nombre.
                            </div>

                        </div>
                    </div>
                </div>
                <div class="border rounded bg-white mx-2 mb-2 mt-3">		

                    <div class="table-responsive" style="height:510px;">
                        <table class="table table-hover table-bordered" id="idtablaPlatilloDetalles">
                            <thead class="theadDatos">
                                <tr>
                                    <th scope="col">Clave</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody id="idbodyCompraDetalles">
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 mt-4 ">

                        <div class="input-group ml-2">
                            <div class="input-group-prepend">
                                <p class="pt-2" style="font-size: 20px">Precio $</p>
                            </div>
                            <div class="text-uppercase ml-2">
                                <input type="text" class="form-control" style="width:100px" oninput="monto()" onkeypress='validateNumber(event)' id="precioEditPlatillo" pattern="^(\d+)(\.\d+)?" required>
                                <div class="invalid-feedback">
                                    Favor de ingresar un precio.
                                </div>
                            </div>
                        </div>
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
                            <button type="submit" class="btn btn-secondary btn-lg float-right" id="btnEditProd">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
	    </div>
	  </div>
	</div>