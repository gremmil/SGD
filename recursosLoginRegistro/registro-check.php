<?php
//Inicializacion de variables recibidas
$idTipoUsuario = "";
$nombre = "";
$apellido = "";
$idTipoDocumento = 0;
$nroDocumento = "";
$email = "";
$telefono = "";
$idDistrito = 0;
$direccion = "";
$user= "";
$contrasena= "";
$descripcion = "";
$ruc = "";
$urlImagen = "";
$idDistritoCobertura = "";

$idTipoUsuario = $_POST['idTipoUsuario'];

//evaluamos el tipo de usuario a registrar
switch($idTipoUsuario){
    case ("2")://Si el usuario es un restaurante, evaluamos si el nombre de usuario y ruc ingresado son validos
        $user = $_POST['usuarioEmpresa'];
        $ruc = $_POST['ruc'];
        $resValidacionRUC = validarRUC($ruc, $user);

        $errorruc = $resValidacionRUC->Error;
        $mensajeruc = $resValidacionRUC->Mensaje;
        $resultadoruc = $resValidacionRUC->Resultado[0];

        if($errorruc == "200" ){
            $descripcion = $_POST['descripcion'];
            $idTipoDocumento = 2;//puede variar, ojo aqui!
            $idDistrito = $_POST['idDistritoEmpresa'];
            $direccion = $_POST['direccionEmpresa'];
            $email = $_POST['emailEmpresa'];
            $telefono = $_POST['telefonoEmpresa'];
            $idDistritoCobertura = $_POST['idMultiDistritoEmpresa'];
            $contrasena = $_POST['contrasenaEmpresa'];

            //subimos la imagen del logoRestaurante al blobStorage
            $responseFinal;
            $archivoImagen = $_FILES['urlImagen']['name'];
            include "upImage.php";
        }else{
            header("Location: ../index.php?alert=3&mensaje=$mensajeruc");
        }
     
    break;
    case ("1"):/*Si el usuario es un consumidor, evaluamos si el nombre de usuario y el nro de documento
        son validos*/
        $nroDocumento = $_POST['nroDocumento'];
        $user = $_POST['usuario'];
        $respuestaValidacionUsuario = validarRUC($nroDocumento, $user);

        $errorValidUsuario = $respuestaValidacionUsuario->Error;
        $mensajeValidUsuario = $respuestaValidacionUsuario->Mensaje;
        $resultadoValidUsuario = $respuestaValidacionUsuario->Resultado[0];

        if($errorValidUsuario== "200"){
            $nombre = $_POST['nombres'];
            $apellido = $_POST['apellidos'];
            $idTipoDocumento = $_POST['tipoDocumento'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $idDistrito = $_POST['idDistrito'];
            $direccion = $_POST['direccion'];
            $contrasena = $_POST['contrasena'];
                
        }else{
            header("Location: ../index.php?alert=4&mensaje=$mensajeValidUsuario");
        }
    break;

    default:
    echo "";
        
}

//guardamos los valores pasados del formulario en "credenciales" y lo enviamos al servicio
$credenciales = array(
    "idTipoUsuario" => (int)$idTipoUsuario,
    "nombre" => $nombre,
    "apellido"=> $apellido,
    "idTipoDocumento" => (int)$idTipoDocumento,
    "nroDocumento" => $nroDocumento,
    "email" => $email,
    "telefono" => $telefono,
    "idDistrito" => (int)$idDistrito,
    "direccion" => $direccion,
    "user" => $user,
    "contrasena" => $contrasena,
    "descripcion" => $descripcion,
    "ruc" => $ruc,
    "urlImagen" => $responseFinal,
    "idDistritoCobertura"=> implode(",", $idDistritoCobertura)
);

$resInsertarUsuario = insertarUsuario ($credenciales);

    $error = $resInsertarUsuario->Error;
    $mensaje = $resInsertarUsuario->Mensaje;
    $resultado = $resInsertarUsuario->Resultado[0];

    if ($error == "200") {
        header("Location: ../index.php?alert=5&mensaje=$resultado->Respuesta");
    }
    else {
        echo "";
    }

/********************************************************************************/
function validarRUC($ruc, $user){  
    //API URL
    $urlvalidarRUC = 'https://servicessgd.azurewebsites.net/api/Usuarios/ValidarRestaurant';
    //create a new cURL resource
    $ch = curl_init($urlvalidarRUC);

    //setup request to send json via POST
    $credencialesruc = array(
        'user' => $user,
        'ruc' => $ruc
    );
    $payloadruc = json_encode($credencialesruc);

    //attach encoded JSON string to the POST fields
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payloadruc);

    //set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    //return response instead of outputting
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute the POST request
    $responseruc = curl_exec($ch);

    //close cURL resource
    curl_close($ch);

    $infoRUC = json_decode($responseruc);

    return $infoRUC;

}

function insertarUsuario($credenciales){
    //API URL
    $urlRegistro = 'https://servicessgd.azurewebsites.net/api/Usuarios/RegistrarUsuarios';

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