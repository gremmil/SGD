<?php  

      if(empty($_GET['alert'])){
        echo "";
      }else{
        switch($_GET['alert']){
          case "1":
            echo "<div class='alert alert-danger alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4>  <i class='icon fa fa-times-circle'></i> ¡Error al entrar!</h4>".
                  $_GET['mensaje'].
                  "</div>";
          break;
          case "2":
            echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4>  <i class='icon fa fa-check-circle'></i> ¡Exito!</h4>
                Has salido con éxito.
                </div>";
          break;
          case "3":
            echo "<div class='alert alert-danger alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4>  <i class='icon fa fa-check-circle'></i> ¡Error al registrar!</h4>".
                  $_GET['mensaje'].
                "</div>";
          break;
          case "4":
            echo "<div class='alert alert-danger alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4>  <i class='icon fa fa-check-circle'></i> ¡Error al registrar!</h4>".
                  $_GET['mensaje'].
                "</div>";
          break;
          case "5":
            echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4>  <i class='icon fa fa-check-circle'></i> ¡Exito!</h4>".
                  $_GET['mensaje'].
                  "</div>";
          break;
          default:
          echo "";
        }
      }

      ?>
<div class="login-box-body" id="frmLogin">

  <p class="login-box-msg"><i class="fa fa-user icon-title"></i> Por favor Inicie Sesión</p>
  <br />
  <form action="recursosLoginRegistro/login-check.php" method="POST">
    <div class="form-group has-feedback">
      <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required />
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback">
      <input type="password" class="form-control" name="password" placeholder="Password" required />
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <br />
    <div class="row">
      <div class="col-xs-12">
        <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="login" value="Ingresar" />
      </div><!-- /.col -->
    </div>
  </form>

  <div class="row mt-4">
    <div class="col-xs-12 d-flex justify-content-center">
      <span class="">¿No tienes una cuenta?</span>
    </div>
    <div class="col-xs-12 d-flex justify-content-center">
      <a href="#" class="" id="linkRegistro">Registrate aquí</a>
    </div>
  </div>

</div><!-- /.login-box-body -->

<div class="register-box-body d-none" id="frmRegistro">

  <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">

    <li class="nav-item">
      <a class="nav-link" id="registroCliente-tab" data-toggle="tab" href="#frmResgistroCliente" role="tab"
        aria-controls="frmResgistroCliente" aria-selected="true">
        <p class="register-box-msg"><i class="fa fa-user icon-title"></i> Cliente</p>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" id="registroEmpresa-tab" data-toggle="tab" href="#frmRegistroEmpresa" role="tab"
        aria-controls="frmRegistroEmpresa" aria-selected="false">
        <p class="register-box-msg"><i class="fa fa-users icon-title"></i> Empresa</p>
      </a>
    </li>

  </ul>
  <div class="tab-content mt-5" id="myTabContent">
    <!--------------------------------------frmREGISTRO_CLIENTE--------------------------->
    <div class="tab-pane" id="frmResgistroCliente" role="tabpanel" aria-labelledby="registroCliente-tab">
      <form action="recursosLoginRegistro/registro-check.php" method="POST" enctype="multipart/form-data"
        id="frmRegCliente">

        <input type="hidden" name="idTipoUsuario" value="1" />

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="text" class="form-control" name="nombres" placeholder="Nombres" autocomplete="off" required />
          <span class="glyphicon glyphicon-pe form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <select class="form-control" id="cbTipoDocumento" name="tipoDocumento">
            <option id="">Tipo Documento</option>
          </select>
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="text" class="form-control" name="nroDocumento" placeholder="Nro Documento" required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="email" class="form-control" name="email" placeholder="E-mail" autocomplete="off" required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="tel" class="form-control" name="telefono" placeholder="Telefono" autocomplete="off" required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <select class="form-control" id="cbIdDistrito" name="idDistrito">
            <option value="">Seleccionar Distrito</option>
          </select>
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="text" class="form-control" name="direccion" placeholder="Direccion" required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="text" class="form-control" name="usuario" placeholder="Usuario" required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <br />
        <div class="row pt-3">
          <div class="col-xs-12 col-md-6 d-flex justify-content-center mt-3">
            <a href="" class="linkLogin" id="">Prefiero iniciar sesión</a>
          </div>
          <div class="col-xs-12 col-md-6 pr-5">
            <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="register" value="Registrar" />
          </div><!-- /.col -->
        </div>
      </form>
    </div>
    <!---->
    <!--------------------------------------frmREGISTRO_EMPRESA--------------------------->
    <div class="tab-pane" id="frmRegistroEmpresa" role="tabpanel" aria-labelledby="registroEmpresa-tab">
      <form action="recursosLoginRegistro/registro-check.php" method="POST" enctype="multipart/form-data"
        id="frmRegEmpresa">

        <input type="hidden" name="idTipoUsuario" value="2" />

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="text" class="form-control" name="descripcion" placeholder="Razon Social" autocomplete="off"
            required />
          <span class="glyphicon glyphicon-pe form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="text" class="form-control" name="ruc" placeholder="RUC" required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <select class="form-control" id="cbIdDistritoEmpresa" name="idDistritoEmpresa">
            <option value="">Seleccionar Distrito</option>
          </select>
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="text" class="form-control" name="direccionEmpresa" placeholder="Direccion" required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="email" class="form-control" name="emailEmpresa" placeholder="E-mail" autocomplete="off"
            required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="tel" class="form-control" name="telefonoEmpresa" placeholder="Telefono" autocomplete="off"
            required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 custom-file">
          <input type="file" class="form-control custom-file-input" id="urlImagen" name="urlImagen" accept="image/*"
            required>
          <label class="custom-file-label mx-4" for="urlImagen">Seleccione un Logo</label>
        </div>

        <div class="form-group has-feedback col-xs-12">
          <select multiple="true" class="custom-select" id="cbIdMultiDistritoEmpresa" name="idMultiDistritoEmpresa[]"
            required>

          </select>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="text" class="form-control" name="usuarioEmpresa" placeholder="Usuario" required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <div class="form-group has-feedback col-xs-12 col-md-6">
          <input type="password" class="form-control" name="contrasenaEmpresa" placeholder="Contraseña" required />
          <span class="glyphicon glyphicon- form-control-feedback pr-5 mr-2"></span>
        </div>

        <br />
        <div class="row pt-3">
          <div class="col-xs-12 col-md-6 d-flex justify-content-center mt-3">
            <a href="" class="linkLogin" id="">Prefiero iniciar sesión</a>
          </div>
          <div class="col-xs-12 col-md-6 pr-5">
            <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="registerEmpresa"
              id="registerEmpresa" value="Registrar" />
          </div><!-- /.col -->
        </div>
      </form>
    </div>
  </div>

  <br />

</div><!-- /.login-box-body -->