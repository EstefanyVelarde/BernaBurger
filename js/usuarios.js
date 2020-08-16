function add() {
	var form = document.getElementById('frmAddUsuario');  

	setTimeout(() => {reset(form);}, 100);

	datos = $('#frmAddUsuario').serialize();

	alertify.set('notifier','position', 'top-right');

	$.ajax({
		type:"POST",
		data:datos,
		url:"php/usuarios/agregar.php",
		success:function(r) {
			if(r == 1) {
				
				alertify.success("Agregado con éxito");

				$('#tablaUsuarios').load('tablaUsuarios.php');

			} else {
				alertify.error("No se pudo agregar Usuario");
			}
		}
	});
}

function edit() {
	alertify.set('notifier','position', 'top-right');

	datos = $('#frmEditUsuario').serialize();
	console.log(datos);
	$.ajax({
		type:"POST",
		data:datos,
		url:"php/usuarios/editar.php",
		success:function(r) {
			if(r == 1) {
                alertify.success("Actualizado con exito");
                
				$('#tablaUsuarios').load('tablaUsuarios.php');
			} else {
				alertify.error("No se pudo actualizar Usuario");
			}
		}
	});
}

function get(idUsuario) {
	var form = document.getElementById('frmEditUsuario');  
	
	setTimeout(() => {reset(form);}, 100);

	$.ajax({
		type:"POST",
		data:"idUsuario=" + idUsuario,
		url:"php/usuarios/obtenDatos.php",
		success:function(r) {
			d=jQuery.parseJSON(r);

			$('#usuarioEditUsuario').val(d['usuario']);
			$('#rolEditUsuario').val(d['roll']);
			$('#nombreEditUsuario').val(d['nombre']);
			$('#puestoEditUsuario').val(d['puesto']);
			$('#telefonoEditUsuario').val(d['telefono']);
			$('#correoEditUsuario').val(d['correo']);
			$('#contraEditUsuario').val(d['contrasena']);
		}
	});
}

function del(idUsuario) {
	alertify.set('confirm','position', 'center');

	alertify.confirm('Eliminar Usuario', '¿Seguro que desea eliminar este Usuario?', 
		function(){ 
			alertify.set('notifier','position', 'top-right');
			
			$.ajax({
				type:"POST",
				data:"idUsuario=" + idUsuario,
				url:"php/usuarios/eliminar.php",
				success:function(r) {
					if(r==1) {
						alertify.success("Eliminado con éxito");

						$('#tablaUsuarios').load('tablaUsuarios.php');
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
    
    $('#tablaUsuarios').load('tablaUsuarios.php');
	$('#tablaBackup').load('tablaUsuariosBackup.php');

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
					$('#modalAddUsuario').modal('toggle');
					setTimeout(() => {$('#frmAddUsuario')[0].reset();}, 100);

					
				} else {
					edit();
					$('#modalEditUsuario').modal('toggle');
					
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
	$('#openAddUsuario').click(function(form){
		modalMessageFooter.style.display='none'
		iconHint.style.display='none';
	});

	$('#usuarioAddUsuario').click(function(){
		modalMessageFooter.innerHTML="Proporcionar al menos un Usuario..";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#rolAddUsuario').click(function(){
		modalMessageFooter.innerHTML="Proporcionar rol de usuario.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#nombreAddUsuario').click(function(){
		modalMessageFooter.innerHTML="Proporcionar un nombre.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });

    $('#puestoAddUsuario').click(function(){
		modalMessageFooter.innerHTML="Proporcionar un puesto.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#telefonoAddUsuario').click(function(){
		modalMessageFooter.innerHTML="Proporcionar un teléfono en formato de 10 digitos ej.: 6444010101.";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });
    
	$('#correoAddUsuario').click(function(){
		modalMessageFooter.innerHTML="Ingresar el correo del Usuario ej. correo@outlook.com";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });

    $('#contraAddUsuario').click(function(){
		modalMessageFooter.innerHTML="Ingresar una contraseña";
        modalMessageFooter.style.display='block';
        iconHint.style.display='block';
    });

	/* END MODAL HINTS */
});