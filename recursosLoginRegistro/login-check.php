<?php

$username = $_POST['username'];
$password = $_POST['password'];

//API URL
$urlLogin = 'https://servicessgd.azurewebsites.net/api/Usuarios/ObtenerLogin';

//create a new cURL resource
$ch = curl_init($urlLogin);

//setup request to send json via POST
$credenciales = array(
    'user' => $username,
    'password' => $password
);
$payload = json_encode($credenciales);

//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute the POST request
$result = curl_exec($ch);

//close cURL resource
curl_close($ch);

$infoLogin = json_decode($result);

$error = $infoLogin->Error;
$mensaje = $infoLogin->Mensaje;
$resultado = $infoLogin->Resultado[0];

if ($error == "200") {
	$data = $resultado;

		session_start();

		$_SESSION['idUsuario']   = $data->IdUsuario;
		$_SESSION['nombreUsuario']  = $data->CodUsuario;
		$_SESSION['nombreCompleto']  = $data->NombreCompleto;
		$_SESSION['idRol']  =  $data->IdRol;
		$_SESSION['rol']  =  $data->Rol;
		$_SESSION['idRestaurante']  =  $data->IdRestaurante;
		$_SESSION['idDistrito']  =  $data->IdDistrito;
		$_SESSION['direccion']  =  $data->Direccion;
		$_SESSION['telefono']  = $data->Telefono;
		$_SESSION['email']  =  $data->Email;

		$idRol = $_SESSION['idRol'];

		header("Location: ../main.php?module=start&idRol=$idRol");
		die();
}
else {
	header("Location: ../index.php?alert=1&mensaje=$mensaje");

}
?>