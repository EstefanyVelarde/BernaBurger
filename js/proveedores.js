function add() {
	var form = document.getElementById('frmAddProv');  

	setTimeout(() => {reset(form);}, 100);

	datos = $('#frmAddProv').serialize();

	alertify.set('notifier','position', 'top-right');

	$.ajax({
		type:"POST",
		data:datos,
		url:"php/proveedores/agregar.php",
		success:function(r) {
			if(r == 1) {

				alertify.success("Agregado con éxito");

				$('#tablaProveedores').load('tablaProveedores.php');

			} else {
				alertify.error("No se pudo agregar proveedor");
			}
		}
	});
}

function edit() {
	alertify.set('notifier','position', 'top-right');

	datos = $('#frmEditProv').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"php/proveedores/editar.php",
			success:function(r) {
				if(r == 1) {
					alertify.success("Actualizado con éxito");

					$('#tablaProveedores').load('tablaProveedores.php');
				} else {
					alertify.error("No se pudo actualizar proveedor");
				}
			}
		});
}

function get(idproveedor) {
	var form = document.getElementById('frmEditProv');  

	setTimeout(() => {reset(form);}, 100);

	$.ajax({
		type:"POST",
		data:"idproveedor=" + idproveedor,
		url:"php/proveedores/obtenDatos.php",
		success:function(r) {
			d=jQuery.parseJSON(r);

			$('#idproveedor').val(d['idproveedor']);
			$('#contactoEditProv').val(d['contacto']);
			$('#empresaEditProv').val(d['empresa']);
			$('#direccionEditProv').val(d['direccion']);
			$('#telefonoEditProv').val(d['telefono']);
			$('#correoEditProv').val(d['correo']);
			$('#codigoEditProv').val(d['cp']);
			$('#rfcEditProv').val(d['rfc']);
		}
	});
}

function del(idproveedor) {
	alertify.set('confirm','position', 'center');
	alertify.confirm('Eliminar proveedor', '¿Seguro que desea eliminar este proveedor?', 
		function(){

			alertify.set('notifier','position', 'top-right'); 

			$.ajax({
				type:"POST",
				data:"idproveedor=" + idproveedor,
				url:"php/proveedores/eliminar.php",
				success:function(r) {
					if(r==1) {
						alertify.success("Eliminado con éxito");

						$('#tablaProveedores').load('tablaProveedores.php');
					} else{
						alertify.success("No se pudo eliminar proveedor");
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
	$('#tablaProveedores').load('tablaProveedores.php');
	$('#tablaBackup').load('tablaProveedoresBackup.php');


	/* BOOTSTRAP VALIDATION*/
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
					$('#modalAddProv').modal('toggle');
					setTimeout(() => {$('#frmAddProv')[0].reset();}, 100);
				} else {
					edit();

					$('#modalEditProv').modal('toggle');
				}
			}

			form.classList.add('was-validated');
		}, false);
	});
    
    /* END BOOTSTRAP VALIDATION */

    /* ADD PROVEEDOR HINTS */
	var modalMessageFooter = document.getElementsByClassName("modal-message-footer")[0];
	var iconHint = document.getElementsByClassName("icon-hint")[0];

	
	$('#openAddProveedor').click(function(form){
		modalMessageFooter.style.display='none'
		iconHint.style.display='none';
	});

	$('#contactoAddProv').click(function(){
		modalMessageFooter.innerHTML="Proporcionar al menos un nombre de contacto ej.: Jack Sparrow.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
	});

	$('#empresaAddProv').click(function(){
		modalMessageFooter.innerHTML="Ingresar el nombre de su empresa en letras mayuscúlas ej.: PEPSICO.";
		modalMessageFooter.style.display='block';
        iconHint.style.display='block';
	});

	$('#direccionAddProv').click(function(){
		modalMessageFooter.innerHTML="Proporcionar una dirección.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
	});

	$('#telefonoAddProv').click(function(){
		modalMessageFooter.innerHTML="Proporcionar un teléfono en formato de 10 digitos ej.: 6444010101.";
		modalMessageFooter.style.display='block';
        iconHint.style.display='block';
	});

	$('#correoAddProv').click(function(){
		modalMessageFooter.innerHTML="Ingresar el correo de la empresa ej. correo@outlook.com";
		modalMessageFooter.style.display='block';
        iconHint.style.display='block';
	});
	
	$('#codigoAddProv').click(function(){
		modalMessageFooter.innerHTML="Proporcionar código postal válido ej. 85210.";
		modalMessageFooter.style.display='block';
        iconHint.style.display='block';
	});
	
	$('#rfcAddProv').click(function(){
		modalMessageFooter.innerHTML="Proporcionar una RFC válida.";
		modalMessageFooter.style.display='block';
        iconHint.style.display='block';
	});
	/* END ADD PROVEEDOR HINTS */
});