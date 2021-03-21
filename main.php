<?php  
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>SGR | Sistema de Gestion de Reservas</title>

  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Inventario de Medicamentos">
  <meta name="author" content="Inventario de Medicamentos - Sistemas Web" />

  <!-- favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.png" />

  <!-- Bootstrap 3.3.2 -->
  <!--<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
  <!-- FontAwesome 4.3.0 -->
  <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- DATA TABLES -->
  <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">-->
  <!-- Chosen Select -->
  <link rel="stylesheet" type="text/css" href="assets/plugins/chosen/css/chosen.min.css" />
  <!-- Theme style -->
  <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link href="assets/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
  <!-- Custom CSS -->
  <link href="assets/css/style.css" rel="stylesheet" type="text/css" />


  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script src="recursosServicios/servicessgr.js"></script>

  <script language="javascript">
    function getkey(e) {
      if (window.event)
        return window.event.keyCode;
      else if (e)
        return e.which;
      else
        return null;
    }

    function goodchars(e, goods, field) {
      var key, keychar;
      key = getkey(e);
      if (key == null) return true;

      keychar = String.fromCharCode(key);
      keychar = keychar.toLowerCase();
      goods = goods.toLowerCase();

      // check goodkeys
      if (goods.indexOf(keychar) != -1)
        return true;
      // control keys
      if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
        return true;

      if (key == 13) {
        var i;
        for (i = 0; i < field.form.elements.length; i++)
          if (field == field.form.elements[i])
            break;
        i = (i + 1) % field.form.elements.length;
        field.form.elements[i].focus();
        return false;
      };
      // else return false
      return false;
    }
  </script>

</head>

<body class="skin-blue fixed">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <img style="margin-top:-15px;margin-right:5px" src="assets/img/logo-blue.png" alt="Logo">
        <span style="font-size:20px">SGD</span>
      </a>

      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <?php include "top-menu.php" ?>

          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">

      <section class="sidebar">

        <?php include "sidebar-menu.php" ?>

      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <?php include "content.php" ?>

      <!-- Modal Logout -->
      <div class="modal fade" id="logout">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><i class="fa fa-sign-out"> Salir</i></h4>
            </div>
            <div class="modal-body">
              <p>¿Seguro que quieres salir? </p>
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-danger" href="logout.php">Si, Salir</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
      <strong>Copyright JMA Soluciones &copy; <?php echo date('Y');?> <a href="" target="_blank"></a>.</strong>
    </footer>
  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.3 -->
  <!--<script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>-->


  <!-- Bootstrap 3.3.2 JS -->

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>

    <!-- chosen select -->
    <script src="assets/plugins/chosen/js/chosen.jquery.min.js"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>

    <script src="assets/plugins/moment/moment.js"></script>
    <script src="assets/plugins/moment/moment-with-locales.js"></script>
    <!-- Datepicker -->
    <script src="assets/plugins/datepicker/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- maskMoney -->
    <script src="assets/js/jquery.maskMoney.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/app.min.js" type="text/javascript"></script>


    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        // datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });

        // chosen select
        $('.chosen-select').chosen({allow_single_deselect:true}); 
        //resize the chosen on window resize
        
        // mask money
        $('#harga_beli').maskMoney({thousands:'.', decimal:',', precision:0});
        $('#harga_jual').maskMoney({thousands:'.', decimal:',', precision:0});

        $(window)
        .off('resize.chosen')
        .on('resize.chosen', function() {
          $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
          })
        }).trigger('resize.chosen');
        //resize chosen on sidebar collapse/expand
        $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
          if(event_name != 'sidebar_collapsed') return;
          $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
          })
        });
        $('#chosen-multiple-style .btn').on('click', function(e){
          var target = $(this).find('input[type=radio]');
          var which = parseInt(target.val());
          if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
           else $('#form-field-select-4').removeClass('tag-input-style');
        });

      // DataTables
      $("#tablaListaReservas").dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false,
      
        "language": idioma_español
      });
      $("#dTañadirReservasMostrarProductos").dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false,

        "language": idioma_español
      });
      $("#dTañadirReservasListarProductos").dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false,

        "language": idioma_español
      });
      $("#dataTables1").dataTable();
      $('#dataTables2').dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false,

        "language": idioma_español
      });
    });

    var idioma_español = {
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }

  </script>


</body>

</html>