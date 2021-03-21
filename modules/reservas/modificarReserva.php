<?php

//Inicializacion de variables recibidas de producto

$codUsuario = $_POST['codUsuario'];
$idReserva = $_POST['idReserva'];
$estadoReserva = $_POST['estadoReserva'];


switch($estadoReserva) {
    case "Pendiente Confirmación":
        $idEstadoReserva = "1";
      break;
    case "Confirmar":
        $idEstadoReserva = "2";
        $idUsuarioRepartidor = $_POST['idRepartidor'];
      break;
    case "Iniciar":
        $idEstadoReserva = "3";
        $idUsuarioRepartidor = "0";
      break;
    case "Preparado":
        $idEstadoReserva = "4";
      break;
    case "En reparto":
        $idEstadoReserva = "5";
      break;
    case "Entregado":
        $idEstadoReserva = "6";
      break;
    case "Rechazado":
        $idEstadoReserva = "7";
      break;
    case "Anular Reserva":
        $idEstadoReserva = "8";
      break;
    default :
        "";
  }

$credenciales = array(
    "codUsuario" => $codUsuario,
    "idReserva" => (int)$idReserva,
    "idEstadoReserva" => (int)$idEstadoReserva,
    "idUsuarioRepartidor" => (int)$idUsuarioRepartidor,
);

$resModificarReserva = modificarReserva ($credenciales);

    $error = $resModificarReserva->Error;
    $mensaje = $resModificarReserva->Mensaje;
    $resultado = $resModificarReserva->Resultado[0];

if ($error == "200") {
    header("Location: ../../main.php?module=reservas&accion=vistaReserva&alerta=1");
}
else {
    header("Location: ../../main.php?module=reservas&accion=editarReservas");
}
/********************************************************************************/

function modificarReserva($credenciales){
    //API URL
    $urlRegistro = 'https://servicessgd.azurewebsites.net/api/Reserva/ActualizarEstadoReserva';

    //create a new cURL resource
    $ch = curl_init($urlRegistro);

    //setup request to send json via POST
    $payload = json_encode($credenciales, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    //attach encoded JSON string to the POST fields
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    //set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    //return response instead of outputting
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute the POST request
    $response = curl_exec($ch);

    //close cURL resource
    curl_close($ch);

    $infoLogin = json_decode($response);

    return $infoLogin;
}

?>