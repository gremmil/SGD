<section class="content-header">
    <h1 class="mt-3">
      <i class="fa fa-edit icon-title"></i> Modificar Perfil de Usuario
    </h1>
    <ol class="breadcrumb mt-3">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=profile"> Perfil de usuario </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/profile/proses.php" enctype="multipart/form-data">
            <div class="box-body">

              <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre de usuario</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreUsuario" autocomplete="off" value="<?php echo $_SESSION['nombreUsuario']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreCompleto" autocomplete="off" value="<?php echo $_SESSION['nombreCompleto']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" name="email" autocomplete="off" value="<?php echo $_SESSION['email']; ?>">
                </div>
              </div>
            
              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                  <input type="tel" class="form-control" name="telefono" autocomplete="off" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $_SESSION['telefono']; ?>">
                </div>
              </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-5">
                <input type="file" class="form-control custom-file-input" id="urlImagenModificar" name="urlImagenModificar" accept="image/*"
            required>
                  <br/>
  
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/user-default.png" width="128">
               
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Contraseña</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" name="contraseña" autocomplete="off" maxlength="13" required>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=profile" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->