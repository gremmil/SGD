<?php  

if (empty($_GET['alert'])) {
  echo "";
} 

elseif ($_GET['alert'] == 1) {
  echo "<div class='alert alert-success alert-dismissable'>
  </br>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4>  <i class='icon fa fa-check-circle'></i> CREACIÓN DE PRODUCTO</h4>
          El producto se ha registrado correctamente.
        </div>";
}

elseif ($_GET['alert'] == 2) {
  echo "<div class='alert alert-success alert-dismissable'>
  </br>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4>  <i class='icon fa fa-check-circle'></i> MODIFICACIÓN DE PRODUCTO</h4>
        El producto ha sido modificado correctamente.
        </div>";
}

?>
<section class="content-header">
  </br>
    <h1>
      <a class="btn btn-primary btn-social pull-right" href="?module=form_productos&form=add" data-toggle="tooltip">
        <i class="fa fa-plus"></i> Agregar Producto
      </a>
    </h1>
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Administrar Productos
  </h1>
  </br>
</section>

<!-- Main content -->
<section class="">
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p style="font-size:15px">
          <i class="icon fa fa-user"></i> Bienvenido <strong><?php echo $_SESSION['nombreCompleto'] ?></strong>
        </p>
      </div>
    </div>
  </div>
  
</section><!-- /.content -->
<section class="content">
  <div class="box box-primary">
    <div class="box-body">
      <label for="" class="col-form-label"><h5><strong>Tipos de búsqueda</strong> </h5></label>
      <div class="form-group row">
        
            <label for="" class="col-sm-1 col-form-label">Categoría</label>
            <div class="col-sm-2">
              <select class="form-control" name="listaCategoria" id="listaCategoria">
                <option selected value="0" id="0">Todas las categorías</option>
              </select>
            </div>
            <div class="col-sm-1"></div>
            <label for="" class="col-sm-1 col-form-label">Estado</label>
            <div class="col-sm-2">
              <select class="form-control" name="" id="listaEstado" >
                <option selected value="0" id="0">Todos los estados</option>
                <option value="Activo" id="Activo">Activo</option>
                <option value="Inactivo" id="Inactivo">Inactivo</option>
              </select>
            </div>
      </div><!-- /.row -->
        <div class="">
            </br>
            <label for="" class="col-form-label"><h5><strong>Resultados de búsqueda</strong> </h5></label>
        </div>
        <table id="dataTables2" class="table table-hover">
          <thead class="table-info">
            <tr>
              <th class="center">Código</th>
              <th class="center">Descripción</th>
              <th class="center">Categoría</th>
              <th class="center">Precio</th>
              <th class="center">Estado</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="dataTableProduct">
          </tbody>
        </table>
    </div><!-- /.box-body -->

    <!--Agregar Producto-->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-12">
                  <!--<a class="btn btn-primary btn-social pull-right" href="?module=form_productos&form=add" data-toggle="tooltip">
                  <i class="fa fa-plus"></i> Agregar Producto
                  </a><!-->
                </div>
              </div>
            </div><!-- /.box footer -->
  </div><!-- /.box -->
</section>
<script>
  var dataTables1 = document.querySelector("#dataTables2");
  var listaCategoria = document.querySelector("#listaCategoria");
  var listaEstado = document.querySelector("#listaEstado");
  var dataTableProduct = document.querySelector("#dataTableProduct");
  var row = document.querySelectorAll('.categoria');
  var urlAPIgetCategoria = "https://servicessgd.azurewebsites.net/api/Maestros/GetCategoria";
  var urlAPIgetProduct = "https://servicessgd.azurewebsites.net/api/Producto/GetProductos";
  var dataCategoria = getDataAPI(urlAPIgetCategoria);
  var dataProduct = getDataAPI(urlAPIgetProduct);

  if (dataCategoria != undefined) {
    console.log(dataCategoria.Resultado);
    dataCategoria.Resultado.forEach(function (element) {
      listaCategoria.innerHTML += `<option value='${element.IdCategoria}' id='${element.IdCategoria}'>${element.Descripcion}</option>`;
    });
  }

  if (dataProduct != undefined) {
    console.log(dataProduct.Resultado);
    var productos = dataProduct.Resultado; 
    getListProducts(productos);
  }

  // filtro por categoria
  listaCategoria.addEventListener('change', function() {
    var option = this.options[listaCategoria.selectedIndex];
    console.log(option);
    if(option.id == 0){
      var productos = dataProduct.Resultado;
    }else{
      var productos = dataProduct.Resultado.filter(element => element.IdCategoria == option.id);
    }
    console.log(productos);
    getListProducts(productos);
  });
  // filtro por estado
  listaEstado.addEventListener('change', function(){
    var option = this.options[listaEstado.selectedIndex];
    console.log(option);
    if(option.id == 0){
      var productos = dataProduct.Resultado;
    }else{
      var productos = dataProduct.Resultado.filter(element => element.Estado == option.id);
    }
    getListProducts(productos);
  });
  function getListProducts(productos) {
    var temp = "";
    productos.forEach(function (element) {
      temp += "<tr class='categoria' id='categoria_"+element.IdCategoria+"'>";
      temp += "<td class='center'>"+element.IdProducto+"</td>";
      temp += "<td class='center'>"+element.Descripcion+"</td>";
      temp += "<td class='center'>"+element.Categoria+"</td>";
      temp += "<td class='center'>"+element.Precio+"</td>";
      temp += "<td class='center'>"+element.Estado+"</td>";
      temp += "<td class='center'><a href='?module=form_productos&form=edit&idProducto="+element.IdProducto+"&descripcion="+element.Descripcion+"&idCategoria="+element.IdCategoria+"&categoria="+element.Categoria+"&precio="+element.Precio+"&estado="+element.Estado+"'><i class='fa fa-pencil'></i></a></td>";     
    });
    document.getElementById("dataTableProduct").innerHTML = temp;
  }
  
  function getDataAPI(urlAPI) {
    var dataAPI;
    var usuario = JSON.stringify({ codUsuario: <?php echo json_encode($_SESSION['nombreUsuario']) ?>});
    const toSend = {
    codUsuario: <?php echo json_encode($_SESSION['nombreUsuario']) ?>,
    idRestaurante: <?php echo json_encode($_SESSION['idRestaurante']) ?>,
    idProducto: 0,
    idCategoria: 0,
    producto: "",
    precio: 0,
    estado: ""
  }
  const jsonString = JSON.stringify(toSend);//
    const xhttp = new XMLHttpRequest();
    xhttp.open('POST', urlAPI, false);//aqui es donde marcas si es sincrono(false) o asincrono(true)
    //vamos a probar
    xhttp.setRequestHeader('Content-type', 'application/json-patch+json');

    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);
        dataAPI = data;
      }
    }
    if(urlAPI == urlAPIgetCategoria){
      xhttp.send(usuario);
    }else{
      xhttp.send(jsonString);
    }
    
    return dataAPI;
  }

</script>
<script src="assets/js/index.js"></script>