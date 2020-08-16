function add(idorden, usuario) {
  alertify.set('notifier','position', 'top-right');

  if ($('#idtablaDetalles tr').length == 1) {
      alertify.error("No se seleccionaron platillos.");
  } else {

  var platillos = getPlatillos(document.getElementById("idtablaDetalles"));

  var mesa = $( "#mesa" ).val();

  var inst = $( "#inst" ).val();

  $.ajax({
    type:"POST",
    data: {idorden: idorden, usuario: usuario, platillos: platillos, mesa: mesa, inst: inst, imp: sum},
    url:"php/ordenes/agregar.php",
    success:function(r) {
      if(r == 1) {
        loadTables();
        alertify.success("Agregado con éxito");
      } else {
        alertify.error("No se pudo agregar la Orden");
      }
    }
  });
  }
   
}

function delOrden(idorden) {
  alertify.set('confirm','position', 'center');

  alertify.confirm('Eliminar Orden', '¿Seguro que desea eliminar esta orden?', 
    function(){ 
      alertify.set('notifier','position', 'top-right');
      
      $.ajax({
        type:"POST",
        data:"idorden=" + idorden,
        url:"php/ordenes/eliminar.php",
        success:function(r) {
          if(r==1) {
            alertify.success("Eliminado con éxito");

            $('#tablaOrdenes').load('tablaOrdenes.php');
          } else{
            alertify.error("No se pudo eliminar");
          }
        }
      });
    }
    , function(){

    });
}


function getPlatillos(table) {
  var data = [];
    for (var i=1; i<table.rows.length; i++) { 
        var tableRow = table.rows[i]; 
        var rowData = []; 
        for (var j=0; j<tableRow.cells.length - 1; j++) { 
          if(j !== 1){ // No guardar nombre producto
            if (tableRow.cells[j].children.length > 0) { 
              rowData.push(tableRow.cells[j].children[0].value); 
            } else {
              rowData.push(tableRow.cells[j].innerHTML);
            }
          }
        } 
        data.push(rowData); 
    } 

    return data;
}

function get(idplatillo, nombrePlatillo, precio) {

  alertify.set('notifier','position', 'top-right');

  // Verificar productos disponibles
  $.ajax({
    type:"POST",
    data:"idplatillo=" + idplatillo,
    url:"php/ordenes/maxPlatillos.php",
    success:function(max) {
      if(max == -1) {
        alertify.error("No hay productos suficientes para el platillo.");
      } else {
        var trPlat = 'trPlat'+idplatillo;
        var idCant = 'cant'+idplatillo;
        $("#idtablaDetalles tbody").append(
          '<tr id="'+trPlat+'">' + 
              '<td id=td1>' + idplatillo + '</td>' + 
              '<td>' + nombrePlatillo + '</td>' + 
              '<td>' + precio + '</td>' + 
              '<td>' +  
                '<input class="input-group '+idCant+'" type="number" id="cant" name="cant" value="1" min="1" max="'+max+'">'+
              '</td>' + 
              '<td id="td2">' + precio + '</td>' + 
              '<td>' +  
                '<span class="btn mr-3" style="background-color:transparent" onclick="del(this, '+ idplatillo +')">' +
                  '<span class="fas fa-minus" id="btn-del" ></span>' +
                '</span>'+
              '</td>' + 
          '</tr>'
        );

        addInputNumberListener(trPlat,idCant);

        refresh();
      }
    }
  });
}

function del(btn, idplatillo) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);

  setTimeout(() => {refresh();}, 100);
}

function getDetails(idorden, mesa, inst, importe) {

  $.ajax({
    type:"POST",
    data:"idorden=" + idorden,
    url:"php/ordenes/consultar.php",
    success:function(r) {

      document.getElementById("idorden").innerHTML= idorden;
      document.getElementById("mesaInfo").innerHTML= mesa;
      document.getElementById("instInfo").innerHTML= inst;
      document.getElementById("importeInfo").innerHTML= importe;

      $("#idtablaOrdenDetalles tbody").html(r);
    }
  });
  
}

var sum = 0;

function refresh() {
  sum = 0;
  $("tr #td2").each(function() {
    sum += Number($(this).text());
  });;
  document.getElementById("sum").innerHTML = sum;
}

function mult(trPlat, cant) {
  $('#' + trPlat).each(function() {
    var id = $(this).find("td:eq(0)").html();
    var precio = $(this).find("td:eq(2)").html();
    $(this).find("td:eq(4)").html(precio * cant);
  });

  setTimeout(() => {refresh();}, 100);
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
  $('#tablaOrdenes').load('tablaOrdenes.php');
  $('#agregarOrden').load('agregarOrden.php');

  sum = 0;
}

function reset(form) { 
    form.classList.remove('was-validated');               
}

function addInputNumberListener(trPlat, idCant) {
  /* MULT CANT */
  var cants = document.getElementsByClassName(idCant);

  // Loop over them and prevent submission
  var addListeners = Array.prototype.filter.call(cants, function(cant) {

    cant.addEventListener("input", function(e) {
      mult(trPlat, cant.value);
    }, false);

    cant.addEventListener("keyup", function(e) {
        mult(trPlat, cant.value);
    }, false);

    cant.addEventListener("change", function(e) {
        mult(trPlat, cant.value);
    }, false);
  });
  /* END MULT CANT */
}

$(document).ready(function(){
  $('#tablaOrdenes').load('tablaOrdenes.php');

  $('#agregarOrden').load('agregarOrden.php');

  $('#v-pills-search-tab').click(function() {
    $('<div />').load('/tablaOrdenes.php #idtablaOrdenes', function(data) {
      setTimeout(function(){ $('#idtablaOrdenes').DataTable().columns.adjust(); }, 150);
    });
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
          $('#modalAddOrden').modal('toggle');
          setTimeout(() => {$('#frmAddOrden')[0].reset();}, 100);
        } else {
          edit();

          $('#modalEditOrden').modal('toggle');
          
          
        }
      }

      form.classList.add('was-validated');
    }, false);
  });
    
  /* END BOOTSTRAP VALIDATION */
  
});

