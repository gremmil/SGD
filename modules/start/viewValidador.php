  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Inicio
    </h1>
    <ol class="breadcrumb">
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
            <i class="icon fa fa-user"></i> Bienvenido <strong><?php echo $_SESSION['name_user']; ?></strong> a la aplicación de control de reservas.
          </p>        
        </div>
      </div>  
    </div>
   
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php  
          
            $query = mysqli_query($mysqli, "SELECT COUNT(codigo) as numero FROM transaccion_medicamentos")
                                            or die('Error '.mysqli_error($mysqli));

           
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['numero']; ?></h3>
            <p>Ver Reservas</p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
          <?php  
          if ($_SESSION['permisos_acceso']!='Consumidor') { ?>
            <a href="?module=medicines_transaction" class="small-box-footer" title="Agregar" data-toggle="tooltip"><i class="fa fa-search-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <?php   
   
            $query = mysqli_query($mysqli, "SELECT COUNT(codigo_transaccion) as numero FROM transaccion_medicamentos")
                                            or die('Error '.mysqli_error($mysqli));


            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['numero']; ?></h3>
            <p>Agregar Productos</p>
          </div>
          <div class="icon">
            <i class="fa fa-pencil-square-o"></i>
          </div>
          <?php  
          if ($_SESSION['permisos_acceso']!='Consumidor') { ?>
            <a href="?module=form_medicines&form=add" class="small-box-footer" title="Agregar" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <?php  
  
            $query = mysqli_query($mysqli, "SELECT COUNT(codigo) as numero FROM medicamentos")
                                            or die('Error'.mysqli_error($mysqli));

            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['numero']; ?></h3>
            <p>Reporte de Reservas</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="?module=stock_report" class="small-box-footer" title="Imprimir" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#dd4b39;color:#fff" class="small-box">
          <div class="inner">
            <?php   
  
            $query = mysqli_query($mysqli, "SELECT COUNT(codigo_transaccion) as numero FROM transaccion_medicamentos")
                                            or die('Error: '.mysqli_error($mysqli));

            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['numero']; ?></h3>
            <p>Reporte de Productos</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="?module=stock_inventory" class="small-box-footer" title="Imprimir" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->
  </section><!-- /.content -->