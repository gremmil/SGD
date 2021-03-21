<?php

    session_start();
    $usuario = $_SESSION['nombreUsuario'];
    $idRestaurante = $_GET['idRestaurante'];
    $nombreRestaurante = $_GET['nombreRestaurante'];
    $urlImagen = $_GET['urlImagen'];
    $accion= $_GET['accion'];

    switch($accion){
        case 'añadirReserva':
            header("location: ../../main.php?module=reservas&accion=$accion&usuario=$usuario&idRestaurante=$idRestaurante&nombreRestaurante=$nombreRestaurante&urlImagen=$urlImagen");
        break;
        case 'añadirProducto':
            header("location: ../../main.php?module=productos&accion=$accion");
        break;
        case 'reporteReserva':
            header("location: ../../main.php?module=reservas&accion=$accion");
        break;
        case 'reporteProducto':
            header("location: ../../main.php?module=productos&accion=$accion");
        break;
        default:
        echo "";
    }
?>