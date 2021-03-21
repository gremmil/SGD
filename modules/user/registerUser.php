<?php

//Inicializacion de variables recibidas de usuario

$idRestaurante = $_POST['idRestaurante']; 
$codUsuario = $_POST['codUsuario'];
$idUsuario = 0;
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

$resInsertarUsuario = insertarUsuario ($credenciales);
if($idRol == 0 || $idRol == null){
    header("Location: ../../main.php?module=form_user&form=add&alert=1&mensaje= Lo sentimos, pero debes seleccionar un rol para el usuario");
}
    $error = $resInsertarUsuario->Error;
    $mensaje = $resInsertarUsuario->Mensaje;
    $resultado = $resInsertarUsuario->Resultado[0];

    if ($error == "200") {
        header("Location: ../../main.php?module=user&alert=1");
    }
    elseif ($error == "500") {
        header("Location: ../../main.php?module=form_user&form=add&alert=1&mensaje=$mensaje");
    }
/********************************************************************************/

function insertarUsuario($credenciales){
    //API URL
    $urlRegistro = 'https://servicessgd.azurewebsites.net/api/Usuarios/InsertarUsuarioPorRestaurante';

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