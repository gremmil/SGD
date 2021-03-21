<?php

//Inicializacion de variables recibidas de producto

$codUsuario = $_POST['codUsuario'];
$idRestaurante = $_POST['idRestaurante'];
$idProducto = $_POST['idProducto'];
$idCategoria = $_POST['idCategoria'];
$producto = $_POST['descripcion'];
$precio = $_POST['precio'];
$estado = $_POST['estado'];



//guardamos los valores pasados del formulario en "credenciales" y lo enviamos al servicio
$credenciales = array(
    "codUsuario" => $codUsuario,
    "idRestaurante" => (int)$idRestaurante,
    "idProducto" => (int)$idProducto,
    "idCategoria" => (int)$idCategoria,
    "producto" => $producto,
    "precio" => (double)$precio,
    "estado" => $estado,
);

$resModificarProducto = modificarProducto ($credenciales);

    $error = $resModificarProducto->Error;
    $mensaje = $resModificarProducto->Mensaje;
    $resultado = $resModificarProducto->Resultado[0];

    if ($error == "200") {
        header("Location: ../../main.php?module=productos&alert=2");
    }
    else {
        header("Location: ../../main.php?module=form_productos&form=edit&alert=1");
    }
/********************************************************************************/

function modificarProducto($credenciales){
    //API URL
    $urlRegistro = 'https://servicessgd.azurewebsites.net/api/Producto/ActualizarProducto';

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