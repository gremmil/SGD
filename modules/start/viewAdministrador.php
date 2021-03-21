<!-- Content Header (Page header) -->
<section class="content-header">
  <h1 class="mt-3">
    <i class="fa fa-home icon-title"></i> Inicio
  </h1>
  <ol class="breadcrumb mt-3">
    <li><a href=""><i class="fa fa-home"></i> Inicio</a></li>
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
          aplicación de control de reservas.
        </p>
      </div>
    </div>
  </div>

  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-xs-6 col-md-6 col-lg-3">
      <!-- small box -->
      <div style="background-color:#00c0ef;color:#fff" class="small-box">
        <div class="inner">

          <h3></h3>
          <p>Ver Reservas</p>
        </div>
        <div class="icon">
          <i class="fa fa-folder"></i>
        </div>
        <?php  
          if ($_SESSION['idRol']=='2') { ?>
        <a href="?module=reservas&accion=vistaReserva" class="small-box-footer" title="Ver Reservas"
          data-toggle="tooltip"><i class="fa fa-search"></i></a>
        <?php
          } else { ?>
        <a class="small-box-footer"><i class="fa"></i></a>
        <?php
          }
          ?>
      </div>
    </div><!-- ./col -->

    <div class="col-xs-6 col-md-6 col-lg-3">
      <!-- small box -->
      <div style="background-color:#00a65a;color:#fff" class="small-box">
        <div class="inner">

          <h3></h3>
          <p>Agregar Productos</p>
        </div>
        <div class="icon">
          <i class="fa fa-pencil-square-o"></i>
        </div>
        <?php  
          if ($_SESSION['idRol']=='2') { ?>
        <a href="?module=form_productos&form=add" class="small-box-footer" title="Agregar Producto"
          data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        <?php
          } else { ?>
        <a class="small-box-footer"><i class="fa"></i></a>
        <?php
          }
          ?>
      </div>
    </div><!-- ./col -->

    <div class="col-xs-6 col-md-6 col-lg-3">
      <!-- small box -->
      <div style="background-color:#f39c12;color:#fff" class="small-box">
        <div class="inner">

          <h3></h3>
          <p>Agregar Usuarios</p>
        </div>
        <div class="icon">
          <i class="fa fa-file-text-o"></i>
        </div>
        <a href="?module=form_user&form=add" class="small-box-footer" title="Agregar Usuario" data-toggle="tooltip"><i
            class="fa fa-plus"></i></a>
      </div>
    </div><!-- ./col -->

    <div class="col-xs-6 col-md-6 col-lg-3">
      <!-- small box -->
      <div style="background-color:#dd4b39;color:#fff" class="small-box">
        <div class="inner">

          <h3></h3>
          <p>Modificar Perfil</p>
        </div>
        <div class="icon">
          <i class="fa fa-file-text-o"></i>
        </div>
        <a href="?module=form_profile" class="small-box-footer" title="Ver Perfil" data-toggle="tooltip"><i
            class="fa fa-edit"></i></a>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->

  <h4 class="mt-3">
    <i class="fa fa-bar-chart icon-title"></i> Resumenes
  </h4>
  <div class="row">

    <div class="col-sm-12">
      
        <label for="" class="mx-2">
          <h5>Cantidad de Pedidos Hoy: </h5>
        </label>
        <div id="infoAdmin1">

        </div>
    </div>
    <div class="col-sm-12">
      
        <label for="" class="mx-2">
          <h5>Total de Ingresos en el Mes: </h5>
        </label>
        <div id="infoAdmin2">

        </div>
    </div>
    <div class="col-sm-12">
      
        <label for="" class="mx-2">
          <h5>Plato mas vendido: </h5>
        </label>
        <div id="infoAdmin3">

        </div>
    </div>

  </div>
  <!--RowInfo-->


</section><!-- /.content -->

<script>
  var infoAdmin1 = document.querySelector("#infoAdmin1");
  var infoAdmin2 = document.querySelector("#infoAdmin2");
  var infoAdmin3 = document.querySelector("#infoAdmin3");
  var urlInfo = getUrlAPI("Reserva", "GetInfoRestaurante");
  var payload = {
    idRestaurante: <?php echo json_encode($_SESSION['idRestaurante']) ?>,
    codUsuario: <?php echo json_encode($_SESSION['nombreUsuario']) ?>
    }
  $.ajax({
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json-patch+json'
    },
    type: "POST",
    url: urlInfo,
    data: JSON.stringify(payload),
    dataType: 'json',
    success: function (respuesta) {
      var data = JSON.parse(respuesta);
      console.log(data);
      

    }

  });

  google.charts.load("current", { packages: ["corechart"] });
  google.charts.load('current', { packages: ['corechart', 'line'] });
  google.charts.setOnLoadCallback(drawChartInfo1);
  google.charts.setOnLoadCallback(drawChartInfo2);
  google.charts.setOnLoadCallback(drawChartInfo3);

  function drawChartInfo1() {
    var data = google.visualization.arrayToDataTable([
      ['Dinosaur', 'Length'],
      ['Acrocanthosaurus (top-spined lizard)', 12.2],
      ['Albertosaurus (Alberta lizard)', 9.1],
      ['Allosaurus (other lizard)', 12.2],
      ['Apatosaurus (deceptive lizard)', 22.9],
      ['Archaeopteryx (ancient wing)', 0.9],
      ['Argentinosaurus (Argentina lizard)', 36.6],
      ['Baryonyx (heavy claws)', 9.1],
      ['Brachiosaurus (arm lizard)', 30.5],
      ['Ceratosaurus (horned lizard)', 6.1],
      ['Coelophysis (hollow form)', 2.7],
      ['Compsognathus (elegant jaw)', 0.9],
      ['Deinonychus (terrible claw)', 2.7],
      ['Diplodocus (double beam)', 27.1],
      ['Dromicelomimus (emu mimic)', 3.4],
      ['Gallimimus (fowl mimic)', 5.5],
      ['Mamenchisaurus (Mamenchi lizard)', 21.0],
      ['Megalosaurus (big lizard)', 7.9],
      ['Microvenator (small hunter)', 1.2],
      ['Ornithomimus (bird mimic)', 4.6],
      ['Oviraptor (egg robber)', 1.5],
      ['Plateosaurus (flat lizard)', 7.9],
      ['Sauronithoides (narrow-clawed lizard)', 2.0],
      ['Seismosaurus (tremor lizard)', 45.7],
      ['Spinosaurus (spiny lizard)', 12.2],
      ['Supersaurus (super lizard)', 30.5],
      ['Tyrannosaurus (tyrant lizard)', 15.2],
      ['Ultrasaurus (ultra lizard)', 30.5],
      ['Velociraptor (swift robber)', 1.8]]);

    var options = {
      title: 'Lengths of dinosaurs, in meters',
      legend: { position: 'none' },
    };

    var chart = new google.visualization.Histogram(infoAdmin1);
    chart.draw(data, options);
  }
  function drawChartInfo2() {

    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Work', 11],
      ['Eat', 2],
      ['Commute', 2],
      ['Watch TV', 2],
      ['Sleep', 7]
    ]);

    var options = {
      title: 'My Daily Activities'
    };

    var chart = new google.visualization.PieChart(infoAdmin2);

    chart.draw(data, options);
  }
  function drawChartInfo3() {
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'X');
    data.addColumn('number', 'Dogs');

    data.addRows([
      [0, 0], [1, 10], [2, 23], [3, 17], [4, 18], [5, 9],
      [6, 11], [7, 27], [8, 33], [9, 40], [10, 32], [11, 35],
      [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
      [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
      [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
      [30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
      [36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
      [42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
      [48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
      [54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
      [60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
      [66, 70], [67, 72], [68, 75], [69, 80]
    ]);

    var options = {
      hAxis: {
        title: 'Time'
      },
      vAxis: {
        title: 'Popularity'
      },
      backgroundColor: '#f1f8e9'
    };

    var chart = new google.visualization.LineChart(infoAdmin3);
    chart.draw(data, options);
  }

</script>