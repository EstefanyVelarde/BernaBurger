function respalda(){
       $.ajax({
           url: 'php/backup.php',
           type: 'POST',
           data: null,
           success: function(x){
            alert("todo bien");
           },
          error: function(jqXHR,estado,error){
           alert("mal");
          }
        });
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

function edit() {
  alertify.set('notifier','position', 'top-right');

  datos = $('#frmEditIva').serialize();
  
  $.ajax({
    type:"POST",
    data:datos,
    url:"php/usuarios/editarIva.php",
    success:function(r) {
      if(r == 1) {
        alertify.success("Actualizado con exito");
                
      } else {
        alertify.error("No se pudo actualizar cliente");
      }
    }
  });
}


function get(usuario, iva) {
  var form = document.getElementById('frmEditIva');  
  
  setTimeout(() => {reset(form);}, 100);
  $('#usuario').val(usuario);
  $('#iva').val(iva);
}

function reset(form) { 
    form.classList.remove('was-validated');               
}

$(document).ready(function(){
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
          
        } else {
          edit();

          $('#modalEditIva').modal('toggle');
          
          
        }
      }

      form.classList.add('was-validated');
    }, false);
  });
    
  /* END BOOTSTRAP VALIDATION */
  
});
