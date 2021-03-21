<?php
if (empty($_SESSION['nombreUsuario']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['module'] == 'start') {
		
		switch($_GET['idRol']){
			case '1'://Consumidor
				include "modules/start/viewConsumidor.php";
			break;
			case '2'://Administrador
				include "modules/start/viewAdministrador.php";
			break;
			case '3'://Validador
				include "modules/reservas/view.php";
			break;
			case '4'://Cocinero
				include "modules/reservas/view.php";
			break;
			case '5'://Motorizado
				include "modules/reservas/view.php";
			break;
			default:
			echo "";
		}
	}

	elseif ($_GET['module'] == 'productos') {
		include "modules/productos/view.php";
	}

	elseif ($_GET['module'] == 'form_productos') {
		include "modules/productos/form.php";
	}
	

	elseif ($_GET['module'] == 'reservas') {
		switch($_GET['accion']){
			case 'vistaReserva':
				include "modules/reservas/view.php";
			break;
			case 'añadirReserva':
				include "modules/reservas/añadir.php";
			break;
			case 'editarReservas':
				include "modules/reservas/editar.php";
			break;
			default:
			echo '';
		}		
	}

	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}

	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}

	elseif ($_GET['module'] == 'profile') {
		include "modules/profile/view.php";
		}

	elseif ($_GET['module'] == 'form_profile') {
		include "modules/profile/form.php";
	}
}

?>