function add(idevento) {
  alertify.set('notifier','position', 'top-right');

  if ($('#idtablaDetalles tr').length == 1) {
      alertify.error("No se seleccionaron servicios.");
  } else {

    var idcliente = $( "#cliente" ).val();
    var dir = $( "#dir" ).val();
    var fecha = document.querySelector('input[type="datetime-local"]').value;
    var today = new Date().toISOString().split('T')[0];
    
    console.log(fecha,today);

    if(idcliente != "") {

      if(fecha) {

          if(dir != "") {
            var servicios = getServicios(document.getElementById("idtablaDetalles"));

            $.ajax({
              type:"POST",
              data: {idevento: idevento, servicios: servicios, idcliente: idcliente, fecha: fecha, total:sum, dir: dir},
              url:"php/eventos/agregar.php",
              success:function(r) {
                if(r == 1) {
                  loadTables();
                  alertify.success("Agregado con éxito");
                } else {
                  alertify.error("No se pudo agregar la evento");
                }
              }
            });
          } else {
            alertify.error("No se especifico una dirección.");
          }
          
        
      } else {
        alertify.error("No se selecciono una fecha");
      }
    } else {
      alertify.error("No se selecciono un cliente.");
    }
  }     
}

function edit() {
  alertify.set('notifier','position', 'top-right');

  var idevento = $( "#idevento" ).val();

  var nombre = $( "#nombreEditEvento" ).val();

  var precio = $( "#precioEditEvento" ).val();
  
  var productos = getServicios(document.getElementById("idtablaEventoDetalles"));

  $.ajax({
    type:"POST",
    data: {idevento: idevento, servicios: productos, nombre: nombre, precio: precio},
    url:"php/eventos/editar.php",
    success:function(r) {
      if(r == 1) {
        alertify.success("Actualizado con exito");
                
        $('#tablaEvento').load('tablaEvento.php');
      } else {
        alertify.error("No se pudo actualizar evento");
      }
    }
  });
}

function delEvento(idevento) {
  alertify.set('confirm','position', 'center');

  alertify.confirm('Eliminar evento', '¿Seguro que desea eliminar este evento?', 
    function(){ 
      alertify.set('notifier','position', 'top-right');
      
      $.ajax({
        type:"POST",
        data:"idevento=" + idevento,
        url:"php/eventos/eliminar.php",
        success:function(r) {
          if(r==1) {
            alertify.success("Eliminado con éxito");

            $('#tablaEvento').load('tablaEvento.php');
          } else{
            alertify.success("No se pudo eliminar");
          }
        }
      });
    }
    , function(){

    });
}


function getServicios(table) {
  var data = [];
    for (var i=1; i<table.rows.length; i++) { 
        var tableRow = table.rows[i]; 
        var rowData = []; 
        for (var j=0; j<tableRow.cells.length - 1; j++) { 
          if(j !== 1){ // No guardar nombre servicios
            rowData.push(tableRow.cells[j].innerHTML);
          }
        } 
        data.push(rowData); 
    } 

    return data;
}

function set(idservicio, nombreServ, precio) {
  $("#idtablaDetalles tbody").append(
    '<tr id="trServ">' + 
        '<td id=td1>' + idservicio + '</td>' + 
        '<td>' + nombreServ + '</td>' + 
        '<td id=td2>' + precio + '</td>' + 
        '<td>' +  
          '<span class="btn mr-3" style="background-color:transparent" onclick="del(this, '+ idservicio +')">' +
            '<span class="fas fa-minus" id="btn-del" ></span>' +
          '</span>'+
        '</td>' + 
    '</tr>'
  );

  refresh();
}

function setCliente(idcliente) {
  $("#cliente").val(idcliente);
}

function del(btn, idproducto) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);

  $("tr #td1").each(function(e){
    if($(this).text() == idproducto) {
      $(this).closest("tr").remove();
    }
  });

  setTimeout(() => {refresh();}, 100);
}

function getDetails(idevento, cliente, fecha, importe) {

  var form = document.getElementById('frmEditEvento');  
  
  setTimeout(() => {reset(form);}, 100);

  $.ajax({
    type:"POST",
    data:"idevento=" + idevento,
    url:"php/eventos/consultar.php",
    success:function(r) {

      document.getElementById("idevento").innerHTML = idevento;
      document.getElementById("clienteEditEvento").value= cliente;
      document.getElementById("totalEditEvento").innerHTML = importe; 
      document.getElementById("fechaEvt").innerHTML = fecha; 
      $("#idtablaEventoDetalles tbody").html(r);
    }
  });

  $.ajax({
    type:"POST",
    data:"idcliente=" + cliente,
    url:"php/clientes/obtenDatos.php",
    success:function(r) {

      d=jQuery.parseJSON(r);

      $('#dirEvt').val(d['direccion']);
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

var sum = 0;

function refresh() {
  sum = 0;
  $("tr #td2").each(function() {
    sum += Number($(this).text());
  });
  document.getElementById("sum").innerHTML = sum;
}

function loadTables() {
  $('#tablaEvento').load('tablaEvento.php');
  $('#agregarEvento').load('agregarEvento.php');

  sum = 0;
}

function reset(form) { 
    form.classList.remove('was-validated');               
}


$(document).ready(function(){
  $('#tablaEvento').load('tablaEvento.php');
  $('#tablaEventoBackup').load('tablaEventoBackup.php');

  $('#agregarEvento').load('agregarEvento.php');

  $('#v-pills-search-tab').click(function() {
    $('<div />').load('/tablaEvento.php #idtablaEventos', function(data) {
      setTimeout(function(){ $('#idtablaEventos').DataTable().columns.adjust(); }, 150);
    });
  });

  //triggered when modal is about to be shown
  $('#modalSearchCliente').on('show.bs.modal', function(e) {
      //populate the textbox
      setTimeout(function(){ $(e.currentTarget).find('table[id="idtablaClientes"]').DataTable().columns.adjust(); }, 200);
      
  });

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

          $('#modalEditEvento').modal('toggle');
          
          
        }
      }

      form.classList.add('was-validated');
    }, false);
  });
    
  /* END BOOTSTRAP VALIDATION */
  
});

