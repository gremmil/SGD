<?php
$usuario = json_encode($_SESSION['nombreUsuario']);
$idRol = json_encode($_SESSION['idRol']);
$codReserva = $_GET['codigoReserva'];
$idRestaurante = $_GET['idRestaurante'];
$destinatario = $_GET['destinatario'];
$direccion = $_GET['direccion'];
$fecha = $_GET['fecha'];
$pago = $_GET['pago'];
$total = $_GET['total'];
$detalle = $_GET['detalle'];
$repartidor = $_GET['repartidor'];
$telefono = $_GET['telefono'];
$correo = $_GET['correo'];
$idrepartidor = $_GET['idrepartidor'];

?>

<section class="content-header">
  <h1 class="my-3">
    <i class="fa fa-cart-plus icon-title"></i> Editar reserva
  </h1>
  <ol class="breadcrumb my-3">
    <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
    <li><a href="?module=reservas&accion=vistaReserva"> Reservas</a></li>
    <li class="active"> Editar Reserva</li>
  </ol>
</section>

<section class="content">
  <div class="box box-primary">
  <form role="form" action="modules/reservas/modificarReserva.php" method="POST">
    <div class="box-body">
      <input type="hidden" name="codUsuario" value="<?php echo $_SESSION['nombreUsuario'] ?>" />
      <input type="hidden" name="idReserva" value="<?php echo $codReserva ?>" />
      <h4 class="text-center font-weight-bold">Detalle de la reserva <?php echo $codReserva ?> </h4>
      </br>
      <?php if($_SESSION['idRol']=='3'){
      
      ?>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Cliente</label>
        <div class="col-sm-4">
          <label for="staticEmail" class="form-control-plaintext"><?php echo $destinatario ?></label>
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Repartidor</label>
        <div class="col-sm-4">
              <select class="form-control" name="idRepartidor" id="listaRepartidor">
                <option disabled selected value="0" id="0">Selecciona un repartidor</option>
              </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Teléfono</label>
        <div class="col-sm-4">
        <label for="staticEmail" class="form-control-plaintext"><?php echo $telefono ?></label>
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Correo</label>
        <div class="col-sm-4">
          <label for="staticEmail" class="form-control-plaintext"><?php echo $correo ?></label>
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Dirección</label>
        <div class="col-sm-4">
          <label for="staticEmail" class="form-control-plaintext"><?php echo $direccion ?></label>
        </div>
        <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Fecha de entrega</label>
        <div class="col-sm-4">
        <label for="staticEmail" class="form-control-plaintext"><?php echo $fecha ?></label>
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Medio de pago</label>
        <div class="col-sm-4">
          <label for="staticEmail" class="form-control-plaintext"><?php echo $pago ?></label>
        </div>
        <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Monto Total</label>
        <div class="col-sm-4">
          <label for="staticEmail" class="form-control-plaintext">S/ <?php echo $total ?></label>
        </div>
      </div>
      <?php
      }
      elseif($_SESSION['idRol']=='4'){
      ?>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Repartidor</label>
        <div class="col-sm-4">
          <label for="staticEmail" class="form-control-plaintext"><?php echo $repartidor ?></label>
        </div>
        <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Fecha y Hora de entrega</label>
        <div class="col-sm-4">
        <label for="staticEmail" class="form-control-plaintext"><?php echo $fecha ?></label>
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Detalles adicionales</label>
        <div class="col-sm-4">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?php echo $detalle ?></textarea>
        </div>
      </div>
      <?php
      }
      elseif($_SESSION['idRol']=='5'){
      ?>
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Cliente</label>
          <div class="col-sm-4">
          <label for="staticEmail" class="form-control-plaintext"><?php echo $destinatario ?></label>
          </div>
          <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Teléfono</label>
          <div class="col-sm-4">
            <label for="staticEmail" class="form-control-plaintext"><?php echo $telefono ?></label>
          </div>
        </div>
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Dirección</label>
          <div class="col-sm-4">
            <label for="staticEmail" class="form-control-plaintext"><?php echo $direccion ?></label>
          </div>
          <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Fecha de entrega</label>
          <div class="col-sm-4">
          <label for="staticEmail" class="form-control-plaintext"><?php echo $fecha ?></label>
          </div>
        </div>
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label font-weight-bold">Medio de pago</label>
          <div class="col-sm-4">
            <label for="staticEmail" class="form-control-plaintext"><?php echo $pago ?></label>
          </div>
          <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Monto Total</label>
          <div class="col-sm-4">
            <label for="staticEmail" class="form-control-plaintext">S/ <?php echo $total ?></label>
          
        </div>
      </div>
      <?php
      }
      ?>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Productos seleccionados</label>
      </div>
      <div class="form-group row">
        <div class="col-sm-6">
          <table id="dataTables2" class="table table-hover">
              <thead class="table-info">
                <tr>
                  <th class="center">Categoría</th>
                  <th class="center">Producto</th>
                  <th class="center">Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="dataTableReserva">
              </tbody>
          </table>
          </br>
        </div>
      </div>
      <div class="form-group row">
      <?php if($_SESSION['idRol']=='1'){
      
      ?>
        
        <div class="col-sm-3">
          <input id="btnConfirmarReserva" type="submit"
                class="btn btn-primary btn-md btn-block  w-50 " value="Anular Reserva" name="estadoReserva">
        </div>
      <?php } elseif($_SESSION['idRol']=='3'){
      
      ?>
        <div class="col-sm-3">
            <input id="btnConfirmarReserva" type="submit"
                class="btn btn-primary btn-md btn-block w-50 mx-auto" value="Confirmar" name="estadoReserva">
        </div>
        <div class="col-sm-3">
          <input id="btnConfirmarReserva" type="submit"
                class="btn btn-primary btn-md btn-block w-50 mx-auto" value="Anular Reserva" name="estadoReserva">
        </div>
      <?php
      }
      elseif($_SESSION['idRol']=='4'){
      ?>
        <div class="col-sm-3">
            <input id="btnConfirmarReserva" type="submit"
                class="btn btn-primary btn-md btn-block w-50 mx-auto" value="Iniciar" name="estadoReserva">
        </div>
        <div class="col-sm-3">
          <input id="btnConfirmarReserva" type="submit"
                class="btn btn-primary btn-md btn-block w-50 mx-auto" value="Preparado" name="estadoReserva">
        </div>
      <?php
      }
      elseif($_SESSION['idRol']=='5'){
      ?>
        <div class="col-sm-2">
            <input id="btnConfirmarReserva" type="submit"
                class="btn btn-primary btn-md btn-block  w-40 mx-auto" value="En reparto" name="estadoReserva">
        </div>
        <div class="col-sm-2">
          <input id="btnConfirmarReserva" type="submit"
                class="btn btn-primary btn-md btn-block w-40 mx-auto" value="Entregado" name="estadoReserva">
        </div>
        <div class="col-sm-2">
            <input id="btnConfirmarReserva" type="submit"
                class="btn btn-primary btn-md btn-block w-40 mx-auto" value="Rechazado" name="estadoReserva">
        </div>
      <?php
      }
      ?>
    </div>
    </form>
  </div>
</section>

<script>

  var credenciales = {
    idRestaurante: '<?php echo $idRestaurante?>',
    codUsuario: '<?php echo $usuario?>'
  }

  var usuarioCredenciales = {
    codUsuario : <?php echo json_encode($_SESSION['nombreUsuario']) ?>
  }

  var datosReserva;
  var listaRepartidor = document.querySelector('#listaRepartidor');
  var dataTableReserva = document.querySelector("#dataTableReserva");
  var urlUsuariosRestaurante = getUrlAPI("Usuario","GetUsuariosPorRestaurante");
  var urlReservas = getUrlAPI("Reserva","GetReservas");

  $.ajax({
    headers: { 
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json' 
    },
    type: "POST",
    url: urlUsuariosRestaurante,
    data: JSON.stringify(credenciales),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      dataUser=data;
      listarRepartidores();
    }
  });

  function listarRepartidores(){
  var user = dataUser.Resultado;
  user.forEach(function (element){
    if(element.IdRol == 5){
      listaRepartidor.innerHTML += `<option value='${element.IdUsuario}' id='${element.IdUsuario}'>${element.Nombre} ${element.Apellido}</option>`;
    }
  });
  $("#listaRepartidor").val(parseInt(<?php echo "$idrepartidor"?>));
  }

  $.ajax({
    headers: { 
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json' 
    },
    type: "POST",
    url: urlReservas,
    data: JSON.stringify(usuarioCredenciales),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      dataProductos=data;
      console.log(dataProductos);
      mostrarProducto();
    }
  });

  function mostrarProducto(){
    var codigo = <?php echo $codReserva?>;
    console.log(codigo);
    if(codigo) {
      var reserva = dataProductos.Resultado.filter(codigoR=>codigoR.CodReserva==codigo);
    }
    console.log(reserva);
    var temp = "";
    var i=0;
    reserva.forEach(function (element) {
      element.DatosProducto.forEach(function (el){
          temp += "<tr class='' id=''>";
          temp += "<td class='center'>"+el.Categoria+"</td>";
          temp += "<td class='center'>"+el.Producto+"</td>";
          temp += "<td class='center'>"+el.Total+"</td>";
      });
    });
      document.getElementById("dataTableReserva").innerHTML = temp;
  }
</script>