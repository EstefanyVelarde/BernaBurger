function add(idcompra, usuario) {
  alertify.set('notifier','position', 'top-right');

  if ($('#idtablaDetalles tr').length == 1) {
      alertify.error("No se seleccionaron productos.");
  } else {

    var productos = getProductos();

    var idproveedor = $( "#prov" ).val();

    var tipo = $( "#tipo" ).val();


    if(idproveedor != "") {
      $.ajax({
        type:"POST",
        data: {idcompra: idcompra, productos: productos, usuario: usuario, idproveedor: idproveedor, tipo: tipo, subtotal: sum, iva: iva, total: total},
        url:"php/compras/agregar.php",
        success:function(r) {
          if(r == 1) {
            loadTables();
            alertify.success("Agregado con éxito");
          } else {
            alertify.error("No se pudo agregar la compra");
          }
        }
      });
    } else {
      alertify.error("No se selecciono un proveedor.");
    }
  }     
}

function getProductos() {
  var table = document.getElementById("idtablaDetalles");
  var data = [];
    for (var i=1; i<table.rows.length; i++) { 
        var tableRow = table.rows[i]; 
        var rowData = []; 
        for (var j=0; j<tableRow.cells.length - 1; j++) { 
          if(j !== 1){
            rowData.push(tableRow.cells[j].innerHTML);
          }
        } 
        data.push(rowData); 
    } 

    return data;
}

function get(idproducto) {
  var form = document.getElementById('frmAddCompra');  
  
  setTimeout(() => {reset(form);}, 100);

  $.ajax({
    type:"POST",
    data:"idproducto=" + idproducto,
    url:"php/productos/obtenDatos.php",
    success:function(r) {
      d=jQuery.parseJSON(r);

      $('#idproducto').val(d['idproducto']);
      $('#nombreAddCompra').val(d['nombre']);
      $('#existAddCompra').val(d['exist']);
      $('#puntoAddCompra').val(d['punto']);
      $('#costoAddCompra').val(d['costo']);
      $('#costoPromAddCompra').val(d['costoProm']);
      $('#unidadAddCompra').val(d['unidad']);
    }
  });
}

function set() {
  $("#idtablaDetalles tbody").append(
    '<tr id="trProd">' + 
        '<td id=td1>' + $('#idproducto').val() + '</td>' + 
        '<td>' + $('#nombreAddCompra').val() + '</td>' + 
        '<td>' + $('#cantAddCompra').val() + '</td>' + 
        '<td>' + $('#costoAddCompra').val() + '</td>' + 
        '<td id="td2">' + $('#cantAddCompra').val() * $('#costoAddCompra').val() + '</td>' + 
        '<td>' +  
          '<span class="btn mr-3" style="background-color:transparent" onclick="del(this, '+ $('#idproducto').val() +')">' +
            '<span class="fas fa-minus" id="btn-del" ></span>' +
          '</span>'+
        '</td>' + 
    '</tr>'

    
  );

  refresh();
}

function setProv(idproveedor) {
  $("#prov").val(idproveedor);
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

function getDetails(idcompra, fecha, total) {
  this.idcompra=idcompra;
  $.ajax({
    type:"POST",
    data:"idcompra=" + idcompra,
    url:"php/compras/consultar.php",
    success:function(r) {

      document.getElementById("idcompra").innerHTML= idcompra;
      document.getElementById("fecha").innerHTML= fecha;
      document.getElementById("total").innerHTML= total;


      document.getElementById("idcompraInfo").innerHTML= idcompra;
      document.getElementById("fechaInfo").innerHTML= fecha;
      document.getElementById("totalInfo").innerHTML= total;



      $("#idtablaCompraDetalles tbody").html(r);
    }
  });
  
}

var sum = 0, total = 0, iva = 0;

function refresh() {
  sum = 0;
  $("tr #td2").each(function() {
    sum += Number($(this).text());
  });;

  sum = Math.round((sum + Number.EPSILON) * 100) / 100;

  iva = sum * (Number(document.getElementById("idIva").placeholder)/10);
  iva = Math.round((iva + Number.EPSILON) * 100) / 100;
  document.getElementById("idTotalIva").placeholder = iva;

  total = sum + iva;
  total = Math.round((total + Number.EPSILON) * 100) / 100;
  document.getElementById("sum").innerHTML = total;
}

function edit(){

  alertify.set('notifier','position', 'top-right');


  var idcompra = $( "#idcompraInfo" ).html();
  var estado = $( "#estadoCompra" ).val();

    $.ajax({type:"POST",
    data:{idcompra:idcompra, edo: estado},
    url:"php/compras/editar.php",
    success:function(r) {
      if(r==1){
        $("#modalEditCLiente").modal('hide');//ocultamos el modal
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      loadTables();
      alertify.success("Editado con éxito");
     
    }
    else {
      alertify.error("No se pudo editar la compra");
    }
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
  $('#tablaCompras').load('tablaCompras.php');
  $('#agregarCompra').load('agregarCompra.php');

  
  sum = 0;
}

function reset(form) { 
    form.classList.remove('was-validated');               
}


$(document).ready(function(){
  $('#tablaCompras').load('tablaCompras.php');

  $('#agregarCompra').load('agregarCompra.php');

  $('#v-pills-search-tab').click(function() {
    $('<div />').load('/tablaVentas.php #idtablaCompras', function(data) {
      setTimeout(function(){ $('#idtablaCompras').DataTable().columns.adjust(); }, 150);
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
          $('#modalAddCompra').modal('toggle');
          setTimeout(() => {$('#frmAddCompra')[0].reset();}, 100);
        } else {
          edit();
          $('#modalEditCompra').modal('toggle');
        }
      }

      form.classList.add('was-validated');
    }, false);
  });
    
  /* END BOOTSTRAP VALIDATION */
  
});

