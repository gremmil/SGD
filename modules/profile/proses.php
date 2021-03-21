<?php

$idUsuarioM="";
$nombreUsuarioM="";
$nombreCompletoM="";
$emailM="";
$telefonoM="";
$urlImagenModificar="";
$contraseñaM="";

$idUsuarioM=$_POST['idUsuario'];
$nombreUsuarioM=$_POST['nombreUsuario'];
$nombreCompletoM=$_POST['nombreCompleto'];
$emailM=$_POST['email'];
$telefonoM=$_POST['telefono'];
$urlImagenModificar=$_FILES['urlImagenModificar']['name'];
$contraseñaM=$_POST['contraseña'];

header("location: ../../main.php?module=profile&alert=1");

/*$credencialesM = array(
    "idUsuario" => (int)$idUsuarioM,
    "nombreUsuario" => $nombreUsuarioM,
    "nombreCompleto"=> $nombreCompletoM,
    "email" => $emailM,
    "telefono" => $telefonoM,
    "urlImagenModificar" => $urlImagenModificar,
    "contraseña" => $contraseñaM
);
$resActualizarPerfilUsuario = actualizarPerfil ($credencialesM);

    $errorM = $resActualizarPerfilUsuario->Error;
    $mensajeM = $resActualizarPerfilUsuario->Mensaje;
    $resultadoM = $resActualizarPerfilUsuario->Resultado[0];

    if ($error == "200") {
        header("Location: view.php?alert=5&mensaje=$resultadoM->Respuesta");
    }
    else {
        echo "";
    }

/********************************************************************************/

/*function insertarUsuario($credenciales){
    //API URL
    $urlRegistro = '';

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
}*/

?>