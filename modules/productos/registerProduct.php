<?php

//Inicializacion de variables recibidas de producto

$codUsuario = $_POST['codUsuario'];
$idRestaurante = $_POST['idRestaurante'];; //modificar con valor por del servicio
$idProducto = 0;
$idCategoria = $_POST['tipoCategoria'];
$producto = $_POST['descripcion'];
$precio = $_POST['precio'];
$estado = $_POST['tipoEstado'];



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

$resInsertarProducto = insertarProducto ($credenciales);

    $error = $resInsertarProducto->Error;
    $mensaje = $resInsertarProducto->Mensaje;
    $resultado = $resInsertarProducto->Resultado[0];

    if ($error == "200") {
        header("Location: ../../main.php?module=productos&alert=1");
    }
    else {
        header("Location: ../../main.php?module=form_productos&form=add&alert=1");
    }
/********************************************************************************/

function insertarProducto($credenciales){
    //API URL
    $urlRegistro = 'https://servicessgd.azurewebsites.net/api/Producto/InsertarProducto';

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