
<?php  

if ($_GET['form']=='add') {
  if(empty($_GET['alert'])){
    echo "";
  }else{
    switch($_GET['alert']){
      case "1":
        echo "<div class='alert alert-danger alert-dismissable'>
              </br>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> CREACIÓN DE USUARIO</h4>".
              $_GET['mensaje'].
              "</div>";
      break;
      default:
      echo "";
    }
  }
  $idRol = "Validador"; 
  ?> 

  <section class="content-header">
    <h1>
      </br>
      <i class="fa fa-edit icon-title"></i> Agregar Usuario
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=user"> Usuario </a></li>
      <li class="active"> agregar </li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/user/registerUser.php" method="POST">
            <div class="box-body">
            <input type="hidden" name="codUsuario" value="<?php echo json_encode($_SESSION['nombreUsuario'])?>" />
            <input type="hidden" name="idRestaurante" value="<?php echo json_encode($_SESSION['idRestaurante'])?>" />
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label font-weight-bold">Rol</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="listaRol" id="listaRol">
                      <option selected >Selecciona un Rol</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Nombres</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputPassword3" name="nombres" placeholder="Ingresa el nombre del usuario" maxlength="30" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Apellidos</label>
                  <div class="col-sm-3">
                    <input type="" class="form-control" id="inputPassword3" name="apellidos" placeholder="Ingresa el apellido del usuario" maxlength="30" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Username</label>
                  <div class="col-sm-3">
                    <input type="" class="form-control" id="inputPassword3" name="username" placeholder="Ingresa el username del usuario" maxlength="15" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Password</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputPassword3" name="password" placeholder="Ingresa el password del usuario" maxlength="15" minlength="8" required>
                  </div>
                </div>
                <fieldset class="form-group">
                  <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0 font-weight-bold">Estado</legend>
                    <div class="col-sm-3">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoEstado" id="gridRadios1" value="activo" checked>
                        <label class="form-check-label" for="gridRadios1">
                          Activo
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoEstado" id="gridRadios2" value="inactivo">
                        <label class="form-check-label" for="gridRadios2">
                          Inactivo
                        </label>
                      </div>
                    </div>
                  </div>
                </fieldset>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=user" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

elseif ($_GET['form']=='edit') { 
    $idUsuario = $_GET['idUsuario'];
    $nombres = $_GET['nombres'];
    $apellidos = $_GET['apellidos'];
    $userName = $_GET['userName'];
    $password = $_GET['password'];
    $estado = $_GET['estado'];
    $idRol = $_GET['idRol'];
?>

  <section class="content-header">
    </br>
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar datos de Usuario
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="?module=user"> Usuario </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/user/modifyUser.php" method="POST">
          <div class="box-body">
            <input type="hidden" name="codUsuario" value="<?php echo json_encode($_SESSION['nombreUsuario'])?>" />
            <input type="hidden" name="idRestaurante" value="<?php echo json_encode($_SESSION['idRestaurante'])?>" />
            <input type="hidden" name="idUsuario" value="<?php echo $idUsuario?>" />
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label font-weight-bold">Rol</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="listaRol" id="listaRol">
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Nombres</label>
                  <div class="col-sm-3">
                    <input type="" class="form-control" id="inputPassword3" name="nombres" value="<?php echo $nombres?>" placeholder="Ingresa el nombre del producto" maxlength="30" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Apellidos</label>
                  <div class="col-sm-3">
                    <input type="" class="form-control" id="inputPassword3" name="apellidos" value="<?php echo $apellidos?>" placeholder="Ingresa el nombre del producto" maxlength="30" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Username</label>
                  <div class="col-sm-3">
                    <input type="" class="form-control" id="inputPassword3" name="username" value="<?php echo $userName?>" placeholder="Ingresa el nombre del producto" maxlength="15" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Password</label>
                  <div class="col-sm-3">
                    <input type="" class="form-control" id="inputPassword3" name="password" value="<?php echo $password?>" placeholder="Ingresa el precio del producto" maxlength="15" minlength="8" required>
                  </div>
                </div>
                <fieldset class="form-group">
                  <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0 font-weight-bold">Estado</legend>
                    <div class="col-sm-3">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoEstado" id="gridRadios1" <?php if (isset($estado) && $estado=="Activo") echo "checked";?> value="activo" >
                        <label class="form-check-label" for="gridRadios1">
                          Activo
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoEstado
                        " id="gridRadios2" <?php if (isset($estado) && $estado=="Inactivo") echo "checked";?> value="inactivo">
                        <label class="form-check-label" for="gridRadios2">
                          Inactivo
                        </label>
                      </div>
                    </div>
                  </div>
                </fieldset>
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=user" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>
<script>
var credencial = {
  codUsuario: <?php echo json_encode($_SESSION['nombreUsuario']);?>
}
var listaRol = document.querySelector('#listaRol');
var urlRol = getUrlAPI("Maestros","GetTipoUsuario");

$.ajax({
    headers: { 
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json' 
    },
    type: "POST",
    url: urlRol,
    data: JSON.stringify(credencial),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      dataRol=data;
      listarRoles();
    }
});

function listarRoles(){
  var rol = dataRol.Resultado;
  rol.forEach(function (element){
    if(element.IdTipoUsuario == 1 || element.IdTipoUsuario == 2){
    }else {
      listaRol.innerHTML += `<option value='${element.IdTipoUsuario}' id='${element.IdTipoUsuario}'>${element.Descripcion}</option>`;
    }
  });

  $("#listaRol").val(parseInt(<?php echo "$idRol"?>));
}

</script>