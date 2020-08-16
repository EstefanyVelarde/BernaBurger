function add() {
	var form = document.getElementById('frmAddServ');  

	setTimeout(() => {reset(form);}, 100);

	datos = $('#frmAddServ').serialize();

	alertify.set('notifier','position', 'top-right');

	$.ajax({
		type:"POST",
		data:datos,
		url:"php/servicios/agregar.php",
		success:function(r) {
			if(r == 1) {
				
				alertify.success("Agregado con éxito");

				$('#tablaServicios').load('tablaServicios.php');

			} else {
				alertify.error("No se pudo agregar servicio");
			}
		}
	});
}

function edit() {
	alertify.set('notifier','position', 'top-right');

	datos = $('#frmEditServ').serialize();
	
	$.ajax({
		type:"POST",
		data:datos,
		url:"php/servicios/editar.php",
		success:function(r) {
			if(r == 1) {
                alertify.success("Actualizado con exito");
                
				$('#tablaServicios').load('tablaServicios.php');
			} else {
				alertify.error("No se pudo actualizar servicio");
			}
		}
	});
}

function get(idservicio) {
	var form = document.getElementById('frmEditServ');  
	
	setTimeout(() => {reset(form);}, 100);

	$.ajax({
		type:"POST",
		data:"idservicio=" + idservicio,
		url:"php/servicios/obtenDatos.php",
		success:function(r) {
			d=jQuery.parseJSON(r);

			$('#idservicio').val(d['idservicio']);
            $('#nombreEditServ').val(d['nombre']);
            $('#descEditServ').val(d['descripcion']);
			$('#costoEditServ').val(d['costo']);
		}
	});
}

function del(idproducto) {
	alertify.set('confirm','position', 'center');

	alertify.confirm('Eliminar Servicio', '¿Seguro que desea eliminar este servicio?', 
		function(){ 
			alertify.set('notifier','position', 'top-right');
			
			$.ajax({
				type:"POST",
				data:"idservicio=" + idproducto,
				url:"php/servicios/eliminar.php",
				success:function(r) {
					if(r==1) {
						alertify.success("Eliminado con éxito");

						$('#tablaServicios').load('tablaServicios.php');
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
    
    $('#tablaServicios').load('tablaServicios.php');

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
					$('#modalAddServ').modal('toggle');
					setTimeout(() => {$('#frmAddServ')[0].reset();}, 100);

					
				} else {
					edit();

					$('#modalEditServ').modal('toggle');
					
					
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
	$('#openAddSevicio').click(function(form){
		modalMessageFooter.style.display='none'
		iconHint.style.display='none';
	});

	$('#nombreAddServ').click(function(){
		modalMessageFooter.innerHTML="Proporcionar un nombre de servicio Ej.: Renta de asador.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    $('#descAddServ').click(function(){
		modalMessageFooter.innerHTML="Proporcionar al menos una descripción del servicio.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#costoAddServ').click(function(){
		modalMessageFooter.innerHTML="Proporcionar un número de costo del servicio.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	
    
	

	/* END MODAL HINTS */
});