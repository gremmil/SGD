<?php
$usuario = $_GET['usuario'];
$idRestaurante = $_GET['idRestaurante'];
$nombreRestaurante = $_GET['nombreRestaurante'];
$urlImagen = $_GET['urlImagen'];

?>
<section class="content-header">
  <h1 class="my-3">
    <i class="fa fa-cart-plus icon-title"></i> Añadir Reserva
  </h1>
  <ol class="breadcrumb my-3">
    <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
    <li><a href="?module=reservas&accion=vistaReserva"> Reservas</a></li>
    <li class="active"> Añadir Reserva</li>

  </ol>
</section>
<section class="content">
  <div class="container">
    <h5 id="titRegistroProductos">Registro de Productos en </h5>
    <div class="box box-primary">
      <div class="box-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group col-lg-4 col-md-6 px-0">
              <select name="" id="cbIdCategoriaProductos" class="form-control">
                <option>Seleccione Categoria</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6 table-responsive">
            <table id="dTañadirReservasMostrarProductos" class="table table-bordered table-striped table-hover">
              <thead>
                <tr class="table-info">

                  <th class="center">Descripcion</th>
                  <th class="center">Precio</th>
                  <th class="center">Cantidad</th>
                  <th class="center">Accion</th>
                </tr>
              </thead>

              <tbody id="dTRMPBody">
              </tbody>
            </table>
          </div>
          <div class="col-lg-6 table-responsive">
            <table id="dTañadirReservasListarProductos" class="table table-bordered table-striped table-hover">
              <thead>
                <tr class="table-info">

                  <th class="center">Categoria</th>
                  <th class="center">Producto</th>
                  <th class="center">Total </th>
                  <th class="center">Accion</th>
                </tr>
              </thead>

              <tbody id="dTRLPBody">
              </tbody>
              <tfoot id="dTRLPFooter">

              </tfoot>
            </table>
          </div>

        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3"></div>
          <div class="col-md-3"></div>
          <div class="col-md-3">
            <button class="btn btn-primary d-block ml-auto" id="btnGuardarReservaProductos">Siguiente</button>
          </div>
        </div>
        <div id="alertaProductos">
        </div>
      </div>
    </div>

  </div>
  <div class="container d-none" id="sectionDatosEnvio">
    <h5>Datos del Envío</h5>
    <div class="box box-primary">
      <div class="box-body">
        <form method="" action="" onsubmit="funcionSubmit(event)" id="frmAñadirReserva">
          <input type="hidden" name="datosReserva" id="datosReserva">
          <div class="row">

            <div class="col-md-6 col-lg-4 input-group mb-3">
              <div class="input-group preppend">
                <span class="input-group">Destinatario</span>
              </div>
              <input type="text" class="form-control frmDisabledOptions" id="frmDestinatario" disabled required>
              <div class="input-group-append">
                <button class="btn btn-primary btn-md btn-block btn-flat btnEnabled" type="button"
                  id="btnAddonDestinatario">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor"
                    xmlns="https://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                    <path fill-rule="evenodd"
                      d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                  </svg>
                </button>
                
              </div>
            </div>

            <div class="col-md-6 col-lg-4 input-group mb-3">
              <div class="input-group preppend">
                <span class="input-group">Distrito</span>
              </div>
              <select name="frmDistrito" class="form-control frmDisabledOptions" id="frmDistrito" disabled required>
              </select>
              <div class="input-group-append">
                <button class="btn btn-primary btn-md btn-block btn-flat btnEnabled" type="button"
                  id="btnAddonDistrito">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor"
                    xmlns="https://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                    <path fill-rule="evenodd"
                      d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                  </svg>
                </button>
                
              </div>
            </div>

            <div class="col-md-6 col-lg-4 input-group mb-3">
              <div class="input-group preppend">
                <span class="input-group">Direccion</span>
              </div>
              <input type="text" class="form-control frmDisabledOptions" id="frmDireccion" disabled required>
              <div class="input-group-append">
                <button class="btn btn-primary btn-md btn-block btn-flat btnEnabled" type="button"
                  id="btnAddonDireccion">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor"
                    xmlns="https://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                    <path fill-rule="evenodd"
                      d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                  </svg>
                </button>
                
              </div>
            </div>

            <div class="col-md-6 col-lg-4 input-group mb-3">
              <div class="input-group prepend">
                <span class="input-group">Fecha de Entrega</span>
              </div>
              <input type="datetime-local" class="form-control" id="diaEntregaReserva" min="" max="" value="" required>
            </div>

            <div class="col-md-6 col-lg-4 input-group mb-3">
              <div class="input-group prepend">
                <span class="input-group">Monto Total</span>
              </div>
              <input type="text" class="form-control" id="frmMontoTotal" disabled>
            </div>

            <div class="col-md-6 col-lg-4 btn-group btn-group-toggle input-group mb-3" data-toggle="buttons">
              <div class="input-group prepend">
                <span class="input-group">Medio de Pago</span>
              </div>
              <label class="btn btn-primary btn-flat active">
                <input type="radio" class="form-control" name="optionRadio" id="option1" value="Visa" checked> Visa
              </label>
              <label class="btn btn-primary btn-flat">
                <input type="radio" class="form-control" name="optionRadio" id="option2"value="Efectivo"> Efectivo
              </label>
            </div>

            <div class="col-md-6 col-lg-4 input-group mb-3">
              <div class="input-group prepend">
                <span class="input-group">Detalles Adicionales</span>
              </div>
              <input type="textarea" class="form-control" id="frmDetallesAdicionales">
            </div>

            <div class="col-xs-12 col-md-6 col-lg-4 my-auto">
              <input id="btnConfirmarReserva" type="submit"
                class="btn btn-primary btn-md btn-block btn-flat w-50 mx-auto" value="Confirmar">
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>

</section>

<script>
  //ELEMENTOS DEL DOOM
  var tablaMostrarProductos = document.querySelector("#dTañadirReservasMostrarProductos"),
      tablaListarProducto = document.querySelector("#dTañadirReservasListarProductos"),
      tablaCuerpoListar = document.querySelector("#dTRLPBody"),
      tablaFooterListar = document.querySelector("#dTRLPFooter"),
      cbIdCategoriaProductos = document.querySelector('#cbIdCategoriaProductos');
      titulo = document.querySelector("#titRegistroProductos");
  
  //Inicializamos y asignamos los datos por defecto para el envio del formulario
  var frmDestinatarioValue = <?php echo json_encode($_SESSION['nombreCompleto']) ?>,
      frmDistritoValue = <?php echo json_encode($_SESSION['idDistrito']) ?>,
      frmDireccionValue = <?php echo json_encode($_SESSION['direccion']) ?>;

  titulo.innerHTML+=`<?php echo $nombreRestaurante;?>`;

  var flag = 0;//control
  if (flag == 0) {
    var montoTotal = 0;
  }
  //PAYLOADS que se enviaran en la solicitud AJAX
  var parametroAPI1 = {
    codUsuario: '<?php echo $usuario?>'
  }
  var parametroAPI2 = {
    codUsuario: '<?php echo $usuario?>',
    idRestaurante: parseInt('<?php echo $idRestaurante?>'),
    idProducto: 0,
    idCategoria: 0,
    producto: "",
    precio: 0,
    estado: ""
  }
  //Inicializamos las variables que recibiran la respuesta AJAX
  var datosReserva, dataProductosRestaurante, dataDistritos;
  //Obtenemos las url para los AJAX
  var urlCategoriaProductos = getUrlAPI('Maestros', 'GetCategoria'),
      urlProductosRestaurante = getUrlAPI('Productos', 'GetProductos'),
      urlDistritos = getUrlAPI('Maestros', 'GetDistrito');
  //SOLICITUDES AJAX
  $.ajax({//ajax que obtiene la categoria de los productos
    headers: { 
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json' 
    },
    type: "POST",
    url: urlCategoriaProductos,
    data: JSON.stringify(parametroAPI1),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      data.Resultado.forEach(element => {
      cbIdCategoriaProductos.innerHTML += `<option id=${element.IdCategoria} value=${element.IdCategoria}>${element.Descripcion}</option>`;
      });
    }
  });
  $.ajax({//ajax que obtiene los productos del restaurante
    headers: { 
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json' 
    },
    type: "POST",
    url: urlProductosRestaurante,
    data: JSON.stringify(parametroAPI2),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      dataProductosRestaurante = data;
    }
  });
  $.ajax({//ajax que obtiene los distritos
    headers: { 
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json' 
    },
    type: "POST",
    url: urlDistritos,
    data: JSON.stringify(parametroAPI1),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      dataDistritos = data;
    }
  });

  /******************EVENTOS***************/
  /******************EVENTOS***************/
  /******************EVENTOS***************/
  /*evento general cuando se cambia de categoria de productos* */
  $("#cbIdCategoriaProductos").on('change', function () {//evento combobox
    event.preventDefault();
    var option = $(this).val(),
        productos = dataProductosRestaurante.Resultado.filter(item => item.IdCategoria == option),
        tablaCuerpoMostrar = document.querySelector("#dTRMPBody");

    tablaCuerpoMostrar.innerHTML = ``;
    productos.forEach(function (item) {
      tablaCuerpoMostrar.innerHTML += `
        <tr>
          <td>${item.Descripcion}</td>
          <td>${item.Precio}</td>
          <td><input type=number value=1 min=1 id='cantidadProducto' name='cantidadProducto' class='form-control d-inline' required></td>
          <td>
            <div>
                      <button data-producto=${item.IdProducto} data-toggle='' data-target='' title='Agregar' style='margin-right:5px' class='btn btn-primary btn-sm d-block mx-auto'>
                      <i class="fa fa-plus"></i>
                      </button>
            </div>
          </td>
        </tr>
      `;
    });

    //EVENTO DE TABLA MOSTRAR
    $("#dTañadirReservasMostrarProductos tr").on("click", "button", function () {//agrega
      event.preventDefault();
      var subtotal = 0;
      if(flag==0){
        tablaCuerpoListar.innerHTML = ``;
      }
      flag = 1;
      var dataproducto = $(this).data("producto"),
          cantidad = $(this).closest("tr").children("td").children("input#cantidadProducto").val(),
          producto = dataProductosRestaurante.Resultado.filter(item => item.IdProducto == dataproducto);

      subtotal = producto[0].Precio * $(this).closest("tr").children("td").children("input#cantidadProducto").val();
 
      tablaCuerpoListar.innerHTML += `
              <tr>
                <td data-id='${producto[0].IdCategoria}'>${producto[0].Categoria}</td>
                <td data-id='${producto[0].IdProducto}'>${producto[0].Descripcion}</td>
                <td class='precioProducto' data-cantidad='${cantidad}'>${subtotal}</td>
                <td>
                    <div>
                      <button data-toggle='' data-target='' data-precio='${subtotal}' title='Eliminar' style='margin-right:5px' class='btn btn-danger btn-sm d-block mx-auto'>
                      <i class="fa fa-trash"></i>
                      </button>
                    </div>
                </td>
              </tr>
              `;
      var montoTotalListar = 0
      $("#dTRLPBody tr").each(function () {
        var celda = parseFloat($(this).find("td").eq(2).text());
        montoTotalListar += celda;
      });
      tablaFooterListar.innerHTML = ``;
      tablaFooterListar.innerHTML = `
              <tr>
                <td>Monto Total</td>
                <td></td>
                <td>${montoTotalListar}</td>
                <td></td>
              </tr>
      `;
    });
    //EVENTO DE TABLA LISTAR
    $("#dTañadirReservasListarProductos").on("click", "button", function (event) {
      event.preventDefault();
      $(this).closest("tr").remove();
      var montoTotalListar = 0
      $("#dTRLPBody tr").each(function () {
        var celda = parseFloat($(this).find("td").eq(2).text());
        montoTotalListar += celda;
      });
      tablaFooterListar.innerHTML = ``;
      tablaFooterListar.innerHTML = `
              <tr>
                <td>Monto Total</td>
                <td></td>
                <td>${montoTotalListar}</td>
                <td></td>
              </tr>
      `;
    });
    $("#btnGuardarReservaProductos").on("click", function () {
      var montoTotalReserva = $("#dTRLPFooter tr").find("td").eq(2).text();
      if(montoTotalReserva=="" || montoTotalReserva=="0"){
        $("#alertaProductos").html(`
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <strong>Advertencia: </strong>Usted debe registrar al menos un producto.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        `);
      }else{
        var fechaMin = getFecha("min"),
            fechaMax = getFecha("max");
        $("#diaEntregaReserva").attr("min", fechaMin);
        $("#diaEntregaReserva").attr("max", fechaMax);

        var total = parseFloat($("#dTRLPFooter tr").find("td").eq(2).text()),
            frmDistrito = document.querySelector("#frmDistrito");
        frmDistrito.innerHTML = ``;
        dataDistritos.Resultado.forEach(function (distrito) {
          frmDistrito.innerHTML += `<option id=${distrito.IdDistrito} name=${distrito.IdDistrito} value='${distrito.IdDistrito}'>${distrito.Descripcion}</option>`;
        });

        $("#frmDistrito").val(parseInt(frmDistritoValue));
        $("#sectionDatosEnvio").removeClass("d-none");
        $("#sectionDatosEnvio").addClass("d-block");
        $("#frmMontoTotal").val(total);
        $("#frmDestinatario").val(frmDestinatarioValue);
        $("#frmDireccion").val(frmDireccionValue);

      } 
    });
  });


  $(".btnEnabled").on("click", function () {
    $(this).closest("div").parent("div").children(".frmDisabledOptions").removeAttr("disabled").focus().val();
    $(this).next().removeClass("d-none").addClass("d-block");
    $(this).removeClass("d-block").addClass("d-none");
  });
 /******************FUNCION DEL ENVIO DEL FORMULARIO***************/
  /******************FUNCION DEL ENVIO DEL FORMULARIO***************/
  /******************FUNCION DEL ENVIO DEL FORMULARIO***************/
function funcionSubmit(event){
    event.preventDefault();
    var items =[];
    $("#dTRLPBody tr").each(function () {
      var idProducto, idCategoria, precio, cantidad;
      idCategoria = parseInt($(this).find("td").eq(0).data('id'));
      idProducto = parseInt($(this).find("td").eq(1).data('id'));
      cantidad = parseInt($(this).find("td").eq(2).data('cantidad'));
      precio = parseFloat($(this).find("td").eq(2).text());
      var item = {
        IdProducto : idProducto,
			  IdCategoria : idCategoria,
			  Precio : precio,
			  Cantidad : cantidad
      }
      items.push(item);
    });
    var fecha =  $("#diaEntregaReserva").val().replace('T',' ').concat(':00');
    var datosReserva =
    {
      idRestaurante : <?php echo $idRestaurante?>,
	    codUsuario	: '<?php echo $usuario?>',
	    destinatario: $("#frmDestinatario").val(),
	    idDistrito  : $("#frmDistrito").val(),
	    direccion   : $("#frmDireccion").val(),
	    fechaEntrega: fecha,
      montoTotal  : parseFloat($("#frmMontoTotal").val()),
      medioPago   : $('input:radio[name=optionRadio]:checked').val(),
      detalleAdicional : $('#frmDetallesAdicionales').val(),
	    datosProductos : items
    }
    var urlInsertarReserva = getUrlAPI('Reserva', 'InsertarReserva');
    $.ajax({
      headers: { 
       'Accept': 'application/json',
       'Content-Type': 'application/json-patch+json' 
      },
      type: "POST",
      url: urlInsertarReserva,
      data: JSON.stringify(datosReserva),
      dataType: 'json',
      success: function (respuesta) {
          var data = JSON.parse(respuesta);
          if(data.Error=="200"){
            window.location.href="?module=start&idRol=1&alerta="+data.Resultado[0].Respuesta;
        }
      }
    });
    
}

/******************FUNCIONES COMPLEMENTARIAS***************/
/******************FUNCIONES COMPLEMENTARIAS***************/
/******************FUNCIONES COMPLEMENTARIAS***************/
function getFecha(estado){
    var hoy = new Date();
        var dd = hoy.getDate();
        if(estado=="max"){
          var MM = hoy.getMonth()+2;
        }else{
          var MM = hoy.getMonth()+1;
        }
        var yyyy = hoy.getFullYear();
        if(estado=="min"){
          var hh = hoy.getHours()+1;
        }else{
          var hh = hoy.getHours();
        }
        var mm = hoy.getMinutes();
        dd = addZero(dd);
        MM = addZero(MM);
        hh = addZero(hh);
        mm = addZero(mm);

        return yyyy+'-'+MM+'-'+dd+'T'+hh+':'+mm;
    }

    function addZero(i) {
      if (i < 10) {
        i = '0' + i;
      }
      return i;
}

</script>