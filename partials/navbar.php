<?php  
  session_start(); 

  function get_string_between($string, $start, $end){
      $string = ' ' . $string;
      $ini = strpos($string, $start);
      if ($ini == 0) return '';
      $ini += strlen($start);
      $len = strpos($string, $end, $ini) - $ini;
      return substr($string, $ini, $len);
  }

  $url =  $_SERVER['REQUEST_URI'];
  $pag_actual = get_string_between($url,'/', 'php');
  $pag_actual = get_string_between($pag_actual,'/', '.');
?>
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
        <li <?php if($pag_actual == "index") echo "class='active'"; ?>><a href="index.php">Inicio</a></li>
        <li <?php if($pag_actual == "productos") echo "class='active'"; ?>><a href="productos.php">Productos</a></li>
        <li <?php if($pag_actual == "proveedores") echo "class='active'"; ?>><a href="proveedores.php">Proveedores</a></li>
        <li <?php if($pag_actual == "contacto") echo "class='active'"; ?>><a href="contacto.php">Contacto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['logeado'])){ ?>
          <li ><a href="perfil.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["nombre"]; ?></a></li>
          <?php               
            switch ($_SESSION["tipo"]) {
              case 0:?>
                <li><a href="administrar.php"><span class="glyphicon glyphicon-cog"></span> Administar</a></li>
                <?php 
                break;
              case 1:
                ?>
                <li><a href="misproductos.php"><span class="glyphicon glyphicon-list"></span> Mis productos</a></li>
                <?php 
                break;
              case 2:
                ?>
                <li><a href="carrito.php"><span class="glyphicon glyphicon-shopping-cart"></span> Carrito</a></li>
                <li><a href="mis_requisiciones.php"><span class="glyphicon glyphicon-shopping-list"></span> Mis requisiciones</a></li>
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