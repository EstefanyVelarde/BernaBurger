function add() {
	var form = document.getElementById('frmAddProd');  

	setTimeout(() => {reset(form);}, 100);

	datos = $('#frmAddProd').serialize();

	alertify.set('notifier','position', 'top-right');

	$.ajax({
		type:"POST",
		data:datos,
		url:"php/productos/agregar.php",
		success:function(r) {
			if(r == 1) {
				
				alertify.success("Agregado con éxito");

				$('#tablaProductos').load('tablaProductos.php');

			} else {
				alertify.error("No se pudo agregar producto");
			}
		}
	});
}

function edit() {
	alertify.set('notifier','position', 'top-right');

	datos = $('#frmEditProd').serialize();
	
	$.ajax({
		type:"POST",
		data:datos,
		url:"php/productos/editar.php",
		success:function(r) {
			if(r == 1) {
                alertify.success("Actualizado con exito");
                
				$('#tablaProductos').load('tablaProductos.php');
			} else {
				alertify.error("No se pudo actualizar producto");
			}
		}
	});
}

function get(idproducto) {
	var form = document.getElementById('frmEditProd');  
	
	setTimeout(() => {reset(form);}, 100);

	$.ajax({
		type:"POST",
		data:"idproducto=" + idproducto,
		url:"php/productos/obtenDatos.php",
		success:function(r) {
			d=jQuery.parseJSON(r);

			$('#idproducto').val(d['idproducto']);
            $('#nombreEditProd').val(d['nombre']);
            $('#existEditProd').val(d['exist']);
			$('#puntoEditProd').val(d['punto']);
			$('#costoEditProd').val(d['costo']);
			$('#costoPromEditProd').val(d['costoProm']);
			$('#unidadEditProd').val(d['unidad']);
		}
	});
}

function del(idproducto) {
	alertify.set('confirm','position', 'center');

	alertify.confirm('Eliminar producto', '¿Seguro que desea eliminar este producto?', 
		function(){ 
			alertify.set('notifier','position', 'top-right');
			
			$.ajax({
				type:"POST",
				data:"idproducto=" + idproducto,
				url:"php/productos/eliminar.php",
				success:function(r) {
					if(r==1) {
						alertify.success("Eliminado con éxito");

						$('#tablaProductos').load('tablaProductos.php');
					} else{
						alertify.success("No se pudo eliminar");
					}
				}
			});
		}
		, function(){

		});
}

function reset(form) { 
    form.classList.remove('was-validated');               
}

function validateNumber(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


$(document).ready(function(){
    
    $('#tablaProductos').load('tablaProductos.php');
    $('#tablaProductosBackup').load('tablaProductosBackup.php');

    /* BOOTSTRAP VALIDATION */
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
	var forms = document.getElementsByClassName('needs-validation');

	// Loop over them and prevent submission
	var validation = Array.prototype.filter.call(forms, function(form) {
		form.addEventListener('submit', function(event) {
			if (form.checkValidity() === false) {
				event.preventDefault();
				event.stopPropagation();
			} else {
				if(form.classList.contains("add")) {
					add();
					$('#modalAddProd').modal('toggle');
					setTimeout(() => {$('#frmAddProd')[0].reset();}, 100);

					
				} else {
					edit();

					$('#modalEditProd').modal('toggle');
					
					
				}
			}

			form.classList.add('was-validated');
		}, false);
	});
    
    /* END BOOTSTRAP VALIDATION */


    /* MODAL HINTS */

	var modalMessageFooter = document.getElementsByClassName("modal-message-footer")[0];
	var iconHint = document.getElementsByClassName("icon-hint")[0];

	// ADD PRODUCTO HINTS
	$('#openAddProducto').click(function(form){
		modalMessageFooter.style.display='none'
		iconHint.style.display='none';
	});

	$('#nombreAddProd').click(function(){
		modalMessageFooter.innerHTML="Proporcionar al menos un nombre de producto ej.: Pan Integral.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#existAddProd').click(function(){
		modalMessageFooter.innerHTML="Proporcionar un número de existencia de producto.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#puntoAddProd').click(function(){
		modalMessageFooter.innerHTML="Proporcionar un número de punto de reorden para el producto.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#costoAddProd').click(function(){
		modalMessageFooter.innerHTML="Proporcionar un número de costo del producto.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#costoPromAddProd').click(function(){
		modalMessageFooter.innerHTML="Proporcionar un número de costo promedio del producto.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#unidadAddProd').click(function(){
		modalMessageFooter.innerHTML="Seleccionar una unidad de medida.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
	});

	/* END MODAL HINTS */
});