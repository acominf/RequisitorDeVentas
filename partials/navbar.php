<?php  session_start(); ?>
<div class="jumbotron">
  <div class="container text-center">
    <h1>Requisitor De Compras</h1>      
    <p>Todo lo que buscas, nosotros lo tenemos</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Inicio</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Proveedores</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['logeado'])){ ?>
          <li ><a href="perfil.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["nombre"]; ?></a></li>
          <?php               
            switch ($_SESSION["tipo"]) {
              case 0:?>
                <li><a href="administar.php"><span class="glyphicon glyphicon-cog"></span> Administar</a></li>
                <?php 
                break;
              case 1:
                ?>
                <li><a href="productos.php"><span class="glyphicon glyphicon-list"></span> Mis productos</a></li>
                <?php 
                break;
              case 2:
                ?>
                <li><a href="carrito.php"><span class="glyphicon glyphicon-shopping-cart"></span> Carrito</a></li>
                <?php 
                break;
              } ?>
          <li><a href="logout.php">Cerrar sesión</a></li>
        <?php }else{ ?>
          <li><a href="#" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-user"></span> Iniciar Sesión</a></li>
          <li><a href="signin.php"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>


