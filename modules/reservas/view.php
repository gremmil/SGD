<?php
  $idRol = $_SESSION['idRol'];
?>

<section class="content-header">
  <h1 class="my-3">
    <?php
    if($idRol=='1'){
    ?>
    <i class="fa fa-file-text-o icon-title"></i> Mis Reservas
    <?php
      }elseif($idRol=='2'){
        ?>
    <i class="fa fa-file-text-o icon-title"></i> Ver Reservas
    <?php
      }
      else{
        ?>
    <i class="fa fa-file-text-o icon-title"></i> Gestionar Reservas
    <?php
      }
    ?>

    <a href="#" id="btnImprimirReporte" class="btn btn-primary btn-social pull-right" title="Imprimir">
      <i class="fa fa-print"></i> Imprimir Reporte
    </a>
  </h1>



</section>

<section class="content" id="infoReservas">
  <?php
    if($_SESSION['idRol']!='1'&&$_SESSION['idRol']!='2'){
    ?>
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p style="font-size:15px">
          <i class="icon fa fa-user"></i> Bienvenido <strong><?php echo $_SESSION['nombreCompleto']; ?></strong> a la
          aplicación de control de reservas.
        </p>
      </div>
    </div>
  </div>
  <?php }?>
  <div id="alertaProductos">
  </div>

  <div class="row">
    <div class="col-md-12">

      <?php  

    if (empty($_GET['alerta'])) {
      echo "";
    } 

    elseif ($_GET['alerta'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> ACTUALIZACIÓN DE RESERVA</h4>
              El estado de la reserva se ha actualizado correctamente.
            </div>";
    }
    ?>
  </div>

      <div class="box box-primary">
        <div class="box-body">
          <div id='cabeceraImpresion' class="d-none">
            <h1>Reportes Reservas</h1>
            <div class="row">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="" class="control-label">Fecha Inicio</label>
                  <input type="text" class="form-control" id='fechaInicialImpresion' value=''>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="" class="control-label">Fecha Final</label>
                  <input type="text" class="form-control" id='fechaFinalImpresion' value='$'>
                </div>
              </div>

            </div>
          </div>

          <div class="row" id="cabeceraTabla">
            <div class="col-md-4">
              <div class="form-group">
                <label for="" class="control-label">Fecha Inicio</label>
                <input type="date" class="form-control filtroCalendario" id="inputFechaInicial" max="" min="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="" class="control-label">Fecha Final</label>
                <input type="date" class="form-control filtroCalendario" id="inputFechaFinal" max="" min="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="" class="control-label">Estado Reserva</label>
                <select name="cbEstadosReserva" class="form-control" id="cbEstadosReserva">
                  <option value="-1">Seleccionar</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col-xs-12 table-responsive">
            <table id="tablaListaReservas" class="table table-bordered table-striped table-hover">
              <thead class="table-info">
                <tr>
                  <th class="center">Cod. Reserva</th>
                  <?php
                if($_SESSION['idRol']=='1'){?>
                  <th class="center">Restaurante</th>
                  <?php }?>


                  <th class="center">Fecha Entrega</th>

                  <?php
                if($_SESSION['idRol']=='1'){?>
                  <th class="center">Direccion</th>
                  <?php }?>

                  <?php
                if($_SESSION['idRol']!='1'&&$_SESSION['idRol']!='5'){?>
                  <th class="center">Repartidor</th>
                  <?php }?>
                  <th class="center">Estado</th>
                  <?php
                if($_SESSION['idRol']!='4'){?>
                  <th class="center">Monto Total</th>
                  <?php }
                if($_SESSION['idRol']!='2'){
                ?>
                  <th class="center">Action</th>
                  <?php
                } 
                ?>
                </tr>
              </thead>

              <tbody id="tabListReservasBody">

              </tbody>
            </table>
          </div>

        </div><!-- /.box-body -->
      </div><!-- /.box -->
    <!--/.col -->
  </div> <!-- /.row -->


</section><!-- /.content-->


<script>
  //Elementos del DOOM
  var tablaListaReservas = document.querySelector("#tablaListaReservas"),
    cbEstadosReserva = document.querySelector("#cbEstadosReserva"),
    inputFechaInicial = document.querySelector("#inputFechaInicial"),
    inputFechaFinal = document.querySelector("#inputFechaFinal"),
    tabListReservasBody = document.querySelector("#tabListReservasBody"),
    fechaInicial = document.querySelector("#inputFechaInicial"),
    fechaFinal = document.querySelector("#inputFechaFinal");
  //mensaje del POST hacia las url de las API´s
  var payload = {
    codUsuario: <?php echo json_encode($_SESSION['nombreUsuario']) ?>
  }
  //Inicializacion de variables que recibiran la respuesta de las API´s
  var dataEstadosReservas, dataReservas, dataFiltradaReservas;
  //Obtencion de las uls de las API´s necesarias
  var urlEstadosReservas = getUrlAPI('Maestros', 'GetEstadoReserva'),
    urlReservas = getUrlAPI('Reserva', 'GetReservas');
  //Llamadas AJAX 
  $.ajax({//ajax que envia el payload y recibe los estados de la reserva
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json'
    },
    type: "POST",
    url: urlEstadosReservas,
    data: JSON.stringify(payload),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      dataEstadosReservas = data;
      listarEstadosReserva();//Funcion que pinta en el doom la informacion recibida(estados de reserva)
    }
  });
  $.ajax({//ajax que envia el payload y recibe las reservas del usuario
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json'
    },
    type: "POST",
    url: urlReservas,
    data: JSON.stringify(payload),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      dataReservas = data;
      dataFiltradaReservas = filtrarReservas(dataReservas);
      tabListReservasBody.innerHTML = ``;
      dataFiltradaReservas.forEach(function (reserva) {
        listarReservas(reserva);//Funcion que pinta en el doom la informacion recibida(reservas)
      })
      eventosComboBoxFechas();//Funcion que inicializa los eventos de filtros por fecha y estado
    }
  });

  /******************FUNCIONES DE LISTADO***************/
  /******************FUNCIONES DE LISTADO***************/
  /******************FUNCIONES DE LISTADO***************/

  function listarEstadosReserva() {
    <?php
    if ($idRol == '1') {
    ?>
    var estadosReserva = dataEstadosReservas.Resultado.filter(estado => estado.IdEstado == 1 || estado.IdEstado == 2);
    <?php
    } elseif($idRol == '2'){
        ?>
      var estadosReserva = dataEstadosReservas.Resultado;
      <?php
  } elseif($idRol == '3'){
      ?>
    var estadosReserva = dataEstadosReservas.Resultado.filter(estado => estado.IdEstado == 1 || estado.IdEstado == 2 || estado.IdEstado == 8);
    <?php
    } elseif($idRol == '4'){
      ?>
    var estadosReserva = dataEstadosReservas.Resultado.filter(estado => estado.IdEstado == 2 || estado.IdEstado == 3 || estado.IdEstado == 4);
  <?php
    }else {
        ?>
        var estadosReserva = dataEstadosReservas.Resultado.filter(estado => estado.IdEstado == 4 || estado.IdEstado == 5 || estado.IdEstado == 6 || estado.IdEstado == 7);
    <?php
      }
    ?>
      cbEstadosReserva.innerHTML+=`<option value='0'>Todos</option>`;
    estadosReserva.forEach(function (estado) {
      cbEstadosReserva.innerHTML += `
      <option id=${estado.IdEstado} value='${estado.Descripcion}'>${estado.Descripcion}</option>
    `;
    })
  }

  function listarReservas(reserva) {
    var repartidor = reserva.Repartidor;
    console.log(repartidor);
    if (repartidor == "") {
      repartidor = "Sin asignar";
    }
    tabListReservasBody.innerHTML += `
                <tr>
                    
                    <td class='center'>${reserva.CodReserva}</td>
                  <?php
                  if($_SESSION['idRol']=='1'){?>
                    <td class='center'>${reserva.Restaurante}</td>
                  <?php }?>
                  <td class='center'>${reserva.FechaEntrega}</td>
                
                  <?php
                  if($_SESSION['idRol']=='1'){?>
                    <td class="center">${reserva.Direccion}</td>
                  <?php }?>
                  <?php
                  if($_SESSION['idRol']!='1'&&$_SESSION['idRol']!='5'){?>
                    <td class='center'>${repartidor}</td>
                  <?php }?>
                    <td class='center'>${reserva.Estado}</td>
                  <?php
                  if($_SESSION['idRol']!='4'){?>
                    <td class='center'>${reserva.MontoTotal}</td>
                  <?php 
                    }
                  if($_SESSION['idRol']!='2'){
                  ?>

                    <td class="center">
                      <div>
                        <a href='?module=reservas&accion=editarReservas&idRestaurante=${reserva.IdRestaurante}&codigoReserva=${reserva.CodReserva}&destinatario=${reserva.Destinatario}&direccion=${reserva.Direccion}&fecha=${reserva.FechaEntrega}&pago=${reserva.MedioPago}&total=${reserva.MontoTotal}&detalle=${reserva.DetalleAdicional}&repartidor=${reserva.Repartidor}&telefono=${reserva.Telefono}&correo=${reserva.Email}&idrepartidor=${reserva.IdUsuarioRepartidor}'
                        title='Ver Detalles' style='margin-right:5px' class='btn btn-primary btn-sm btnDetalle'>
                          <i style='color:#fff' class='fa fa-search'></i>
                        </a>
                      </div>
                    </td>
                  <?php }?> 
                </tr>
             `;

  }

  /******************FUNCIONES DE EVENTOS***************/
  /******************FUNCIONES DE EVENTOS***************/
  /******************FUNCIONES DE EVENTOS***************/
  function eventosComboBoxFechas() {
    $(".filtroCalendario").on('change', function () {
      $("#inputFechaInicial").attr("max", $("#inputFechaFinal").val());
      $("#inputFechaFinal").attr("min", $("#inputFechaInicial").val());
      filtrarDateCombobox();
    });

    $("#cbEstadosReserva").on('change', function () {
      filtrarDateCombobox();
    });
  }
  $("#btnImprimirReporte").on('click', function () {
    var filas = $("#tablaListaReservas tr").length,
      fInicial = $("#inputFechaInicial").val(),
      fFinal = $("#inputFechaFinal").val();

    if (filas > 1 && fInicial != "" && fFinal != "") {
      $("#alertaProductos").addClass("d-none");
      $("#fechaInicialImpresion").val($("#inputFechaInicial").val());
      $("#fechaFinalImpresion").val($("#inputFechaFinal").val());
      $("#estadoReservaImpresion").val($("#cbEstadosReserva").val());

      $("#cabeceraImpresion").removeClass("d-none");
      $("#cabeceraTabla").addClass("d-none");
      $("#infoReservas").show();
      window.print();
      $("#cabeceraTabla").removeClass("d-none");
      $("#cabeceraImpresion").addClass("d-none");
    } else if (filas > 1 && (fInicial == "" || fFinal == "")) {
      $("#alertaProductos").removeClass("d-none");
      $("#alertaProductos").html(`
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <strong>Advertencia: </strong>Elija un intervalo minimo y maximo de fechas para la impresion.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        `);
    } else if (filas <= 1) {
      $("#alertaProductos").removeClass("d-none");
      $("#alertaProductos").html(`
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <strong>Advertencia: </strong>No puede imprimir una tabla sin datos.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        `);
    }
  });

  /******************FUNCIONES DE FILTRADO***************/
  /******************FUNCIONES DE FILTRADO***************/
  /******************FUNCIONES DE FILTRADO***************/
  function filtrarReservas(dataReservas) {
    var reservasFiltradas;
  <?php
    if ($idRol == '3') {
    ?>
        reservasFiltradas=dataReservas.Resultado.filter(estado => estado.IdEstado == 1 || estado.IdEstado == 2 || estado.IdEstado == 8);
    <?php
    } elseif($idRol == '4'){
        ?>
        reservasFiltradas=dataReservas.Resultado.filter(estado => estado.IdEstado == 2 || estado.IdEstado == 3 || estado.IdEstado == 4);
      <?php
  } elseif($idRol == '5'){
      ?>
        reservasFiltradas=dataReservas.Resultado.filter(estado => estado.IdEstado == 4 || estado.IdEstado == 5 || estado.IdEstado == 6 || estado.IdEstado == 7);

  <?php
    }else {
        ?>
        reservasFiltradas=dataReservas.Resultado;    
        <?php
      }
    ?>
    return reservasFiltradas;

  }
  function filtrarDateCombobox() {
    var valFI, valFF, cbEstRes;
    var reservasFiltradas = "";

    valFI = formatStringToDate(fechaInicial.value);
    valFF = formatStringToDate(fechaFinal.value);
    cbEstRes = cbEstadosReserva.value;
    if (valFI != undefined && valFF != undefined && (cbEstRes == 0 || cbEstRes == "-1")) {//1CASO
      console.log("caso1")
      tabListReservasBody.innerHTML = ``;
      reservasFiltradas = dataFiltradaReservas.filter(function (item) {
        var fechaItem = formatStringToDate(item.FechaEntrega);
        if ((fechaItem.Año >= valFI.Año && fechaItem.Año < valFF.Año) || (fechaItem.Año > valFI.Año && fechaItem.Año <= valFF.Año)) {
          return true;
        } else if ((fechaItem.Mes >= valFI.Mes && fechaItem.Mes < valFF.Mes) || (fechaItem.Mes > valFI.Mes && fechaItem.Mes <= valFF.Mes)) {
          return true;
        } else if ((fechaItem.Dia >= valFI.Dia && fechaItem.Dia < valFF.Dia) || (fechaItem.Dia > valFI.Dia && fechaItem.Dia <= valFF.Dia)) {
          return true;
        } else {
          return false;
        }
      })
    } else if (valFI == undefined || valFF == undefined) {//2CASO
      console.log("caso2")
      tabListReservasBody.innerHTML = ``;
      if (cbEstRes != 0 || cbEstRes != "-1") {
        reservasFiltradas = dataFiltradaReservas.filter(item => item.Estado == cbEstRes);
      } else {
        reservasFiltradas = dataFiltradaReservas;
      }
    } else if (valFI != undefined && valFF != undefined && (cbEstRes != 0 && cbEstRes != "-1")) {//3CASO
      console.log("caso3")
      tabListReservasBody.innerHTML = ``;
      reservasFiltradas = dataFiltradaReservas.filter(function (item) {
        var fechaItem = formatStringToDate(item.FechaEntrega);
        if (item.Estado != cbEstRes) {
          return false;
        } else {
          if ((fechaItem.Año >= valFI.Año && fechaItem.Año < valFF.Año) || (fechaItem.Año > valFI.Año && fechaItem.Año <= valFF.Año)) {
            return true;
          } else if ((fechaItem.Mes >= valFI.Mes && fechaItem.Mes < valFF.Mes) || (fechaItem.Mes > valFI.Mes && fechaItem.Mes <= valFF.Mes)) {
            return true;
          } else if ((fechaItem.Dia >= valFI.Dia && fechaItem.Dia < valFF.Dia) || (fechaItem.Dia > valFI.Dia && fechaItem.Dia <= valFF.Dia)) {
            return true;
          } else {
            return false;
          }
        }
      });
    }

    if (reservasFiltradas.length != 0) {
      reservasFiltradas.forEach(function (reserva) {
        listarReservas(reserva);
      });
    }
  }

  /******************FUNCIONES COMPLEMENTARIAS***************/
  /******************FUNCIONES COMPLEMENTARIAS***************/
  /******************FUNCIONES COMPLEMENTARIAS***************/
  function formatStringToDate(text) {
    if (text != "") {
      var año = parseInt(text.substring(0, 4));
      var mes = parseInt(text.substring(6, 7));
      var dia = parseInt(text.substring(8, 10));
      var fecha = {
        Año: año,
        Mes: mes,
        Dia: dia
      }
      //var fecha = moment([año,mes-1,dia]);
      return fecha;
    }
  }
  function getFecha(estado) {
    var hoy = new Date();
    var dd = hoy.getDate();
    if (estado == "max") {
      var MM = hoy.getMonth() + 2;
    } else {
      var MM = hoy.getMonth() + 1;
    }
    var yyyy = hoy.getFullYear();
    /*if(estado=="min"){
      var hh = hoy.getHours()+1;
    }else{
      var hh = hoy.getHours();
    }
    var mm = hoy.getMinutes();*/
    dd = addZero(dd);
    MM = addZero(MM);
    /*hh = addZero(hh);
    mm = addZero(mm);*/

    return yyyy + '-' + MM + '-' + dd;
  }

  function addZero(i) {
    if (i < 10) {
      i = '0' + i;
    }
    return i;
  }


</script>