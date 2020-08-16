function add(idplatillo) {
  alertify.set('notifier','position', 'top-right');

  if ($('#idtablaDetalles tr').length == 1) {
      alertify.error("No se seleccionaron productos.");
  } else {

    var productos = getProductos(document.getElementById("idtablaDetalles"));

    var nombre = $( "#nombre" ).val();

    var precio = $( "#precio" ).val();


    if(nombre != "") {
      if(nombre.length < 50) {
        if(precio != "") {
          $.ajax({
            type:"POST",
            data: {idplatillo: idplatillo, productos: productos, nombre: nombre, precio: precio},
            url:"php/platillos/agregar.php",
            success:function(r) {
              if(r == 1) {
                loadTables();
                alertify.success("Agregado con éxito");
              } else {
                alertify.error("No se pudo agregar la platillo");
              }
            }
          });
        } else {
          alertify.error("No se ingreso un precio.");
        }
      } else {
        alertify.error("El nombre de platillo debe ser menor a 50 caracteres.");
      }
    } else {
      alertify.error("No se ingreso un nombre.");
    }
  }     
}

function edit() {
  alertify.set('notifier','position', 'top-right');

  var idplatillo = $( "#idplatillo" ).val();

  var nombre = $( "#nombreEditPlatillo" ).val();

  var precio = $( "#precioEditPlatillo" ).val();
  
  var productos = getProductos(document.getElementById("idtablaPlatilloDetalles"));

  $.ajax({
    type:"POST",
    data: {idplatillo: idplatillo, productos: productos, nombre: nombre, precio: precio},
    url:"php/platillos/editar.php",
    success:function(r) {
      if(r == 1) {
        alertify.success("Actualizado con exito");
                
        $('#tablaPlatillos').load('tablaPlatillos.php');
      } else {
        alertify.error("No se pudo actualizar platillo");
      }
    }
  });
}

function delPlatillo(idplatillo) {
  alertify.set('confirm','position', 'center');

  alertify.confirm('Eliminar platillo', '¿Seguro que desea eliminar este platillo?', 
    function(){ 
      alertify.set('notifier','position', 'top-right');
      
      $.ajax({
        type:"POST",
        data:"idplatillo=" + idplatillo,
        url:"php/platillos/eliminar.php",
        success:function(r) {
          if(r==1) {
            alertify.success("Eliminado con éxito");

            $('#tablaPlatillos').load('tablaPlatillos.php');
          } else{
            alertify.success("No se pudo eliminar");
          }
        }
      });
    }
    , function(){

    });
}


function getProductos(table) {
  var data = [];
    for (var i=1; i<table.rows.length; i++) { 
        var tableRow = table.rows[i]; 
        var rowData = []; 
        for (var j=0; j<tableRow.cells.length - 1; j++) { 
          if(j !== 1){ // No guardar nombre producto
            rowData.push(tableRow.cells[j].innerHTML);
          }
        } 
        data.push(rowData); 
    } 

    return data;
}

function get(idproducto, nombreProd) {
  var form = document.getElementById('frmAddPlatillo');  
  
  setTimeout(() => {reset(form);}, 100);

  $('#idproducto').val(idproducto);
  $('#nombreProd').val(nombreProd);
}

function set() {
  $("#idtablaDetalles tbody").append(
    '<tr id="trProd">' + 
        '<td id=td1>' + $('#idproducto').val() + '</td>' + 
        '<td>' + $('#nombreProd').val() + '</td>' + 
        '<td>' + $('#cantAddPlatillo').val() + '</td>' + 
        '<td>' +  
          '<span class="btn mr-3" style="background-color:transparent" onclick="del(this, '+ $('#idproducto').val() +')">' +
            '<span class="fas fa-minus" id="btn-del" ></span>' +
          '</span>'+
        '</td>' + 
    '</tr>'
  );
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

function getDetails(idplatillo, nombre, precio) {

  var form = document.getElementById('frmEditPlatillo');  
  
  setTimeout(() => {reset(form);}, 100);

  $.ajax({
    type:"POST",
    data:"idplatillo=" + idplatillo,
    url:"php/platillos/consultar.php",
    success:function(r) {

      document.getElementById("idplatillo").value = idplatillo;
      document.getElementById("nombreEditPlatillo").value= nombre;
      document.getElementById("precioEditPlatillo").value= precio;

      $("#idtablaPlatilloDetalles tbody").html(r);
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

function loadTables() {
  $('#tablaPlatillos').load('tablaPlatillos.php');
  $('#agregarPlatillo').load('agregarPlatillo.php');
}

function reset(form) { 
    form.classList.remove('was-validated');               
}


$(document).ready(function(){
  $('#tablaPlatillos').load('tablaPlatillos.php');

  $('#agregarPlatillo').load('agregarPlatillo.php');

  $('#v-pills-search-tab').click(function() {
    $('<div />').load('/tablaPlatillos.php #idtablaPlatillos', function(data) {
      setTimeout(function(){ $('#idtablaPlatillos').DataTable().columns.adjust(); }, 150);
    });
  });

  //triggered when modal is about to be shown
  $('#modalSearchProv').on('show.bs.modal', function(e) {
      //populate the textbox
      setTimeout(function(){ $(e.currentTarget).find('table[id="idtablaProveedores"]').DataTable().columns.adjust(); }, 200);
      
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
          set();
          $('#modalAddPlatillo').modal('toggle');
          setTimeout(() => {$('#frmAddPlatillo')[0].reset();}, 100);
        } else {
          edit();

          $('#modalEditPlatillo').modal('toggle');
          
          
        }
      }

      form.classList.add('was-validated');
    }, false);
  });
    
  /* END BOOTSTRAP VALIDATION */
  
});

