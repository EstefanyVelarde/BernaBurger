function add() {
	var form = document.getElementById('frmAddCliente');  

	setTimeout(() => {reset(form);}, 100);

	datos = $('#frmAddCliente').serialize();

	alertify.set('notifier','position', 'top-right');

	$.ajax({
		type:"POST",
		data:datos,
		url:"php/clientes/agregar.php",
		success:function(r) {
			if(r == 1) {
				
				alertify.success("Agregado con éxito");

				$('#tablaClientes').load('tablaClientes.php');

			} else {
				alertify.error("No se pudo agregar cliente");
			}
		}
	});
}

function edit() {
	alertify.set('notifier','position', 'top-right');

	datos = $('#frmEditCliente').serialize();
	
	$.ajax({
		type:"POST",
		data:datos,
		url:"php/clientes/editar.php",
		success:function(r) {
			if(r == 1) {
                alertify.success("Actualizado con exito");
                
				$('#tablaClientes').load('tablaClientes.php');
			} else {
				alertify.error("No se pudo actualizar cliente");
			}
		}
	});
}

function get(idcliente) {
	var form = document.getElementById('frmEditCliente');  
	
	setTimeout(() => {reset(form);}, 100);

	$.ajax({
		type:"POST",
		data:"idcliente=" + idcliente,
		url:"php/clientes/obtenDatos.php",
		success:function(r) {
			d=jQuery.parseJSON(r);

			$('#idcliente').val(d['idcliente']);
			$('#nombreEditCliente').val(d['nombre']);
			$('#apellidoEditCliente').val(d['apellido']);
			$('#direccionEditCliente').val(d['direccion']);
			$('#telefonoEditCliente').val(d['telefono']);
			$('#correoEditCliente').val(d['correo']);
		}
	});
}

function del(idcliente) {
	alertify.set('confirm','position', 'center');

	alertify.confirm('Eliminar cliente', '¿Seguro que desea eliminar este cliente?', 
		function(){ 
			alertify.set('notifier','position', 'top-right');
			
			$.ajax({
				type:"POST",
				data:"idcliente=" + idcliente,
				url:"php/clientes/eliminar.php",
				success:function(r) {
					if(r==1) {
						alertify.success("Eliminado con éxito");

						$('#tablaClientes').load('tablaClientes.php');
					} else{
						alertify.error("No se pudo eliminar");
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


$(document).ready(function(){
    
    $('#tablaClientes').load('tablaClientes.php');
	$('#tablaBackup').load('tablaClientesBackup.php');

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
					$('#modalAddCliente').modal('toggle');
					setTimeout(() => {$('#frmAddCliente')[0].reset();}, 100);

					
				} else {
					edit();
					$('#modalEditCliente').modal('toggle');
					
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
	$('#openAddCliente').click(function(form){
		modalMessageFooter.style.display='none'
		iconHint.style.display='none';
	});

	$('#nombreAddCliente').click(function(){
		modalMessageFooter.innerHTML="Proporcionar al menos un nombre de cliente..";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#apellidoAddCliente').click(function(){
		modalMessageFooter.innerHTML="Proporcionar al menos un apellido de cliente.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#direccionAddCliente').click(function(){
		modalMessageFooter.innerHTML="Proporcionar una dirección.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#telefonoAddCliente').click(function(){
		modalMessageFooter.innerHTML="Proporcionar un teléfono en formato de 10 digitos ej.: 6444010101.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#correoAddCliente').click(function(){
		modalMessageFooter.innerHTML="Ingresar el correo del cliente ej. correo@outlook.com";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });

	/* END MODAL HINTS */
});