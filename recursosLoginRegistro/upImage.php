<?php

   //Recogemos el archivo enviado por el formulario

   //Si el archivo contiene algo y es diferente de vacio
   if (isset($archivoImagen) && $archivoImagen != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['urlImagen']['type'];
      $tamano = $_FILES['urlImagen']['size'];
      $temp = $_FILES['urlImagen']['tmp_name'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) /*&& ($tamano < 2000000)*/)) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
     }
     else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        $urlImagenCarpeta = '../images/logosRegistro/';
        if (move_uploaded_file($temp, $urlImagenCarpeta.$archivoImagen)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod($urlImagenCarpeta.$archivoImagen, 0777);

            $tipoImagen = explode("/", $tipo);
            //Subimos al blob storage en azure
            $urlImageBlob = $urlImagenCarpeta.$archivoImagen;
            $nameImageBlob = $ruc.'.'.$tipoImagen[1];
            
            include "connAzure.php";

            $responseFinal=$responseListBlob;
        
            //Mostramos el mensaje de que se ha subido co éxito
            //echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            //Mostramos la imagen subida
            //echo '<p><img src="images/logosRegistro/'.$archivoImagen.'"></p>';
        }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }
      }
   }
?>