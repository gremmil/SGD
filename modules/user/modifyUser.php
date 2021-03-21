<?php

//Inicializacion de variables recibidas de usuario

$idRestaurante = $_POST['idRestaurante']; 
$codUsuario = $_POST['codUsuario'];
$idUsuario = $_POST['idUsuario'];
$idRol = $_POST['listaRol'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$userName = $_POST['username'];
$password = $_POST['password'];
$estado = $_POST['tipoEstado'];



//guardamos los valores pasados del formulario en "credenciales" y lo enviamos al servicio
$credenciales = array(
    "idRestaurante" => (int)$idRestaurante,
    "codUsuario" => $codUsuario,
    "idUsuario" => (int)$idUsuario,
    "idRol" => (int)$idRol,
    "nombres" => $nombres,
    "apellidos" => $apellidos,
    "userName" => $userName,
    "password" => $password,
    "estado" => $estado,
);

$resModificarUsuario = modificarUsuario ($credenciales);

    $error = $resModificarUsuario->Error;
    $mensaje = $resModificarUsuario->Mensaje;
    $resultado = $resModificarUsuario->Resultado[0];

    if ($error == "200") {
        header("Location: ../../main.php?module=user&alert=2");
    }
    else {
        header("Location: ../../main.php?module=form_user&form=edit");
    }
/********************************************************************************/

function modificarUsuario($credenciales){
    //API URL
    $urlRegistro = 'https://servicessgd.azurewebsites.net/api/Usuarios/ActualizarUsuarioPorRestaurante';

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