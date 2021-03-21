
 <?php  

if ($_GET['form']=='add') { 
  if (empty($_GET['alert'])) {
    echo "";
  } 

  elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-danger alert-dismissable'>
    </br>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4>  <i class='icon fa fa-info-circle'></i> CREACIÓN DE PRODUCTO</h4>
            Lo sentimos, pero debe seleccionar una categoría para poder continuar.
          </div>";
  }
  $idCategoria = "Piqueos/Snacks";
  ?> 

  <section class="content-header">
    <h1>
      </br>
      <i class="fa fa-edit icon-title"></i> Agregar Producto
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=productos"> Productos </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/productos/registerProduct.php" method="POST">
            <div class="box-body">
            <input type="hidden" name="codUsuario" value="<?php echo json_encode($_SESSION['nombreUsuario'])?>" />
            <input type="hidden" name="idRestaurante" value="<?php echo json_encode($_SESSION['idRestaurante'])?>" />
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label font-weight-bold">Categoría</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="tipoCategoria" id="listaCategoria">
                      <option selected >Selecciona una categoría</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Descripción</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputPassword3" name="descripcion" placeholder="Ingresa el nombre del producto" maxlength="50" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Precio (S/)</label>
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="inputPassword3" name="precio" placeholder="Ingresa el precio del producto" step="0.01" min="1" max="100" required>
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
                  <a href="?module=productos" class="btn btn-default btn-reset">Cancelar</a>
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
  if (empty($_GET['alert'])) {
    echo "";
  } 
  
  elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-danger alert-dismissable'>
    </br>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4>  <i class='icon fa fa-info-circle'></i> MODIFICACIÓN DE PRODUCTO</h4>
            Lo sentimos, pero debe seleccionar una categoría para poder continuar.
          </div>";
  }
  $idProducto = $_GET['idProducto'];
  $idCategoria = $_GET['idCategoria'];
  $descripcion = $_GET['descripcion'];
  $categoria = $_GET['categoria'];
  $precio = $_GET['precio'];
  $estado = $_GET['estado'];
?>

  <section class="content-header">
    <h1>
      </br>
      <i class="fa fa-edit icon-title"></i> Modificar Producto
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=productos"> Productos </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/productos/modifyProduct.php" method="POST">
          <div class="box-body">
            <input type="hidden" name="codUsuario" value="<?php echo json_encode($_SESSION['nombreUsuario'])?>" />
            <input type="hidden" name="idRestaurante" value="<?php echo json_encode($_SESSION['idRestaurante'])?>" />
            <input type="hidden" name="idProducto" value="<?php echo $idProducto?>" />
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label font-weight-bold">Categoría</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="idCategoria" id="listaCategoria">
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Descripción</label>
                  <div class="col-sm-3">
                    <input type="" class="form-control" id="inputPassword3" name="descripcion" value="<?php echo $descripcion?>" placeholder="Ingresa el nombre del producto" maxlength="50" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label font-weight-bold">Precio (S/)</label>
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="inputPassword3" name="precio" value="<?php echo $precio?>" placeholder="Ingresa el precio del producto" step="0.01" min="1" max="100" required>
                  </div>
                </div>
                <fieldset class="form-group">
                  <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0 font-weight-bold">Estado</legend>
                    <div class="col-sm-3">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="gridRadios1" <?php if (isset($estado) && $estado=="Activo") echo "checked";?> value="activo" >
                        <label class="form-check-label" for="gridRadios1">
                          Activo
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="gridRadios2" <?php if (isset($estado) && $estado=="Inactivo") echo "checked";?> value="inactivo">
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
                  <a href="?module=productos" class="btn btn-default btn-reset">Cancelar</a>
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
  var listaCategoria = document.querySelector("#listaCategoria");
  var urlCategoria = getUrlAPI("Maestros","GetCategoria");
  
  $.ajax({
    headers: { 
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json' 
    },
    type: "POST",
    url: urlCategoria,
    data: JSON.stringify(credencial),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      dataCategoria=data;
      listarCategoria();
    }
});

  function listarCategoria(){
    var categorias = dataCategoria.Resultado;
    categorias.forEach(function (element) {
      listaCategoria.innerHTML += `<option value='${element.IdCategoria}' id='${element.IdCategoria}'>${element.Descripcion}</option>`;
    });

    $("#listaCategoria").val(parseInt(<?php echo "$idCategoria"?>));
  }

</script>