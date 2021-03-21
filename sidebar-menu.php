<?php 
/***********************ADMINISTRADOR******************/
if ($_SESSION['idRol']=='2') { ?>

    <ul class="sidebar-menu mt-3">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start&idRol=2"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php

if ($_GET["module"]=="reservas") { ?>
	<li class="active">
	  <a href="?module=reservas&accion=vistaReserva"></i> Ver Reservas </a>
	  </li>
  <?php
  }
  else { ?>
	<li>
	  <a href="?module=reservas&accion=vistaReserva"><i class="fa fa-file-text-o"></i> Ver Reservas </a>
	  </li>
  <?php
  }

  if ($_GET["module"]=="productos" || $_GET["module"]=="form_productos") { ?>
    <li class="active">
      <a href="?module=productos"><i class="fa fa-pencil-square-o"></i> Administrar Productos </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=productos"><i class="fa fa-pencil-square-o"></i> Administrar Productos </a>
      </li>
  <?php
  }

	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-users"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-users"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}


	if ($_GET["module"]=="profile") { ?>
		<li class="active">
			<a href="?module=profile"><i class="fa fa-user"></i> Mi Perfil</a>
		</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=profile"><i class="fa fa-user"></i> Mi Perfil</a>
		</li>
	<?php
	}
	?>
	</ul>

<?php
}

/***********************CONSUMIDOR******************/
if ($_SESSION['idRol']=='1') { ?>

    <ul class="sidebar-menu mt-3">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start&idRol=1"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php

if ($_GET["module"]=="reservas") { ?>
  <li class="active">
    <a href="?module=reservas&accion=vistaReserva"></i> Mis Reservas </a>
    </li>
<?php
}
else { ?>
  <li>
    <a href="?module=reservas&accion=vistaReserva"><i class="fa fa-file-text-o"></i> Mis Reservas </a>
    </li>
<?php
}
	if ($_GET["module"]=="profile") { ?>
		<li class="active">
			<a href="?module=profile"><i class="fa fa-user"></i> Mi Perfil</a>
		</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=profile"><i class="fa fa-user"></i> Mi Perfil</a>
		</li>
	<?php
	}
	?>
	</ul>

<?php
}

/***********************VALIDADOR******************/
if ($_SESSION['idRol']=='3') { ?>

    <ul class="sidebar-menu mt-3">
        <li class="header">MENU</li>

	<?php 

	/*if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start&idRol=3"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
		  <?php*/

if ($_GET["module"]=="reservas") { ?>
  <li class="active">
    <a href="?module=reservas&accion=vistaReserva"></i> Gestionar Reservas </a>
    </li>
<?php
}

else { ?>
  <li>
    <a href="?module=reservas&accion=vistaReserva"><i class="fa fa-file-text-o"></i> Gestionar Reservas </a>
    </li>
<?php
}

	if ($_GET["module"]=="profile") { ?>
		<li class="active">
			<a href="?module=profile"><i class="fa fa-user"></i> Mi Perfil</a>
		</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=profile"><i class="fa fa-user"></i> Mi Perfil</a>
		</li>
	<?php
	}
	?>
	</ul>

<?php
}

/***********************REPARTIDOR******************/
if ($_SESSION['idRol']=='5') { ?>

    <ul class="sidebar-menu mt-3">
        <li class="header">MENU</li>

	<?php 

	/*if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start&idRol=5"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
<?php*/

if ($_GET["module"]=="reservas") { ?>
  <li class="active">
    <a href="?module=reservas&accion=vistaReserva"></i> Gestionar Reservas </a>
    </li>
<?php
}

else { ?>
  <li>
    <a href="?module=reservas&accion=vistaReserva"><i class="fa fa-file-text-o"></i> Gestionar Reservas </a>
    </li>
<?php
}
	if ($_GET["module"]=="profile") { ?>
		<li class="active">
			<a href="?module=profile"><i class="fa fa-user"></i> Mi Perfil</a>
		</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=profile"><i class="fa fa-user"></i> Mi Perfil</a>
		</li>
	<?php
	}
	?>
	</ul>

<?php
}

/***********************COCINERO******************/
if ($_SESSION['idRol']=='4') { ?>

    <ul class="sidebar-menu mt-3">
        <li class="header">MENU</li>

	<?php 

	/*if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start&idRol=4"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
		  
		  <?php*/

if ($_GET["module"]=="reservas") { ?>
  <li class="active">
    <a href="?module=reservas&accion=vistaReserva"></i> Gestionar Reservas </a>
    </li>
<?php
}

else { ?>
  <li>
    <a href="?module=reservas&accion=vistaReserva"><i class="fa fa-file-text-o"></i> Gestionar Reservas </a>
    </li>
<?php
}

	if ($_GET["module"]=="profile") { ?>
		<li class="active">
			<a href="?module=profile"><i class="fa fa-user"></i> Mi Perfil</a>
		</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=profile"><i class="fa fa-user"></i> Mi Perfil</a>
		</li>
	<?php
	}
	?>
	</ul>

<?php
}