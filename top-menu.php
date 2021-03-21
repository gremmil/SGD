<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">

    <img src="images/user/user-default.png" class="user-image" alt="User Image"/>
  

    <span class="hidden-xs"><?php echo $_SESSION['nombreUsuario']; ?> </span>
  </a>
  <ul class="dropdown-menu">

    <li class="user-header">
        <img src="images/user/user-default.png" class="img-circle" alt="User Image"/>

      <p>
        <?php echo $_SESSION['nombreUsuario']; ?>
        <small><?php echo $_SESSION['rol']; ?></small>
      </p>
    </li>
    
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a style="width:80px" href="?module=profile" class="btn btn-default btn-flat">Perfil</a>
      </div>

      <div class="pull-right">
        <a style="width:80px" data-toggle="modal" href="#logout" class="btn btn-default btn-flat">Salir</a>
      </div>
    </li>
  </ul>
</li>