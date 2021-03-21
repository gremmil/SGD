<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Login | Sistema de Gestion de Delivery</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


  <!-- favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.png" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


  <!-- Bootstrap 3.3.2 -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
  <!-- Custom CSS -->
  <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
  <script src="recursosServicios/servicessgr.js"></script>
</head>

<body class="login-page">
  <div class="container-fluid bg-login">
    <div class="login-box" id="">
      <div style="color:#3c8dbc" class="login-logo">
        <img style="margin-top:-12px" src="assets/img/logo-blue.png" alt="Logo" height="50"> <b>SGD</b>
      </div><!-- /.login-logo -->

      <?php
      include_once "recursosLoginRegistro/frmLogReg.php";
      ?>

    </div><!-- /.login-box -->
  </div>

  <!-- jQuery 2.1.3 -->
  <!--<script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>-->

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

  <!-- Bootstrap 3.3.2 JS -->
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>

  <script src="recursosLoginRegistro/index.js"></script>
  
</body>

</html>