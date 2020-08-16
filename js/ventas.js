function del(btn, idorden) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);

  $("tr #td1").each(function(e){
    if($(this).text() == idorden) {
      $(this).closest("tr").remove();
    }
  });

  setTimeout(() => {refresh();}, 100);
}

function getOrdenes() {

  var ordenes = [];

  $("tr #td1").each(function(e){
    var value = $(this).text();

    if (ordenes.indexOf(value)==-1) ordenes.push(value);
  });

  return ordenes;
}

function add(idventa, usuario) {
  alertify.set('notifier','position', 'top-right');

  if ($('#idtablaDetalles tr').length == 1) {
      alertify.error("No se seleccionaron ordenes.");
  } else {

    var monto  = document.getElementById("idMonto").value;

    if(monto < sum) {

      alertify.error("No se ingreso un monto correcto.");

    } else {
      var ordenes = getOrdenes();

      JSON.stringify(ordenes);

      $.ajax({
        type:"POST",
        data: {idventa: idventa, ordenes: ordenes, usuario: usuario, importe: sum},
        url:"php/ventas/agregar.php",
        success:function(r) {
          if(r == 1) {
            reset();
            alertify.success("Agregado con éxito");
          } else {
            alertify.error("No se pudo agregar la venta");
          }
        }
      });
    } 
  }     
}

function getAll(idorden) {
	$.ajax({
		type:"POST",
		data:"idorden=" + idorden,
		url:"php/ventas/obtenOrden.php",
		success:function(r) {
			$("#idtablaDetalles tbody").append(r);
		}
	});
  
  setTimeout(() => {refresh();}, 100);
}

function getDetails(idventa, usuario, fecha, importe) {
  $.ajax({
    type:"POST",
    data:"idventa=" + idventa,
    url:"php/ventas/consultar.php",
    success:function(r) {

      document.getElementById("idventa").innerHTML= idventa;
      document.getElementById("fecha").innerHTML= fecha;
      document.getElementById("importe").innerHTML= importe;

      $("#idtablaVentaDetalles tbody").html(r);
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
  monto();
}

function reset() {
	$('#tablaVentas').load('tablaVentas.php');
	$('#agregarVenta').load('agregarVenta.php');
  sum=0;
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

function monto() {
  setTimeout(() => {
  var x = document.getElementById("idMonto").value;
  y = x - sum;

  if(y > 0)
    document.getElementById("idCambio").value = x - sum;
  else
    document.getElementById("idCambio").value = 0;
  }, 200);
}
function checkInventory(){
  $.ajax({
    type:"POST",
    data: {},
    url:"php/ventas/checarInventario.php",
    success:function(r) {
      console.log(r);
      if(r < 0) {
        document.getElementById("estado").style.backgroundColor='#DC3545';
      } else if(r< 10){
        document.getElementById("estado").style.backgroundColor='#FFC107';
      }else{
      document.getElementById("estado").style.backgroundColor='#59B66F';
      }
    }
  }); 
}

$(document).ready(function(){
    checkInventory();
    $('#tablaVentas').load('tablaVentas.php');
    $('#agregarVenta').load('agregarVenta.php');
    $('#v-pills-search-tab').click(function() {
      $('<div />').load('/tablaVentas.php #idtablaVentas', function(data) {
        setTimeout(function(){ $('#idtablaVentas').DataTable().columns.adjust(); }, 150);

      });
    });
});



