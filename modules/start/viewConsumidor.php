
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1 class="my-3">
    <i class="fa fa-home icon-title"></i> Inicio
  </h1>
  <ol class="breadcrumb my-3">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p style="font-size:15px">
          <i class="icon fa fa-user"></i> Bienvenido <strong><?php echo $_SESSION['nombreCompleto']; ?></strong> a la
          aplicación de gestion de reservas.
        </p>
      </div>
    </div>
  </div>
  <?php  

      if (empty($_GET['alerta'])) {
        echo "";
      } 

      else {
        echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>".
          $_GET['alerta']." Puedes revisar la informacion en el menú: 'Mis Reservas'".
        "</div>";
      }
  ?>

  <div class="row">
    <div class="col-xs-12 col-md-4 col-lg-3">
      <div class="form-group"><label for="" class="mx-2">
          <h5>Buscar un restaurante: </h5>
        </label></div>
    </div>
    <div class="col-xs-6 col-md-4 col-lg-3">
      <div class="form-group">
        <input class="form-control" id="nombreRestaurante" type="text" placeholder="Escriba un nombre">
      </div>
    </div>
    <div class="col-xs-6 col-md-4 col-lg-3">
      <div class="form-group has-feedback">
        <select class="form-control" name="listaDistritos" id="listaDistritos" placeholder="Seleccione un Distrito">
          <option disabled selected>Seleccione un Distrito</option>
        </select>
      </div>

    </div>
  </div>

  <div class="row card-group text-center mt-3" id="listaRestaurantesCuadricula">


  </div>


</section><!-- /.content -->

<div class="modal fade" id="detalleRestaurante" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header"> 
          <h3 class="modal-title" id="modTitDetalleRestaurante">
          
          </h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">   
            <div class="row">
            <!-- form start -->
                <div class="box box-primary">
                  <div class="box-body">
                    <div class="form-group">
                    
                      <div class="col-sm-5 col-md-8 mx-0 d-inline">
                      <h5 class="d-inline mr-3">Direccion: </h5><label id="outDireccionRest" class="control-label"></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-5 col-md-8 mx-0 d-inline">
                      <h5 class="d-inline mr-3">Telefono: </h5><label id="outTelefonoRest" class="control-label"></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-5 col-md-8 mx-0 d-inline">
                      <h5 class="d-inline mr-3">Email: </h5><label id="outEmailRest" class="control-label"></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-5 col-md-8 mx-0 d-inline">
                      <h5 class="d-inline mr-3">Cobertura: </h5><label id="outCoberturaRest" class="control-label"></label>
                      </div>
                    </div>
                  </div><!-- /.box body -->
                </div><!-- /.box -->
                <div class="form-group d-flex w-100 justify-content-center">
                  <div class="col-sm-offset-2 col-sm-10 d-flex justify-content-center" id="btnAñadirReserva">
                    
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
//Elementos del DOOM
  var listaDistritos = document.querySelector("#listaDistritos"),
      buscarDistritos = document.querySelector("#buscarDistritos"),
      inputNombreRestaurante = document.querySelector("#nombreRestaurante"),
      listaRestsCuadricula = document.querySelector("#listaRestaurantesCuadricula");

  listaDistritos.innerHTML=`<option>Seleccione Distrito</option>`;
  listaDistritos.innerHTML+=`<option value=0>TODOS</option>`;
//Payload para enviar al AJAX
  var credencial ={
    codUsuario: <?php echo json_encode($_SESSION['nombreUsuario']);?>
  }
//Obtencion de las url necesarias para el ajax
  var urlDistritos = getUrlAPI("Maestros", "GetDistrito"),
      urlRestaurantes = getUrlAPI("Maestros", "GetRestaurant"),
      dataRestaurante;
  
//AJAX
  $.ajax({//ajax para obtener los distritos
    headers: { 
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json' 
    },
    type: "POST",
    url: urlDistritos,
    data: JSON.stringify(credencial),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      data.Resultado.forEach(function (element) {
      listaDistritos.innerHTML += `<option value='${element.IdDistrito}' id='${element.IdDistrito}'>${element.Descripcion}</option>`;
      });
    }
  });
  $.ajax({//ajax para obtener los restaurantes
    headers: { 
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json' 
    },
    type: "POST",
    url: urlRestaurantes,
    data: JSON.stringify(credencial),
    dataType: 'json',
    success: function (respuesta) {
      console.log(respuesta);
      var data = JSON.parse(respuesta);
      data.Resultado.forEach(function(element){
      cardsInfoRestaurantes(element);//funciones para pintar la lista de restaurantes obtenidos
      })
      dataRestaurante = data;
      eventoTecladoComboBox();//funciones que detecta los eventos de filtro
      eventoModal();//funcion del evento modal al seleccionar Ver Mas en los cards de los restaurantes
    }
  });
  
   /******************FUNCIONES DE EVENTOS***************/
  /******************FUNCIONES DE EVENTOS***************/
  /******************FUNCIONES DE EVENTOS***************/
  function eventoTecladoComboBox(){
    listaDistritos.addEventListener('change', (event) => {
    var option = event.target.value;
    listaRestsCuadricula.innerHTML = ``;
    if(option==0){
      dataRestaurante.Resultado.forEach(function (rest) {
        cardsInfoRestaurantes(rest);
      });
    }
    var restaurantescb = dataRestaurante.Resultado.filter(restaurante => restaurante.IdDistrito == option);
    if (restaurantescb.length != 0) {
      restaurantescb.forEach(function (rest) {
        cardsInfoRestaurantes(rest);
      });
    }
    eventoModal();
  });

  inputNombreRestaurante.addEventListener("keyup", function () {
    var value = $(this).val().toLowerCase();
    var restaurantes = dataRestaurante.Resultado.filter(restaurante => restaurante.Descripcion.toLowerCase().includes(value, 0));

    listaRestsCuadricula.innerHTML = ``;
    if (restaurantes.length != 0) {
      restaurantes.forEach(function (rest) {
        cardsInfoRestaurantes(rest);
      });
    }
    eventoModal();
  });
  }
   /******************FUNCIONES DE LISTAR***************/
  /******************FUNCIONES DE LISTAR***************/
  /******************FUNCIONES DE LISTAR***************/
  function cardsInfoRestaurantes(rest) {
    listaRestsCuadricula.innerHTML += `
            <div class="col-xs-6 col-md-4 col-lg-3">
              <div class="card mb-5">
                <img class="card-img-top img-fluid img-thumbnail" src="${rest.UrlImagen}" alt="Imagen Cap">
                <div class="card-body id='card-Restaurante'">
                  <h5 class="card-title">${rest.Descripcion}</h5>
                  <p class="card-text d-block text-truncate">${rest.Direccion}</p>
                  <a href="" id="${rest.IdRestaurante}" class="btn btn-primary" data-toggle='modal' data-target='#detalleRestaurante'>Ver Mas</a>
                </div>
              </div>
            </div>
            `;
  }
     /******************FUNCIONES DEL EVENTO MODAL***************/
  /******************FUNCIONES DEL EVENTO MODAL***************/
  /******************FUNCIONES DEL EVENTO MODAL***************/
  function eventoModal(){
    $("#listaRestaurantesCuadricula div div div a").on("click", function () {
      $('#detalleReserva').on('hidden.bs.modal', function (e) {
	      $(this).removeData('bs.modal');
	      $(this).find('.modal-content').empty();
      });
      var opcion = this.id;
      var rest = dataRestaurante.Resultado.filter(rest => rest.IdRestaurante == opcion);
      
      var titulo = document.querySelector("#modTitDetalleRestaurante");
      var direccion = document.querySelector("#outDireccionRest")
      var telefono = document.querySelector("#outTelefonoRest");
      var email = document.querySelector("#outEmailRest");
      var cobertura = document.querySelector("#outCoberturaRest");
      var btnAñadirReserva = document.querySelector("#btnAñadirReserva");

      titulo.innerHTML= `<img src='${rest[0].UrlImagen}' class='' style='width:15%'> ${rest[0].Descripcion}`;
      direccion.innerHTML= `${rest[0].Direccion} `;
      telefono.innerHTML=`${rest[0].Telefono}`;
      email.innerHTML=`${rest[0].Email}`;
      cobertura.innerHTML=`${rest[0].DistritoCobertura}`;
      btnAñadirReserva.innerHTML=`<a href="modules/start/derivar.php?accion=añadirReserva&idRestaurante=${rest[0].IdRestaurante}&nombreRestaurante=${rest[0].Descripcion}&urlImagen=${rest[0].UrlImagen}" id="btnReservar" class="btn btn-primary btn-flat d-inline">Reservar</a>`; 
      
    });
  }
  
</script>