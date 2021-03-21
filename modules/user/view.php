
 <?php  

if (empty($_GET['alert'])) {
  echo "";
} 

elseif ($_GET['alert'] == 1) {
  echo "<div class='alert alert-success alert-dismissable'>
  </br>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4>  <i class='icon fa fa-check-circle'></i> CREACIÓN DE USUARIO</h4>
          El usuario se ha registrado correctamente.
        </div>";
}

elseif ($_GET['alert'] == 2) {
  echo "<div class='alert alert-success alert-dismissable'>
  </br>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4>  <i class='icon fa fa-check-circle'></i> MODIFICACIÓN DE USUARIO</h4>
        El usuario ha sido modificado correctamente.
        </div>";
}

?>
<section class="content-header">
  </br>
    <h1>
      <a class="btn btn-primary btn-social pull-right" href="?module=form_user&form=add" data-toggle="tooltip">
        <i class="fa fa-plus"></i> Agregar Usuario
      </a>
    </h1>
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Administrar Usuarios
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
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <label for="" class="col-form-label"><h5><strong>Tipos de búsqueda</strong> </h5></label>
          <div class="form-group row">
            <label for="" class="col-sm-1 col-form-label">Rol</label>
            <div class="col-sm-2">
                <select class="form-control" name="listaRol" id="listaRol">
                  <option selected value="0" id="0">Todos los roles</option>
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
                <th class="center">Cód. Usuario</th>
                <th class="center">Nombre Completo</th>
                <th class="center">Rol</th>
                <th class="center">User</th>
                <th class="center">Password</th>
                <th class="center">Estado</th>
                <th class="center"></th>
              </tr>
            </thead>
            <tbody id="dataTableUser">
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content-->
<script>
var credencial = {
  codUsuario: <?php echo json_encode($_SESSION['nombreUsuario']);?>
}
var userCredencial = {
  idRestaurante: <?php echo json_encode($_SESSION['idRestaurante']);?>,
  codUsuario: <?php echo json_encode($_SESSION['nombreUsuario']);?>
}
var listaRol = document.querySelector('#listaRol');
var listaEstado = document.querySelector("#listaEstado");
var dataTableUser = document.querySelector("#dataTableUser");
var urlRol = getUrlAPI("Maestros","GetTipoUsuario");
var urlUser = getUrlAPI("Usuario","GetUsuariosPorRestaurante");

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
}

$.ajax({
    headers: { 
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json' 
    },
    type: "POST",
    url: urlUser,
    data: JSON.stringify(userCredencial),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      dataUser=data;
      var users = dataUser.Resultado; 
      getListUser(users);
    }
});

// filtro por categoria
listaRol.addEventListener('change', function() {
    var option = this.options[listaRol.selectedIndex];
    console.log(option);
    if(option.id == 0){
      var users = dataUser.Resultado; 
    }else{
      var users = dataUser.Resultado.filter(element => element.IdRol == option.id);
    }
    console.log(users);
    getListUser(users);
  });
// filtro por estado
listaEstado.addEventListener('change', function(){
    var option = this.options[listaEstado.selectedIndex];
    console.log(option);
    if(option.id == 0){
      var users = dataUser.Resultado; 
    }else{
      var users = dataUser.Resultado.filter(element => element.Estado == option.id);
    }
    getListUser(users);
  });

function getListUser(users) {
    var temp = "";
    users.forEach(function (element) {
      temp += "<tr class='' id='"+element.IdUsuario+"'>";
      temp += "<td class='center'>"+element.IdUsuario+"</td>";
      temp += "<td class='center'>"+element.Nombre+' '+element.Apellido+"</td>";
      temp += "<td class='center'>"+element.Rol+"</td>";
      temp += "<td class='center'>"+element.UserName+"</td>";
      temp += "<td class='center'>"+element.Password+"</td>";
      temp += "<td class='center'>"+element.Estado+"</td>";
      temp += "<td class='center'><a href='?module=form_user&form=edit&idUsuario="+element.IdUsuario+"&nombres="+element.Nombre+"&apellidos="+element.Apellido+"&idRol="+element.IdRol+"&userName="+element.UserName+"&password="+element.Password+"&estado="+element.Estado+"'><i class='fa fa-pencil'></i></a></td>";     
    });
    document.getElementById("dataTableUser").innerHTML = temp;
  }
</script>